<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ])->withInput();
        }

        session([
            'id_admin' => $admin->id_admin,
            'username' => $admin->username,
            'role' => $admin->role,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        
        return redirect()->route('login');
    }
}
