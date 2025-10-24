<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>Berita</title>

   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
   <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />

   <style>
    .news-section {
    background: linear-gradient(145deg, #f0f0f0, #ffffff);
    }

    .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-secondary:hover {
    background-color: #6c757d;
    color: white;
    }

   </style>
</head>

<body class="main-layou t inner_page">
   <!-- loader -->
   <div class="loader_bg">
      <div class="loader"><img src="{{ asset('images/uhnload.gif') }}" alt="Loading"/></div>
   </div>

   <!-- header -->
   <div class="header">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class="col-md-2 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/logouhn.png') }}" alt="Logo" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-sm-12">
               <nav class="navigation navbar navbar-expand-md navbar-dark">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/opsi') }}">Rekomendasi</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/recruitment') }}">Recruitment</a></li> -->
                    
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="col-md-2">
               <ul class="email text_align_right">
                  <li class="d_none"><a href="{{ url('/dashboard') }}"><i class="fa fa-user"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <!-- berita section -->
<section class="news-section" style="padding: 80px 0; background-color: #f9f9f9;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-10">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
               <div class="card-body p-5" style="background-color: #ffffff; border-radius: 12px;">
                  <h1 class="mb-3" style="font-weight: bold; font-size: 2.2rem; color: #333;">
                     {{ $berita->judul }}
                  </h1>
                  <p class="text-muted mb-4" style="font-size: 0.95rem;">
                     <i class="fa fa-calendar mr-2"></i>{{ $berita->tanggal_berita }}
                  </p>
                  <div class="text-center mb-4">
                     <img src="{{ asset('storage/' . $berita->foto_kegiatan) }}" class="img-fluid rounded" alt="Gambar Berita" style="max-height: 450px; object-fit: cover;">
                  </div>
                  <p class="mb-4" style="font-size: 1.1rem; font-weight: 500; color: #444;">
                     {{ $berita->deskripsi }}
                  </p>
                  <div class="mb-4" style="line-height: 1.8; color: #555; font-size: 1rem;">
                     {!! nl2br(e($berita->isi_berita)) !!}
                  </div>
                  <div class="text-right">
                     <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 8px; transition: all 0.3s ease;">
                        ← Kembali
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


   <!-- footer -->
   <footer>
      <div class="copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>© 2024 All Rights Reserved.</p>
               </div>
            </div>
         </div>
      </div>
   </footer>

   <!-- JS -->
   <script src="{{ asset('js/jquery.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
   <script src="{{ asset('js/custom.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>
</body>
</html>
