<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>{{ $abouts->nama_organisasi }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Open+Sans&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f4f6f9;
            margin: 0;
            color: #333;
            line-height: 1.6;
        }

        h1,
        h2,
        h3 {
            font-family: 'Poppins', sans-serif;
            color: #00244D;
        }

        .ukm-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .hero-banner {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            color: white;
            border-radius: 16px;
            padding: 70px 30px;
            text-align: center;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .hero-banner::before {
            content: "\f001";
            font-family: FontAwesome;
            font-size: 180px;
            color: rgba(255, 255, 255, 0.05);
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .hero-banner h1 {
            font-size: 3.2rem;
            margin-bottom: 12px;
        }

        .hero-banner p {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .btn-primary-custom {
            background-color: #ff6600;
            border: none;
            padding: 14px 36px;
            font-weight: 600;
            font-size: 1.15rem;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background-color: #e65c00;
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin: 40px 0 25px;
            color: #00244D;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: #ff6600;
            margin: 8px auto 0;
            border-radius: 3px;
        }

        .description p {
            max-width: 700px;
            margin: 0 auto 20px;
            font-size: 1.1rem;
            text-align: center;
        }

        table.schedule-table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto 40px;
            border-collapse: collapse;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        table.schedule-table th,
        table.schedule-table td {
            padding: 12px 20px;
            text-align: center;
            background: white;
        }

        table.schedule-table thead th {
            background-color: #00244D;
            color: white;
            font-weight: 600;
        }

        table.schedule-table tbody tr:nth-child(even) td {
            background: #f9f9f9;
        }

        .testimonial {
            max-width: 700px;
            margin: 0 auto 40px;
            font-style: italic;
            font-size: 1.15rem;
            text-align: center;
            color: #555;
            border-left: 4px solid #ff6600;
            padding-left: 20px;
        }

        .testimonial-author {
            margin-top: 10px;
            font-weight: 600;
            color: #00244D;
        }

        .contact-section {
            text-align: center;
            margin-bottom: 60px;
        }

        .contact-section p {
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #00244D;
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            max-width: 400px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .contact-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            color: #333;
        }

        .contact-list li i {
            color: #ff6600;
            font-size: 1.5rem;
            min-width: 30px;
            text-align: center;
        }

        .social-icons {
            margin-top: 15px;
        }

        .social-icons a {
            margin: 0 10px;
            color: #00244D;
            font-size: 1.8rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #ff6600;
            text-decoration: none;
        }

        .gallery-section {
            margin-top: 40px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .gallery-item {
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .gallery-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-image:hover {
            transform: scale(1.05);
        }


        footer {
            background: #00244D;
            color: white;
            text-align: center;
            padding: 20px 10px;
            font-size: 0.9rem;
            margin-top: 50px;
        }

        @media (max-width: 600px) {
            .hero-banner h1 {
                font-size: 2rem;
            }

            .hero-banner p {
                font-size: 1rem;
            }

            .contact-list {
                max-width: 100%;
            }

            table.schedule-table {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="ukm-container">
        <!-- Hero Banner -->
        <section class="hero-banner">
            <h1>{{ $abouts->nama_organisasi }}</h1>
            <p>{{ $abouts->slogan }}</p>
            <a href="{{ route('recruitment') }}" class="btn-primary-custom">Daftar Sekarang</a>
        </section>

        <!-- Tentang Kami -->
        <section class="description">
            <h2 class="section-title">Tentang Kami</h2>
            <p>
                {{ $abouts->tentang_kami }}
            </p>
        </section>

        <!-- Galeri Kegiatan -->
        @if($fotos->count() > 0)
            <section class="gallery-section">
                <h2 class="section-title">Dokumentasi Kegiatan</h2>
                <div class="gallery-grid">
                    @foreach ($fotos as $foto)
                        <div class="gallery-item">
                            <img src="{{ asset('storage/' . $foto->foto_kegiatan) }}" alt="Foto Kegiatan" class="gallery-image">
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
<br>

        <!-- Kontak -->
        <section class="contact-section">
            <p class="section-title">Informasi lebih lanjut hubungi kami:</p>
            <ul class="contact-list">
                @if ($abouts->email)
                    <li><i class="fa fa-envelope"></i> {{ $abouts->email }}</li>
                @endif
                @if ($abouts->nomer_telepon)
                    <li><i class="fa fa-phone"></i> {{ $abouts->nomer_telepon }}</li>
                @endif
                @if ($abouts->lokasi)
                    <li><i class="fa fa-map-marker"></i> {{ $abouts->lokasi }}</li>
                @endif
            </ul>
        </section>

    </div>

    <footer>
        <p>© {{ date('Y') }} {{ $abouts->nama_organisasi }} | All Rights Reserved.</p>
    </footer>

    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>