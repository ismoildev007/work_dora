<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with(['user', 'work'])->get();
        return view('admin.notification.index', compact('notifications'));
    }

    public function create()
    {
        $users = User::all();
        $works = Work::all();
        return view('admin.notification.create', compact('users', 'works'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'work_id' => 'required|exists:works,id',
            'massage' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]);

        Notification::create($validatedData);

        return redirect()->route('notifications.index')->with('success', 'Notification created successfully.');
    }

    public function show(Notification $notification)
    {
        return view('admin.notification.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        $users = User::all();
        $works = Work::all();
        return view('admin.notification.edit', compact('notification', 'users', 'works'));
    }

    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'work_id' => 'required|exists:works,id',
            'massage' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]);

        $notification->update($validatedData);

        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
