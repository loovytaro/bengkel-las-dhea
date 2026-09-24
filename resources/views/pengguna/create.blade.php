@extends('layouts.app')

@section('content')

    <div class="page-header">

        <div>
            <h1>Tambah Pengguna</h1>
            <p>Tambahkan akun pengguna baru Bengkel Las Dhea.</p>
        </div>

    </div>


    <div class="content-card form-card">

        <div class="card-header">
            <h2>Informasi Pengguna</h2>
        </div>


        <form action="{{ route('pengguna.store') }}" method="POST" class="form-content">

            @csrf


            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    required
                >

                @error('username')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

                @error('password')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label for="role">
                    Role
                </label>

                <select id="role" name="role" required>

                    <option value="">Pilih Role</option>

                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="pemilik" {{ old('role') == 'pemilik' ? 'selected' : '' }}>
                        Pemilik
                    </option>

                </select>

                @error('role')
                    <small class="error-text">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-actions">

                <a href="{{ route('pengguna.index') }}" class="btn-cancel">
                    Kembali
                </a>

                <button type="submit" class="btn-add">
                    Simpan Pengguna
                </button>

            </div>

        </form>

    </div>

@endsection