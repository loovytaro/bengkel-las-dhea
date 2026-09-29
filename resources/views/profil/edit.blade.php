@extends('layouts.app')

@section('content')

    <div class="page-header">

        <div>
            <h1>Edit Profil Perusahaan</h1>
            <p>Perbarui informasi utama Bengkel Las Dhea.</p>
        </div>

        <a href="{{ route('profil.index') }}" class="btn-add">
            Kembali
        </a>

    </div>


    @if($errors->any())

        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif


    <div class="content-card">

        <div class="card-header">
            <h2>Informasi Perusahaan</h2>
        </div>


        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="nama_perusahaan">
                    Nama Perusahaan
                </label>

                <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                    value="{{ old('nama_perusahaan', $profil->nama_perusahaan) }}" required>

            </div>


            <div class="form-group">

                <label for="tentang_perusahaan">
                    Tentang Perusahaan
                </label>

                <textarea id="tentang_perusahaan" name="tentang_perusahaan" rows="6"
                    required>{{ old('tentang_perusahaan', $profil->tentang_perusahaan) }}</textarea>

            </div>


            <div class="form-group">

                <label for="alamat">
                    Alamat
                </label>

                <textarea id="alamat" name="alamat" rows="3" required>{{ old('alamat', $profil->alamat) }}</textarea>

            </div>


            <div class="form-group">

                <label for="telepon">
                    Telepon
                </label>

                <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $profil->telepon) }}" required>

            </div>


            <div class="form-group">

                <label for="jam_operasional">
                    Jam Operasional
                </label>

                <input type="text" id="jam_operasional" name="jam_operasional"
                    value="{{ old('jam_operasional', $profil->jam_operasional) }}"
                    placeholder="Contoh: Senin - Sabtu, 08.00 - 17.00" required>

            </div>


            <div class="form-group">

                <label for="maps_embed">
                    Google Maps Embed
                </label>

                <textarea id="maps_embed" name="maps_embed" rows="5"
                    placeholder="Tempel kode iframe Google Maps di sini">{{ old('maps_embed', $profil->maps_embed) }}</textarea>

            </div>


            <div class="form-group">

                <label for="logo">
                    Logo Perusahaan
                </label>

                @if($profil->logo)

                    <div style="margin-bottom: 10px;">

                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo {{ $profil->nama_perusahaan }}"
                            style="max-width: 150px; max-height: 150px;">

                    </div>

                @endif

                <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png,.webp">

                <small>
                    Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>

            </div>


            <div class="form-actions">

                <a href="{{ route('profil.index') }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn-confirm-delete">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

@endsection