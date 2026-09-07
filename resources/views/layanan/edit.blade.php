<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Layanan - Bengkel Las Dhea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container py-5">

    <div class="mb-4">

        <h2 class="fw-bold">
            Edit Layanan
        </h2>

        <p class="text-muted">
            Ubah informasi layanan.
        </p>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form
                action="{{ route('layanan.update', $layanan->id_layanan) }}"
                method="POST">

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Nama Layanan
                    </label>

                    <input
                        type="text"
                        name="nama_layanan"
                        class="form-control"
                        value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi Layanan
                    </label>

                    <textarea
                        name="deskripsi_layanan"
                        class="form-control"
                        rows="5"
                        required>{{ old('deskripsi_layanan', $layanan->deskripsi_layanan) }}</textarea>

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('layanan.index') }}"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-dark">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>