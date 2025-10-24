<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Rekomendasi UKM</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <style>
      /* Styling for Jelajah UKM Section */
      .jelajah-ukm {
         padding: 50px 0;
         background-color: #f9f9f9;
      }

      .jelajah-ukm .section-title {
         text-align: center;
         font-size: 36px;
         color: #333;
         margin-bottom: 20px;
         font-weight: bold;
      }

      .jelajah-ukm .section-description {
         text-align: center;
         font-size: 18px;
         color: #555;
         margin-bottom: 30px;
      }

      .ukm-list {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         gap: 30px;
         padding: 0;
         list-style-type: none;
      }

      .ukm-list li {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         overflow: hidden;
         width: 250px;
         transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .ukm-list li:hover {
         transform: translateY(-10px);
         box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
      }

      .ukm-list li a {
         display: block;
         padding: 20px;
         color: #333;
         text-align: center;
         text-decoration: none;
         font-size: 18px;
         font-weight: bold;
         transition: color 0.3s ease;
      }

      .ukm-list li a:hover {
         color: #007bff;
      }

      .ukm-list li a i {
         font-size: 30px;
         margin-bottom: 10px;
         display: block;
      }
   </style>
</head>
<!-- body -->

<body class="main-layout inner_page">
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
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item active">
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
   <!-- end header inner -->

   <!-- about -->
   <div class="about">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class="col-md-6">
               <div class="titlepage text_align_left">
                  <h2>Tentang ORMAWA Connect</h2>
                  <p> Selamat datang di platform Rekomendasi ORMAWA Kampus! Kami hadir untuk membantu mahasiswa baru
                     menemukan ORMAWA yang paling sesuai dengan minat, bakat, dan tujuan pribadi
                     mereka. Website ini dirancang untuk mempermudah mahasiswa dalam menjelajahi berbagai ORMAWA di kampus,
                     memberikan informasi terperinci, serta menyediakan fitur-fitur yang inovatif dan interaktif.</p>
                  <p> Website ini juga bertujuan untuk mendukung pengembangan diri mahasiswa di luar akademik. Melalui
                     platform ini, mahasiswa dapat dengan mudah mengeksplorasi berbagai pilihan ORMAWA yang tersedia,
                     mengetahui kegiatan yang dilakukan, manfaat bergabung, dan berinteraksi langsung dengan pengurus
                     masing-masing UKM. Kami juga menyediakan rekomendasi berdasarkan minat dan hobi mahasiswa, membantu
                     mereka menemukan komunitas yang tepat untuk berkolaborasi, berkembang, dan menambah pengalaman
                     selama masa studi. Dengan fitur-fitur inovatif seperti informasi perekrutan dan jelajah ormawa yang
                     terbuka, kami berharap mahasiswa dapat membuat keputusan yang lebih terinformasi dan bergabung
                     dengan ormawa yang sesuai dengan tujuan pribadi mereka.</p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Jelajah UKM Section -->
   <div class="jelajah-ukm">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h3 class="section-title">Jelajah ORMAWA</h3>
               <p class="section-description">Politeknik Harapan Bersama memberi kesempatan bagi mahasiswa untuk
                  mengembangkan ataupun melatih kemampuan yang dimiliki dalam ORMAWA.</p>
               <ul class="ukm-list">
                  @foreach ($abouts as $about)
                 <li>
                   <a href="{{ url('/about/' . $about->id) }}">
                     <img src="{{ Storage::url($about->logo) }}" alt="UKM {{ $about->nama_organisasi }}"
                        class="ukm-icon">
                     {{ $about->nama_organisasi }}
                   </a>
                 </li>
              @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- End Jelajah UKM Section -->
   <!-- footer -->
   <footer>
      <div class="copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>© 2020 All Rights Reserved. Design by <a href="https://html.design/"> Free html Templates</a></p>
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
</body>

</html>