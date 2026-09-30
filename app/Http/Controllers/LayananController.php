<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\Aktivitas;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layanan = Layanan::latest()->get();

        return view('layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Layanan::count() >= 6) {
            return redirect()
                ->route('layanan.index')
                ->with('error', 'Jumlah layanan sudah mencapai batas maksimal 6.');
        }

        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Pengaman tambahan agar database tidak lebih dari 6 layanan
        if (Layanan::count() >= 6) {
            return redirect()
                ->route('layanan.index')
                ->with('error', 'Jumlah layanan sudah mencapai batas maksimal 6.');
        }

        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'deskripsi_layanan' => 'required|string|max:100',
        ]);

        Layanan::create([
            'nama_admin' => session('admin_username'),
            'role_admin' => session('admin_role'),
            'aktivitas' => 'Layanan ditambahkan',
            'detail' => 'Layanan "' . $request->nama_layanan . '" ditambahkan',
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
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
        $layanan = Layanan::findOrFail($id);

        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'deskripsi_layanan' => 'required|string|max:100',
        ]);

        $layanan = Layanan::findOrFail($id);

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi_layanan' => $request->deskripsi_layanan,
        ]);

        Aktivitas::create([
            'nama_admin' => session('admin_username'),
            'role_admin' => session('admin_role'),
            'aktivitas' => 'Layanan diperbarui',
            'detail' => 'Layanan "' . $layanan->nama_layanan . '" diperbarui',
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $layanan = Layanan::findOrFail($id);

        $layanan->delete();

        Aktivitas::create([
            'nama_admin' => session('admin_username'),
            'role_admin' => session('admin_role'),
            'aktivitas' => 'Layanan dihapus',
            'detail' => 'Layanan "' . $layanan->nama_layanan . '" dihapus',
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}
