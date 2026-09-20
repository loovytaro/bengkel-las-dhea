<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $galeri = Galeri::latest()->get();

        return view('galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_galeri' => 'required|string|max:100',
            'kategori_galeri' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        dd(session()->all());
        
        $foto = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'id_admin' => session('id_admin'),
            'nama_galeri' => $request->nama_galeri,
            'kategori_galeri' => $request->kategori_galeri,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
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
        $galeri = Galeri::findOrFail($id);

        return view('galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_galeri' => 'required|string|max:100',
            'kategori_galeri' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);

        $data = [
            'nama_galeri' => $request->nama_galeri,
            'kategori_galeri' => $request->kategori_galeri,
        ];

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $galeri = Galeri::findOrFail($id);

        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}
