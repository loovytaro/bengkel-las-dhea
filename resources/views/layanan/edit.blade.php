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

                <textarea id="deskripsi_layanan" name="deskripsi_layanan" rows="6"
                    required>{{ old('deskripsi_layanan', $layanan->deskripsi_layanan) }}</textarea>

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

        let deleteForm = null;

        function openDeleteModal(button) {

            deleteForm = button.closest('.delete-form');

            document.getElementById('deleteModal').classList.add('show');
        }

        function closeDeleteModal() {

            document.getElementById('deleteModal').classList.remove('show');

            deleteForm = null;
        }

        function confirmDelete() {

            if (deleteForm) {
                deleteForm.submit();
            }

        }

        // Tutup kalau klik area luar modal
        document.getElementById('deleteModal').addEventListener('click', function (event) {

            if (event.target === this) {
                closeDeleteModal();
            }

        });

    </script>

@endsection