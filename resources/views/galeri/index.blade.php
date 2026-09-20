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

                        <img
                            src="{{ asset('storage/' . $item->foto) }}"
                            alt="{{ $item->nama_galeri }}"
                        >

                    </div>


                    <div class="gallery-info">

                        <h3>
                            {{ $item->nama_galeri }}
                        </h3>

                        <span>
                            {{ $item->kategori_galeri }}
                        </span>


                        <div class="action-buttons">

                            <a
                                href="{{ route('galeri.edit', $item->id_galeri) }}"
                                class="btn-edit"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('galeri.destroy', $item->id_galeri) }}"
                                method="POST"
                                class="delete-form"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus foto ini?')"
                                >
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

            <a
                href="{{ route('galeri.create') }}"
                class="btn-add"
            >
                + Tambah Galeri
            </a>

        </div>

    @endif

</div>

@endsection