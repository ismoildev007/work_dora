<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('index')->with('admins', $admins);
    }
    public function auth()
    {
        $user = User::all();
        return view('auth.index')->with('users', $user);
    }

    public function login()
    {
        return view('auth.login');
    }
    public function user()
    {
        return view('auth.user');
    }
    public function manager()
    {
        return view('auth.manager');
    }
    public function user_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->permissions->role ?? 2; // Ruxsatlar rolini olish

            if ($role === \App\Helpers\MainHelper::ROLE_USER) {
                return redirect()->intended('/user/notifications');
            } elseif ($role === \App\Helpers\MainHelper::ROLE_ADMIN) {
                return redirect()->intended('/admin/notifications');
            } elseif ($role === \App\Helpers\MainHelper::ROLE_MANAGER) {
                return redirect()->intended('/manager/notifications');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function manager_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->permissions->role ?? 1; // Ruxsatlar rolini olish

            if ($role === \App\Helpers\MainHelper::ROLE_MANAGER) {
                return redirect()->intended('/manager/notifications');
            } elseif ($role === \App\Helpers\MainHelper::ROLE_ADMIN) {
                return redirect()->intended('/admin/notifications');
            } elseif ($role === \App\Helpers\MainHelper::ROLE_USER) {
                return redirect()->intended('/user/notifications');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->permissions->role ?? 0; // Ruxsatlar rolini olish

            if ($role === \App\Helpers\MainHelper::ROLE_ADMIN) {
                return redirect()->intended('/admin/notifications');
            } elseif ($role === \App\Helpers\MainHelper::ROLE_MANAGER) {
                return redirect()->intended('/manager/notifications');
            } elseif ($role === \App\Helpers\MainHelper::ROLE_USER) {
                return redirect()->intended('/user/notifications');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
