<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Bengkel Las Dhea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="login-page">

        {{-- Background --}}
        <div
            class="login-background"
            style="background-image: url('{{ asset('image/footagebengkel.jpeg') }}');">
        </div>

        {{-- Login Card --}}
        <div class="login-card">

            <div class="login-header">
                <h1>Hai, Admin</h1>
                <p>Selamat datang!</p>
            </div>

            @if ($errors->any())
                <div class="login-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        value="{{ old('username') }}"
                        autocomplete="off"
                        required
                    >
                </div>

                <div class="form-group">
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        autocomplete="off"
                        required
                    >
                </div>

                <div class="form-group">
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <div class="forgot-wrapper">
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit">
                    Login
                </button>

            </form>

        </div>

    </div>

</body>
</html>