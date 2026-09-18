<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') - Bengkel Las Dhea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="admin-wrapper">

        {{-- SIDEBAR --}}
        <aside class="sidebar">

            <div class="sidebar-brand">
                <div class="brand-logo">
                    <img src="{{ asset('image/logobengkel-removebg.png') }}" alt="Logo">
                </div>

                <div>
                    <h4>Bengkel Las Dhea</h4>
                    <small>Administrator</small>
                </div>
            </div>


            <nav class="sidebar-menu">

                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>


                {{-- PROFIL HANYA UNTUK PEMILIK --}}
                @if (session('admin_role') === 'pemilik')
                    <a href="#" class="{{ request()->routeIs('profil.*') ? 'active' : '' }}">
                        Profil Perusahaan
                    </a>
                @endif


                <a href="{{ route('layanan.index') }}" class="{{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                    Layanan
                </a>


                <a href="#" class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                    Galeri
                </a>

            </nav>


            <div class="sidebar-bottom">

                <div class="user-info">
                    <strong>{{ session('admin_username') }}</strong>

                    <span>{{ ucfirst(session('admin_role')) }}</span>
                </div>


                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>
                </form>

            </div>

        </aside>


        {{-- MAIN CONTENT --}}
        <main class="main-content">

            <header class="topbar">

                <div>
                    <h2>@yield('page-title', 'Dashboard')</h2>

                    <p>@yield('page-description', 'Selamat datang di sistem administrasi Bengkel Las Dhea.')</p>
                </div>

            </header>


            <section class="content-area">

                @yield('content')

            </section>

        </main>

    </div>

</body>

</html>