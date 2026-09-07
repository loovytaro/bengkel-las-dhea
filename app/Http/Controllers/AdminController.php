<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)
            ->where('email', $request->email)
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()
                ->withErrors([
                    'login' => 'Username, email, atau password salah.'
                ])
                ->withInput();
        }

        // Simpan data admin ke session
        session([
            'admin_id' => $admin->id_admin,
            'admin_username' => $admin->username,
            'admin_role' => $admin->role,
        ]);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'admin_id',
            'admin_username',
            'admin_role',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
