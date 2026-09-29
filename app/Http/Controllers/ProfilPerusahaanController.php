<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProfilPerusahaan;

class ProfilPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profil = ProfilPerusahaan::first();

        return view('profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        //
        $profil = ProfilPerusahaan::first();

        return view('profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $profil = ProfilPerusahaan::firstOrFail();

        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:100',
            'tentang_perusahaan' => 'required|string',
            'alamat' => 'required|string|max:200',
            'telepon' => 'required|string|max:20',
            'jam_operasional' => 'required|string|max:100',
            'maps_embed' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {

            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }

            $logo = $request->file('logo');

            $namaLogo = time() . '_' . $logo->getClientOriginalName();

            $logo->storeAs('profil', $namaLogo, 'public');

            $validated['logo'] = 'profil/' . $namaLogo;
        }

        $profil->update($validated);

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
