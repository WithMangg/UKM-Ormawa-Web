<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
   <link rel="icon" type="image/png" href="/images/logouhn.png">
   <!-- site metas -->
   <title>Website Ormawa Connect</title>
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css" />
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
   <!-- fevicon -->
   <link rel="icon" href="images/logouhn.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />

   <style>
   #berita {
      padding-top: 100px;
      margin-top: 50px;
   }

   .swiper {
      padding-bottom: 50px;
   }

   .swiper-slide {
      display: flex;
      height: auto !important;
      padding: 10px;
   }

   .news-box.card {
      display: flex;
      flex-direction: column;
      height: 100%;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
   }

   .news-box.card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
   }

   .news-box.card img.card-img-top {
      height: 200px;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      transition: transform 0.4s ease;
   }

   .news-box.card:hover img.card-img-top {
      transform: scale(1.05);
   }

   .news-box .card-body {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
      padding: 1rem;
   }

   .news-box .card-title {
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: #222;
   }

   .news-box .card-body .fw-medium {
      font-weight: 500;
   }

   .news-box .card-body .text-muted {
      flex-grow: 1;
      color: #555;
   }

   .news-box .btn {
      margin-top: auto;
      align-self: flex-start;
      margin-bottom: 0.5rem;
   }

   #berita .container {
      max-width: 1200px;
   }

   .video-container {
         position: relative;
         padding-bottom: 56.25%;
         /* 16:9 */
         height: 0;
         overflow: hidden;
         max-width: 100%;
         border-radius: 12px;
         box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }

      .video-container iframe {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         border: none;
      }

   @media (max-width: 767px) {
      .news-box.card img.card-img-top {
         height: 150px;
      }
   }
</style>

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
      ><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/uhnload.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <div class="header">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class=" col-md-2 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.html"><img src="images/logouhn.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-sm-12">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                     aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/about') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/opsi') }}">Rekomendasi</a>
                        </li>
                        <!-- <li class="nav-item">
                           <a class="nav-link" href="{{ url('/recruitment') }}">Recruitment</a>
                        </li> -->

                     </ul>
                  </div>
               </nav>
            </div>
            <div class="col-md-2">
               <ul class="email text_align_right">
                  <li class="d_none">
                     <a href="{{ url('/dashboard') }}" class="btn btn-primary d-flex align-items-center gap-2"
                        style="border-radius: 25px; padding: 8px 20px; background: #3e0bce; border: none;">
                        <i class="fa fa-user" aria-hidden="true" style="font-size: 1rem; color: white"></i>
                        <!-- <span style="font-weight: 300;">Login</span> -->
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- top -->
   <div class="full_bg">
      <div class="slider_main">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <!-- carousel code -->
                  <div id="carouselExampleIndicators" class="carousel slide">
                     <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <!-- first slide -->
                        <div class="carousel-item active">
                           <div class="carousel-caption relative">
                              <div class="row d_flex">
                                 <div class="col-md-5">
                                    <div class="board">
                                       <i><img src="images/top_icon.png" alt="#" /></i>
                                       <h3>
                                          Ormawa<br /> Connect<br />
                                       </h3>
                                       <div class="link_btn">
                                          <a class="read_more" href="Javascript:void(0)">Read More
                                             <span></span></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="banner_img">
                                       <figure>
                                          <img class="img_responsive" src="images/ukm.png" />
                                       </figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- second slide -->
                        <div class="carousel-item">
                           <div class="carousel-caption relative">
                              <div class="row d_flex">
                                 <div class="col-md-5">
                                    <div class="board">
                                       <i><img src="images/top_icon.png" alt="#" /></i>
                                       <h3>
                                          Ormawa<br /> Connect<br />
                                       </h3>
                                       <div class="link_btn">
                                          <a class="read_more" href="Javascript:void(0)">Read More
                                             <span></span></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="banner_img">
                                       <figure>
                                          <img class="img_responsive" src="images/ukm.png" />
                                       </figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- third slide-->
                        <div class="carousel-item">
                           <div class="carousel-caption relative">
                              <div class="row d_flex">
                                 <div class="col-md-5">
                                    <div class="board">
                                       <i><img src="images/top_icon.png" alt="#" /></i>
                                       <h3>
                                          Ormawa<br /> Connect<br />
                                       </h3>
                                       <div class="link_btn">
                                          <a class="read_more" href="Javascript:void(0)">Read More<span></span></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="banner_img">
                                       <figure>
                                          <img class="img_responsive" src="images/ukm.png" />
                                       </figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- controls -->
                     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end banner -->

   <!-- our class -->
   <!-- Section: Berita Acara & Kegiatan Kampus -->
   <section id="berita" class="pt-5 mt-5">
      <div class="container">
         <div class="row text-center mb-4">
            <div class="col">
               <h2>Berita Acara & Kegiatan Kampus</h2>
            </div>
         </div>
         <div class="row">
            <div class="col">
               @if ($beritas->isEmpty())
               <div class="bg-white p-5 text-center rounded-lg shadow-sm">
                 <p class="text-muted mb-0">Belum ada berita yang ditambahkan.</p>
               </div>
            @else
               <div class="swiper mySwiper">
                 <div class="swiper-wrapper">
                   @foreach ($beritas as $data)
                  <div class="swiper-slide">
                   <div class="card h-100 border-0 shadow-sm news-box">
                     <img src="{{ asset('storage/' . $data->foto_kegiatan) }}" class="card-img-top"
                       alt="Gambar Berita" style="height: 200px; object-fit: cover;">
                     <div class="card-body d-flex flex-column">
                       <h5 class="card-title text-primary fw-bold">{{ $data->judul }}</h5>
                       <small class="text-muted mb-2">{{ $data->tanggal_berita }}</small>
                       <p class="mb-1 fw-medium">{{ $data->deskripsi }}</p>
                       <p class="text-muted" style="flex-grow: 1;">
                        {{ Str::limit(strip_tags($data->isi_berita), 100, '...') }}
                       </p>
                     </div>
                     <a href="{{ route('info-berita', $data->id) }}" class="btn btn-outline-primary mt-auto">
                       Baca Selengkapnya
                     </a>
                   </div>
                  </div>
               @endforeach
                 </div>

                 <!-- Navigasi Panah
                 <div class="swiper-button-next"></div>
                 <div class="swiper-button-prev"></div> -->

                 <!-- Pagination (opsional) -->
                 <div class="swiper-pagination"></div>
               </div>
            @endif
            </div>
         </div>
      </div>
      </br>
   </section>

   <!-- end our class -->

   <!-- about -->
   <div class="about">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class="col-md-6">
               <div class="titlepage text_align_left">
                  <h2 style="padding-left: 60px">Tentang <br>Ormawa Connect</h2>
                  <div class="indexpage">
                     <p>Selamat datang di platform Rekomendasi Ormawa Kampus! Kami hadir untuk membantu mahasiswa
                        menemukan Organisasi Kemahasiswaan (ORMAWA) yang paling sesuai dengan minat, bakat, dan tujuan
                        pribadi mereka. Website ini dirancang untuk mempermudah mahasiswa dalam menjelajahi berbagai
                        organisasi di kampus, memberikan informasi terperinci, serta menyediakan fitur-fitur yang
                        inovatif dan interaktif
                     </p>
                  </div>
                  <div class="link_btn">
                     <a class="read_more" href={{ url('/about') }}>Baca selengkapnya</a>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="about_img text_align_center">
                  <figure><img src="images/ukm1.png" alt="#" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end about -->

   <!-- Section: Video Kegiatan -->
   <section class="video-section container mb-5 mt-5">
      <h2 class="text-center mb-4">Video </h2>
      <div class="video-container mx-auto">
         <iframe width="560" height="315" src="https://www.youtube.com/embed/8WPlzqvwS9s"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
         </iframe>

      </div>
   </section>


   </div>
   </section>


   <footer>
      <div class="copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <p>© 2025 All Rights Reserved</a></p>
                  <!-- <p>© 2020 All Rights Reserved. Design by <a href="https://html.design/"> Free html Templates</a></p> -->
               </div>
            </div>
         </div>
      </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/custom.js"></script>
   <script>
      AOS.init();
   </script>
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
   <script>
      document.addEventListener('DOMContentLoaded', function () {
         new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
            pagination: {
               el: ".swiper-pagination",
               clickable: true,
            },
            breakpoints: {
               768: {
                  slidesPerView: 2,
               },
               992: {
                  slidesPerView: 3,
               }
            }
         });
      });
   </script>

   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
   <script>
      var swiper = new Swiper(".mySwiper", {
         slidesPerView: 1,
         spaceBetween: 20,
         loop: true,
         autoplay: {
            delay: 4000,
            disableOnInteraction: false,
         },
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
         },
         breakpoints: {
            768: {
               slidesPerView: 2,
            },
            992: {
               slidesPerView: 3,
            }
         }
      });
   </script>


   <style>
      .swiper {
         padding-bottom: 50px;
      }

      .swiper-slide {
         padding: 10px;
      }

      /* Warna panah navigasi */
      }
   </style>
</body>

</html>