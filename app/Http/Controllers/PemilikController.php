<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengguna = Admin::orderBy('created_at', 'desc')->get();

        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username' => 'required|string|max:50|unique:admin,username',
            'email' => 'required|email|max:100|unique:admin,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,pemilik',
        ]);

        Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pengguna = Admin::findOrFail($id);

        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pengguna = Admin::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:50|unique:admin,username,' . $pengguna->id_admin . ',id_admin',
            'email' => 'required|email|max:100|unique:admin,email,' . $pengguna->id_admin . ',id_admin',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,pemilik',
        ]);

        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->role = $request->role;

        if ($request->filled('password')) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->save();

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pengguna = Admin::findOrFail($id);

        $pengguna->delete();

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Pengguna berhasil dihapus.');

    }
}
