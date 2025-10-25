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
   <title>Recruitment</title>
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
   <link rel="icon" href="images/logouhn.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- Tambahkan di bagian head atau sebelum </body> -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <style>
      /* Custom styles for the UKM card */
      .ukm-card-section {
         /* background: linear-gradient(to right, #f0f8ff, #e6f0ff); */
         background-color: #f0f8ff;
         padding: 60px;
      }

      .ukm-card {
         border: none;
         border-radius: 12px;
         overflow: hidden;
         box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
         transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .ukm-logo {
         max-width: 100%;
         max-height: 300px;
         /* atur sesuai kebutuhan */
         object-fit: cover;
         /* atau contain tergantung efek yang diinginkan */
         width: 100%;
         height: 400px;
      }


      .ukm-card:hover {
         transform: scale(1.05);
         box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
      }

      .ukm-card img {
         border-top-left-radius: 12px;
         border-top-right-radius: 12px;
      }

      .ukm-card-body {
         padding: 25px;
      }

      .ukm-card-title {
         font-size: 1.7rem;
         color: #333;
         font-weight: bold;
      }

      .ukm-card-text {
         color: #555;
         margin: 15px 0;
      }

      .registration-deadline {
         font-size: 0.9rem;
         color: #888;
         margin-bottom: 15px;
      }

      .ukm-card-btn {
         background-color: #ff7f50;
         color: #fff;
         font-weight: bold;
         padding: 12px 24px;
         border-radius: 5px;
         transition: background-color 0.3s ease;
         text-decoration: none;
      }

      .ukm-card-btn:hover {
         background-color: #e56741;
         color: #fff;
         text-decoration: none;
      }
   </style>
</head>

<body class="main-layout inner_page">
   <div class="loader_bg">
      <div class="loader"><img src="images/uhnload.gif" alt="#" /></div>
   </div>
   <!-- header -->
   <div class="header">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class="col-md-2 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.html"><img src="images/logouhn.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-sm-12">
               <nav class="navigation navbar navbar-expand-md navbar-dark">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                     aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/about') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/opsi') }}">Rekomendasi</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/recruitment') }}">Recruitment</a>
                        </li>

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
   <!-- end header -->

   <!-- UKM Registration Card Section -->
   <div class="ukm-card-section">
      <div class="container">
         <div class="row justify-content-center">
            <!-- @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
         @endif -->

            <!-- UKM Paduan  -->
            @forelse ($ukms as $ukm)
            <div class="col-md-6 col-lg-4 mb-4">
               <div class="card ukm-card">
                 <img class="card-img-top ukm-logo" src="{{ Storage::url($ukm->logo) }}" alt="UKM Choir">
                 <div class="ukm-card-body">
                   <h5 class="ukm-card-title">{{ $ukm->name }}</h5>
                   <p class="ukm-card-text">{{ $ukm->about }}</p>
                   <p class="registration-deadline">Batas Pendaftaran: {{ $ukm->batas_pendaftaran }}</p>
                   <a href="#" class="ukm-card-btn" data-toggle="modal" data-target="#choirModal{{ $ukm->id }}">Daftar
                     Sekarang</a>
                 </div>
               </div>
            </div>
         @empty
            <p>Belum ada UKM yang terdaftar.</p>
         @endforelse

            @forelse ($ormawas as $ormawa)
            <div class="col-md-6 col-lg-4">
               <div class="card ukm-card">
                 <img class="card-img-top ukm-logo" src="{{ Storage::url($ormawa->logo) }}" alt="Ormawa">
                 <div class="ukm-card-body">
                   <h5 class="ukm-card-title">{{ $ormawa->name }}</h5>
                   <p class="ukm-card-text">{{ $ormawa->about }}</p>
                   <p class="registration-deadline">Batas Pendaftaran: {{ $ormawa->batas_pendaftaran }}</p>
                   <a href="#" class="ukm-card-btn" data-toggle="modal"
                     data-target="#choirModalOrmawa{{ $ormawa->id }}">Daftar Sekarang</a>
                 </div>
               </div>
            </div>
         @empty
            <p>Belum ada UKM yang terdaftar.</p>
         @endforelse
         </div>

         <!-- Modal for UKM  -->
         @if ($ukms)
             @foreach ($ukms as $ukm)
              <div class="modal fade" id="choirModal{{ $ukm->id }}" tabindex="-1" role="dialog"
               aria-labelledby="choirModalLabel{{ $ukm->id }}" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="choirModalLabel{{ $ukm->id }}">Formulir Pendaftaran {{ $ukm->name }}
                     </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form action="{{ route('recruitment.register') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="form-group">
                        <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                      </div>
                      <div class="form-group">
                        <label for="study_program">Program Studi</label>
                        <!-- <input type="text" class="form-control" id="study_program" name="study_program" required> -->
                        <select class="form-control" id="study_program" name="study_program" required>
                          <option value="">Pilih Program Studi</option>
                          <option value="teknik informatika">Teknik Informatika</option>
                          <option value="akuntansi sektor publik">Akuntasi Sektor Publik</option>
                          <option value="kebidanan">kebidanan</option>
                          <option value="profesi kebidanan">Profesi Kebidanan</option>
                          <option value="desain komunikasi visual">Desain Komunikasi Visual</option>
                          <option value="farmasi">Farmasi</option>
                          <option value="keperawatan">Keperawatan</option>
                          <option value="perhotelan">Perhotelan</option>
                          <option value="teknik elektronika">Teknik Elektronika</option>
                          <option value="teknik komputer">Teknik Komputer</option>
                          <option value="teknik mesin">Teknik Mesin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="semester">Semester</label>
                        <!-- <input type="number" class="form-control" id="semester" name="semester" required> -->
                        <select class="form-control" id="semester" name="semester" required>
                          <option value="">Pilih Semester</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender" required>
                          <option value="Male">Laki-Laki</option>
                          <option value="Female">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="reason">Alasan Bergabung dengan {{ $ukm->name }}</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
                        <label class="form-check-label" for="agree">Saya bersedia bergabung dengan UKM ini</label>
                      </div>
                      <div class="form-group">
                        <label for="photo">Foto Diri</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                      </div>

                      <!-- <div class="form-group">
                        <label for="bersedia" class="block text-black font-medium mb-2">Apakah mau jadi pacarku?</label>
                      <div class="flex items-center gap-x-6">
                        <label class="inline-flex items-center">
                          <input type="radio" name="bersedia" value="Ya"
                           class="text-blue-600 focus:ring-blue-400">
                          <span class="ml-2 text-black">Ya</span>
                        </label>
                        <label class="inline-flex items-center">
                          <input type="radio" name="Bersedia" value="Tidak"
                           class="text-blue-600 focus:ring-blue-400">
                          <span class="ml-2 text-black">Tidak</span>
                        </label>
                      </div> -->

                      

                      <input type="hidden" name="Adminukm_id" value="{{ $ukm->Adminukm_id }}">

                      <button type="submit" class="btn btn-primary">Kirim</button>
                     </form>
                   </div>
                  </div>
               </div>
              </div>
            @endforeach
       @endif

         @if ($ormawas)
             @foreach ($ormawas as $ormawa)
              <div class="modal fade" id="choirModalOrmawa{{ $ormawa->id }}" tabindex="-1" role="dialog"
               aria-labelledby="choirModalLabel{{ $ormawa->id }}" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="choirModalLabel{{ $ormawa->id }}">Formulir Pendaftaran
                      {{ $ormawa->name }}
                     </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form action="{{ route('recmawa.store') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="form-group">
                        <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                      </div>
                      <div class="form-group">
                        <label for="study_program">Program Studi</label>
                        <select class="form-control" id="study_program" name="study_program" required>
                          <option value="">Pilih Program Studi</option>
                          <option value="teknik informatika">Teknik Informatika</option>
                          <option value="akuntansi sektor publik">Akuntasi Sektor Publik</option>
                          <option value="kebidanan">kebidanan</option>
                          <option value="profesi kebidanan">Profesi Kebidanan</option>
                          <option value="desain komunikasi visual">Desain Komunikasi Visual</option>
                          <option value="farmasi">Farmasi</option>
                          <option value="keperawatan">Keperawatan</option>
                          <option value="perhotelan">Perhotelan</option>
                          <option value="teknik elektronika">Teknik Elektronika</option>
                          <option value="teknik komputer">Teknik Komputer</option>
                          <option value="teknik mesin">Teknik Mesin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" id="semester" name="semester" required>
                          <option value="">Pilih Semester</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender" required>
                          <option value="Male">Laki-Laki</option>
                          <option value="Female">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="reason">Alasan Bergabung dengan {{ $ormawa->name }}</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
                        <label class="form-check-label" for="agree">Saya bersedia bergabung dengan UKM ini</label>
                      </div>
                      <div class="form-group">
                        <label for="photo">Foto Diri</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                      </div>

                      <!-- <div class="form-group">
                        <label for="Bersedia" class="block text-black font-medium mb-2">Apakah anda bersedia?</label>
                      <div class="flex items-center gap-x-6">
                        <label class="inline-flex items-center">
                          <input type="radio" name="Bersedia" value="Ya"
                           class="text-blue-600 focus:ring-blue-400">
                          <span class="ml-2 text-black">Ya</span>
                        </label>
                        <label class="inline-flex items-center">
                          <input type="radio" name="Bersedia" value="Tidak"
                           class="text-blue-600 focus:ring-blue-400">
                          <span class="ml-2 text-black">Tidak</span>
                        </label>
                      </div> -->
                      

                      </div>
                      <input type="hidden" name="AdminOrmawa_id" value="{{ $ormawa->AdminOrmawa_id }}">

                      <button type="submit" class="btn btn-primary">Kirim</button>
                     </form>
                   </div>
                  </div>
               </div>
              </div>
            @endforeach
       @endif


      </div>
   </div>
   <!-- footer -->
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
   </footer>

   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/custom.js"></script>
   <script>
      AOS.init();
   </script>
   @if(session('success'))
      <script>
        document.addEventListener("DOMContentLoaded", function () {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          });
        });
      </script>
   @endif

</body>

</html>