@extends('layouts.app')

@section('content')

    <div class="page-header">

        <div>
            <h1>Profil Perusahaan</h1>
            <p>Kelola informasi utama Bengkel Las Dhea.</p>
        </div>

        <a href="{{ route('profil.edit') }}" class="btn-add">
            Edit Profil
        </a>

    </div>


    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="content-card">

        <div class="card-header">
            <h2>Informasi Perusahaan</h2>
        </div>


        <div class="profile-detail">

            @if($profil->logo)

                <div class="profile-logo">
                    <img
                        src="{{ asset('storage/' . $profil->logo) }}"
                        alt="{{ $profil->nama_perusahaan }}"
                    >
                </div>

            @endif


            <div class="profile-info">

                <div class="profile-field">
                    <label>Nama Perusahaan</label>
                    <p>{{ $profil->nama_perusahaan }}</p>
                </div>


                <div class="profile-field">
                    <label>Tentang Perusahaan</label>
                    <p>{{ $profil->tentang_perusahaan }}</p>
                </div>


                <div class="profile-field">
                    <label>Alamat</label>
                    <p>{{ $profil->alamat }}</p>
                </div>


                <div class="profile-field">
                    <label>Telepon</label>
                    <p>{{ $profil->telepon }}</p>
                </div>


                <div class="profile-field">
                    <label>Jam Operasional</label>
                    <p>{{ $profil->jam_operasional }}</p>
                </div>


                <div class="profile-field">
                    <label>Google Maps</label>

                    @if($profil->maps_embed)

                        <div class="maps-preview">
                            {!! $profil->maps_embed !!}
                        </div>

                    @else

                        <p>Belum ada lokasi Google Maps.</p>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection