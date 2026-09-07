@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('page-description', 'Selamat datang di sistem administrasi Bengkel Las Dhea.')

@section('content')

    <div class="dashboard-grid">

        <div class="dashboard-card">
            <span>Total Layanan</span>
            <strong>0</strong>
        </div>

        <div class="dashboard-card">
            <span>Total Galeri</span>
            <strong>0</strong>
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

@endsection