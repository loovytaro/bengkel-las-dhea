@extends('layouts.app')

@section('content')

    <div class="page-header">

        <div>
            <h1>Kelola Galeri</h1>
            <p>Kelola foto dan dokumentasi Bengkel Las Dhea.</p>
        </div>

        <a href="{{ route('galeri.create') }}" class="btn-add">
            + Tambah Galeri
        </a>

    </div>


    <div class="content-card">

        <div class="card-header">
            <h2>Daftar Galeri</h2>

            <span>
                {{ $galeri->count() }} foto
            </span>
        </div>


        @if(session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if($galeri->count() > 0)

            <div class="gallery-grid">

                @foreach($galeri as $item)

                    <div class="gallery-item">

                        <div class="gallery-image">

                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_galeri }}">

                        </div>


                        <div class="gallery-info">

                            <h3>
                                {{ $item->nama_galeri }}
                            </h3>

                            <span>
                                {{ $item->kategori_galeri }}
                            </span>


                            <div class="action-buttons">

                                <a href="{{ route('galeri.edit', $item->id_galeri) }}" class="btn-edit">
                                    Edit
                                </a>


                                <form action="{{ route('galeri.destroy', $item->id_galeri) }}" method="POST" class="delete-form">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn-delete" onclick="openDeleteModal(this)">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <h3>Belum ada galeri</h3>

                <p>
                    Tambahkan foto pertama Bengkel Las Dhea.
                </p>

                <a href="{{ route('galeri.create') }}" class="btn-add">
                    + Tambah Galeri
                </a>

            </div>

        @endif

    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="delete-modal">

        <div class="delete-modal-content">

            <div class="delete-modal-header">
                <h2>Hapus Galeri</h2>

                <button type="button" class="modal-close" onclick="closeDeleteModal()">
                    ×
                </button>
            </div>

            <div class="delete-modal-body">
                <p>
                    Yakin ingin menghapus foto ini?
                </p>

                <small>
                    Foto yang sudah dihapus tidak dapat dikembalikan.
                </small>
            </div>

            <div class="delete-modal-footer">

                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">
                    Batal
                </button>

                <button type="button" class="btn-confirm-delete" onclick="confirmDelete()">
                    Hapus
                </button>

            </div>

        </div>

    </div>

    <script>
        let deleteForm = null;

        function openDeleteModal(button) {
            deleteForm = button.closest('.delete-form');

            document
                .getElementById('deleteModal')
                .classList.add('show');
        }

        function closeDeleteModal() {
            document
                .getElementById('deleteModal')
                .classList.remove('show');

            deleteForm = null;
        }

        function confirmDelete() {
            if (deleteForm) {
                deleteForm.submit();
            }
        }

        document
            .getElementById('deleteModal')
            .addEventListener('click', function (event) {

                if (event.target === this) {
                    closeDeleteModal();
                }

            });
    </script>

@endsection