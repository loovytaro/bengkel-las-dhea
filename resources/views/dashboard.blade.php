@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('page-description', 'Selamat datang di sistem administrasi Bengkel Las Dhea.')

@section('content')

    <div class="dashboard-grid">

        <div class="dashboard-card">
            <span>Total Layanan</span>
            <strong>{{ $totalLayanan }}</strong>
        </div>

        <div class="dashboard-card">
            <span>Total Galeri</span>
            <strong>{{ $totalGaleri }}</strong>
        </div>

        <div class="dashboard-card">
            <span>Status Sistem</span>
            <strong>Aktif</strong>
        </div>

    </div>


    <div class="welcome-card">

        <h3>Halo, {{ session('admin_username') }} 👋</h3>

        <p>
            Kamu login sebagai
            <strong>{{ ucfirst(session('admin_role')) }}</strong>.
        </p>

    </div>


    <div class="activity-card">

        <div class="activity-header">
            <h3>Aktivitas Terbaru</h3>
            <p>Aktivitas terbaru pada sistem.</p>
        </div>

        <div class="activity-table-wrapper">

            <table class="activity-table">

                <thead>
                    <tr>
                        <th>Aktivitas</th>
                        <th>Detail</th>
                        <th>Oleh</th>
                        <th>Waktu</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($aktivitas as $item)

                        <tr>

                            <td>
                                {{ $item->aktivitas }}
                            </td>

                            <td>
                                {{ $item->detail }}
                            </td>

                            <td>
                                {{ ucfirst($item->nama_admin) }}
                            </td>

                            <td>
                                {{ $item->created_at->format('d/m/Y H:i') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="activity-empty">
                                Belum ada aktivitas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection