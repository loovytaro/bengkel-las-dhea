@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1>Kelola Layanan</h1>
            <p>Kelola daftar layanan yang tersedia di Bengkel Las Dhea.</p>
        </div>

        <a href="{{ route('layanan.create') }}" class="btn-add">
            + Tambah Layanan
        </a>
    </div>

    <div class="content-card">

        <div class="card-header">
            <h2>Daftar Layanan</h2>
            <span>{{ $layanan->count() }} layanan</span>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($layanan->count() > 0)

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($layanan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $item->nama_layanan }}</strong>
                                </td>

                                <td>
                                    {{ $item->deskripsi_layanan }}
                                </td>

                                <td>
                                    <div class="action-buttons">

                                        <a href="{{ route('layanan.edit', $item->id_layanan) }}" class="btn-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('layanan.destroy', $item->id_layanan) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <div class="empty-state">
                <h3>Belum ada layanan</h3>
                <p>Tambahkan layanan pertama Bengkel Las Dhea.</p>

                <a href="{{ route('layanan.create') }}" class="btn-add">
                    + Tambah Layanan
                </a>
            </div>

        @endif

    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="delete-modal">

        <div class="delete-modal-content">

            <div class="delete-modal-header">
                <h2>Hapus Layanan</h2>

                <button type="button" class="modal-close" onclick="closeDeleteModal()">
                    ×
                </button>
            </div>

            <div class="delete-modal-body">
                <p>
                    Yakin ingin menghapus layanan ini?
                </p>

                <small>
                    Data yang sudah dihapus tidak dapat dikembalikan.
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