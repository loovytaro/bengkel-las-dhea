<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Galeri;
use App\Models\Aktivitas;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalLayanan = Layanan::count();
        $totalGaleri = Galeri::count();

        $aktivitas = Aktivitas::latest()
            ->take(10)
            ->get();

        return view('dashboard', compact(
            'totalLayanan',
            'totalGaleri',
            'aktivitas'
        ));
    }
}
