<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Layanan - Bengkel Las Dhea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Layanan</h2>
            <p class="text-muted mb-0">
                Kelola layanan Bengkel Las Dhea
            </p>
        </div>

        <a href="{{ route('layanan.create') }}"
           class="btn btn-dark">
            + Tambah Layanan
        </a>

    </div>


    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse ($layanan as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    {{ $item->nama_layanan }}
                                </strong>
                            </td>

                            <td>
                                {{ $item->deskripsi_layanan }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('layanan.edit', $item->id_layanan) }}"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>


                                <form
                                    action="{{ route('layanan.destroy', $item->id_layanan) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus layanan ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted py-4">

                                Belum ada layanan.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>