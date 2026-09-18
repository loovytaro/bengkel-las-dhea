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

                                    <a
                                        href="{{ route('layanan.edit', $item->id_layanan) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('layanan.destroy', $item->id_layanan) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus layanan ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
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

@endsection