@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Galeri</h1>
        <p>Ubah informasi foto galeri Bengkel Las Dhea.</p>
    </div>
</div>

<div class="content-card form-card">

    <div class="card-header">
        <h2>Informasi Galeri</h2>
    </div>

    <form
        action="{{ route('galeri.update', $galeri->id_galeri) }}"
        method="POST"
        enctype="multipart/form-data"
        class="form-content"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_galeri">Nama Galeri</label>

            <input
                type="text"
                id="nama_galeri"
                name="nama_galeri"
                value="{{ old('nama_galeri', $galeri->nama_galeri) }}"
                required
            >

            @error('nama_galeri')
                <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori_galeri">Kategori</label>

            <input
                type="text"
                id="kategori_galeri"
                name="kategori_galeri"
                value="{{ old('kategori_galeri', $galeri->kategori_galeri) }}"
                required
            >

            @error('kategori_galeri')
                <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="foto">Ganti Foto</label>

            <input
                type="file"
                id="foto"
                name="foto"
                accept="image/*"
            >

            @error('foto')
                <small class="error-text">{{ $message }}</small>
            @enderror

            <small>
                Kosongkan jika tidak ingin mengganti foto.
            </small>
        </div>

        <div class="form-actions">

            <a
                href="{{ route('galeri.index') }}"
                class="btn-cancel"
            >
                Kembali
            </a>

            <button type="submit" class="btn-add">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection