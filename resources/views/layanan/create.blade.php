@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Tambah Layanan</h1>
        <p>Tambahkan layanan baru Bengkel Las Dhea.</p>
    </div>
</div>

<div class="content-card">

    <div class="card-header">
        <h2>Form Layanan</h2>
    </div>

    <div class="form-container">

        <form action="{{ route('layanan.store') }}" method="POST">
            @csrf

            {{-- Nama Layanan --}}
            <div class="form-group">
                <label for="nama_layanan">Nama Layanan</label>

                <input
                    type="text"
                    id="nama_layanan"
                    name="nama_layanan"
                    value="{{ old('nama_layanan') }}"
                    placeholder="Contoh: Pembuatan Pagar Besi"
                    required
                >

                @error('nama_layanan')
                    <small class="error-message">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group">
                <label for="deskripsi_layanan">Deskripsi Layanan</label>

                <textarea
                    id="deskripsi_layanan"
                    name="deskripsi_layanan"
                    rows="6"
                    placeholder="Masukkan deskripsi layanan..."
                    required
                >{{ old('deskripsi_layanan') }}</textarea>

                @error('deskripsi_layanan')
                    <small class="error-message">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="form-actions">

                <a href="{{ route('layanan.index') }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn-add">
                    Simpan Layanan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection