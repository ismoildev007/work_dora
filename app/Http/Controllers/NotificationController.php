<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Status;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    public function index()
    {

        $notifications = Notification::with('user', 'status', 'work')->get();
        return view('admin.notification.index', compact('notifications'));
    }

    public function create()
    {
        $statuses = Status::all();
        $users = User::all();
        $works = Work::all();
        return view('admin.notification.create', compact('statuses', 'users', 'works'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'work_id' => 'nullable|exists:works,id',
            'status_id' => 'required|exists:statuses,id',
            'message' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('user_id', 'work_id', 'status_id', 'message', 'type', 'content');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('notifications_images', 'public');
        }

        Notification::create($data);

        return redirect()->route('notifications.index')->with('success', 'Notification created successfully.');
    }

    public function edit(Notification $notification)
    {
        $statuses = Status::all();
        $users = User::all();
        $works = Work::all();
        return view('admin.notification.edit', compact('notification', 'statuses', 'users', 'works'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'work_id' => 'nullable|exists:works,id',
            'status_id' => 'required|exists:statuses,id',
            'message' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('user_id', 'work_id', 'status_id', 'message', 'type', 'content');

        if ($request->hasFile('image')) {
            if ($notification->image) {
                Storage::disk('public')->delete($notification->image);
            }
            $data['image'] = $request->file('image')->store('notifications_images', 'public');
        }

        $notification->update($data);

        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully.');
    }

    public function destroy(Notification $notification)
    {
        if ($notification->image) {
            Storage::disk('public')->delete($notification->image);
        }

        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
