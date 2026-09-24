@extends('layouts.app')

@section('content')

    <div class="page-header">

        <div>
            <h1>Kelola Pengguna</h1>
            <p>Kelola akun dan hak akses pengguna Bengkel Las Dhea.</p>
        </div>

        <a href="{{ route('pengguna.create') }}" class="btn-add">
            + Tambah Pengguna
        </a>

    </div>


    <div class="content-card">

        <div class="card-header">
            <h2>Daftar Pengguna</h2>

            <span>
                {{ $pengguna->count() }} pengguna
            </span>
        </div>


        @if(session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if($pengguna->count() > 0)

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($pengguna as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>{{ $item->username }}</strong>
                                </td>

                                <td>
                                    {{ $item->email }}
                                </td>

                                <td>
                                    {{ ucfirst($item->role) }}
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a
                                            href="{{ route('pengguna.edit', $item->id_admin) }}"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('pengguna.destroy', $item->id_admin) }}"
                                            method="POST"
                                            class="delete-form"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus pengguna ini?')"
                                            >
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

                <h3>Belum ada pengguna</h3>

                <p>
                    Tambahkan pengguna untuk mengelola sistem Bengkel Las Dhea.
                </p>

                <a href="{{ route('pengguna.create') }}" class="btn-add">
                    + Tambah Pengguna
                </a>

            </div>

        @endif

    </div>

@endsection