@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <h1>Tambah Galeri</h1>
        <p>Tambahkan foto dokumentasi Bengkel Las Dhea.</p>
    </div>

</div>


<div class="content-card form-card">

    <div class="card-header">
        <h2>Informasi Galeri</h2>
    </div>


    <form
        action="{{ route('galeri.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="form-content"
    >

        @csrf


        <div class="form-group">

            <label for="nama_galeri">
                Nama Galeri
            </label>

            <input
                type="text"
                id="nama_galeri"
                name="nama_galeri"
                value="{{ old('nama_galeri') }}"
                placeholder="Contoh: Pembuatan Pagar Besi"
                required
            >

            @error('nama_galeri')
                <small class="error-text">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="form-group">

            <label for="kategori_galeri">
                Kategori Galeri
            </label>

            <input
                type="text"
                id="kategori_galeri"
                name="kategori_galeri"
                value="{{ old('kategori_galeri') }}"
                placeholder="Contoh: Pagar"
                required
            >

            @error('kategori_galeri')
                <small class="error-text">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="form-group">

            <label for="foto">
                Foto
            </label>

            <input
                type="file"
                id="foto"
                name="foto"
                accept="image/jpeg,image/png,image/webp"
                required
            >

            <small class="form-hint">
                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
            </small>

            @error('foto')
                <small class="error-text">
                    {{ $message }}
                </small>
            @enderror

        </div>


        <div class="form-actions">

            <a
                href="{{ route('galeri.index') }}"
                class="btn-cancel"
            >
                Kembali
            </a>

            <button
                type="submit"
                class="btn-add"
            >
                Simpan Galeri
            </button>

        </div>

    </form>

</div>

@endsection