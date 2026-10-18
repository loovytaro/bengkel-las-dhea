<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Beranda | Bengkel Las Dhea</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero {
            position: relative;
            min-height: 100vh;
            background:
                linear-gradient(90deg,
                    rgba(0, 0, 0, 0.18)),
                url('/image/bengkel-hero.jpeg') center / cover no-repeat;
            color: white;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            padding: 24px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            position: relative;
            z-index: 2;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 18px;
            text-decoration: none;
            color: white;
            flex-shrink: 0;
        }

        .brand img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .brand span {
            font-size: 20px;
            font-weight: 700;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 42px;
        }

        .nav-menu a {
            position: relative;
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 8px 0;
            transition: color 0.2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #ff7900;
        }

        .nav-menu a.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 4px;
            background: #ff7900;
        }

        /* HERO CONTENT */
        .hero-content {
            position: relative;
            z-index: 1;
            padding: 130px 6% 90px;
            max-width: 950px;
        }

        .hero-content h1 {
            font-size: clamp(40px, 4.6vw, 76px);
            line-height: 1.12;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: -1.5px;
            margin-bottom: 52px;
        }

        .btn-layanan {
            display: inline-block;
            padding: 23px 52px;
            border-radius: 50px;
            background: #ff7900;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.2s, transform 0.2s;
        }

        .btn-layanan:hover {
            background: #e66d00;
            transform: translateY(-2px);
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .navbar {
                padding: 20px 5%;
                flex-wrap: wrap;
            }

            .brand img {
                width: 70px;
                height: 70px;
            }

            .brand span {
                font-size: 19px;
            }

            .nav-menu {
                width: 100%;
                justify-content: space-between;
                gap: 12px;
                flex-wrap: wrap;
            }

            .nav-menu a {
                font-size: 10px;
            }

            .hero-content {
                padding: 110px 5% 70px;
            }

            .hero-content h1 {
                max-width: 700px;
            }
        }

        @media (max-width: 480px) {
            .nav-menu {
                justify-content: flex-start;
                column-gap: 22px;
                row-gap: 8px;
            }

            .hero-content {
                padding-top: 90px;
            }

            .hero-content h1 {
                font-size: 30px;
                letter-spacing: -0.8px;
                margin-bottom: 35px;
            }

            .btn-layanan {
                padding: 17px 32px;
                font-size: 16px;
            }
        }

        /* TENTANG */
        .about-section {
            padding: 90px 6%;
            background: #fff;
            color: #171717;
            font-family: Arial, Helvetica, sans-serif;
            scroll-margin-top: 30px;
        }

        .about-container {
            max-width: 1440px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 0.9fr 1.3fr;
            align-items: center;
            gap: 9%;
        }

        /* FOTO BERTUMPUK */
        .about-images {
            position: relative;
            width: 100%;
            max-width: 480px;
            height: 560px;
        }

        .about-image-main {
            display: block;
            width: 88%;
            height: 100%;
            object-fit: cover;
        }

        .about-image-overlay {
            position: absolute;
            top: 22%;
            right: 0;
            width: 58%;
            height: 62%;
            object-fit: cover;
            border: 8px solid #fff;
        }

        /* DESKRIPSI */
        .about-label {
            display: inline-block;
            margin-bottom: 12px;
            color: #ff7900;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .about-content h2 {
            margin-bottom: 22px;
            font-size: clamp(20px, 2.0vw, 33px);
            line-height: 1.4;
            font-weight: 800;
            text-transform: uppercase;
        }

        .about-description,
        .about-intro {
            color: #606060;
            font-size: 17px;
            line-height: 1.9;
        }

        .about-description {
            margin-bottom: 30px;
        }

        .about-intro {
            margin-bottom: 16px;
        }

        /* TIGA PRINSIP */
        .about-principles {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .about-principle {
            display: grid;
            grid-template-columns: 48px 1fr;
            align-items: start;
            gap: 20px;
        }

        .about-number {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 38px;
            height: 46px;
            border: 2px solid #ff7900;
            color: #ff7900;
            font-size: 22px;
            font-weight: 600;
        }

        .about-principle h3 {
            margin: 0 0 3px;
            font-size: 17px;
            font-weight: 800;
        }

        .about-principle p {
            margin: 0;
            color: #606060;
            font-size: 15px;
            line-height: 1.7;
        }

        /* STATISTIK */
        .about-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 1440px;
            margin: 65px auto 0;
            text-align: center;
        }

        .about-stat strong {
            display: block;
            margin-bottom: 10px;
            font-size: clamp(25px, 3vw, 40px);
            font-weight: 800;
        }

        .about-stat span {
            color: #606060;
            font-size: 17px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .about-container {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .about-images {
                max-width: 520px;
                height: 480px;
                margin: 0 auto;
            }

            .about-stats {
                margin-top: 50px;
            }
        }

        @media (max-width: 550px) {
            .about-section {
                padding: 60px 5%;
            }

            .about-images {
                height: 360px;
            }

            .about-image-overlay {
                border-width: 5px;
            }

            .about-description,
            .about-intro {
                font-size: 15px;
            }

            .about-principle {
                grid-template-columns: 38px 1fr;
                gap: 12px;
            }

            .about-number {
                width: 34px;
                height: 42px;
            }

            .about-stats {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .about-stat strong {
                font-size: 32px;
            }

            .about-stat span {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- BERANDA -->

    <section class="hero" id="beranda">

        <!-- NAVBAR -->

        <header class="navbar">

            <a href="#beranda" class="brand">
                <img src="{{ asset('image/logobengkel-removebg.png') }}" alt="Logo Bengkel Las Dhea">

                <span>BENGKEL LAS DHEA</span>
            </a>

            <nav class="nav-menu">
                <a href="#beranda" class="active">Beranda</a>
                <a href="#tentang">Tentang</a>
                <a href="#layanan">Layanan</a>
                <a href="#galeri">Galeri</a>
                <a href="#kontak">Kontak</a>
            </nav>

        </header>

        <div class="hero-content">
            <h1>
                Sambungan<br>
                Sempurna untuk<br>
                Masa Depan.
            </h1>

            <a href="#layanan" class="btn-layanan">
                Lihat Layanan
            </a>
        </div>

    </section>

    <!-- TENTANG -->

    <section class="about-section" id="tentang">
        <div class="about-container">

            <div class="about-images">
                <img src="{{ asset('image/tentang-bg.jpeg') }}" alt="Area kerja Bengkel Las Dhea"
                    class="about-image-main">

                <img src="{{ asset('image/tentang.jpeg') }}" alt="Proses pengerjaan di Bengkel Las Dhea"
                    class="about-image-overlay">
            </div>

            <div class="about-content">
                <h2>
                    Dari Bengkel Kecil di Pinggir Jalan,
                    Jadi Rekan Terpercaya.
                </h2>

                <p class="about-description">
                    Bengkel Las Dhea berdiri sejak tahun 2000 sebagai
                    bengkel las rumahan. Kami mengerjakan berbagai
                    kebutuhan pengelasan, mulai dari pagar rumah,
                    tralis, kanopi, tangga putar, toren, menara air,
                    hingga pekerjaan konstruksi lainnya.
                </p>

                <p class="about-intro">
                    Setiap proyek kami kerjakan dengan tiga prinsip:
                </p>

                <div class="about-principles">

                    <div class="about-principle">
                        <span class="about-number">1</span>
                        <div>
                            <h3>Kualitas</h3>
                            <p>
                                Mengutamakan hasil pengerjaan yang kuat,
                                rapi, dan sesuai kebutuhan pelanggan.
                            </p>
                        </div>
                    </div>

                    <div class="about-principle">
                        <span class="about-number">2</span>
                        <div>
                            <h3>Ketelitian</h3>
                            <p>
                                Memperhatikan setiap bagian agar hasil
                                pengerjaan sesuai harapan.
                            </p>
                        </div>
                    </div>

                    <div class="about-principle">
                        <span class="about-number">3</span>
                        <div>
                            <h3>Kepercayaan</h3>
                            <p>
                                Menjaga kepercayaan pelanggan melalui
                                komunikasi dan pelayanan yang baik.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="about-stats">
            <div class="about-stat">
                <strong>20+</strong>
                <span>Tahun Pengalaman</span>
            </div>

            <div class="about-stat">
                <strong>50+</strong>
                <span>Proyek Selesai</span>
            </div>

            <div class="about-stat">
                <strong>99%</strong>
                <span>Klien Puas</span>
            </div>
        </div>
    </section>
</body>

</html>