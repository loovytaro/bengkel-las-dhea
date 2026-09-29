@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1>Edit Layanan</h1>
            <p>Ubah informasi layanan Bengkel Las Dhea.</p>
        </div>
    </div>

    <div class="content-card form-card">

        <div class="card-header">
            <h2>Informasi Layanan</h2>
        </div>

        <form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="POST" class="form-content">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_layanan">Nama Layanan</label>

                <input type="text" id="nama_layanan" name="nama_layanan"
                    value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>

                @error('nama_layanan')
                    <small class="error-text">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi_layanan">Deskripsi Layanan</label>

                <textarea id="deskripsi_layanan" name="deskripsi_layanan" rows="6" maxlength="100"
                    required>{{ old('deskripsi_layanan', $layanan->deskripsi_layanan) }}</textarea>

                <div class="character-count">
                    <span id="charCount">0</span>/100 karakter
                </div>

                @error('deskripsi_layanan')
                    <small class="error-text">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-actions">

                <a href="{{ route('layanan.index') }}" class="btn-cancel">
                    Kembali
                </a>

                <button type="submit" class="btn-add">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

    <script>
        const textarea = document.getElementById('deskripsi_layanan');
        const charCount = document.getElementById('charCount');

        function updateCharCount() {
            charCount.textContent = textarea.value.length;
        }

        textarea.addEventListener('input', updateCharCount);

        updateCharCount();
    </script>

@endsection 