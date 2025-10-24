<!DOCTYPE html>
<html lang="en">
<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- site metas -->
  <title>Rekomendasi</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      font-family: 'Poppins', sans-serif;
      background: #f6f7fb;
    }

    .main-content {
      flex: 1;
    }

    .opsi-ukm a{
      color: white;
    }

    .opsi a{
      color: white;
    }


    .container_opsi {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 60vh;
      gap: 20px;
    }

    button.opsi, button.opsi-ukm {
      padding: 16px 36px;
      border: none;
      border-radius: 50px;
      background: linear-gradient(135deg,rgb(233, 101, 1), #feb47b);
      color: white;
      font-size: 24px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
      transition: all 0.35s ease;
      position: relative;
      overflow: hidden;
    }

    button.opsi:hover, button.opsi-ukm:hover {
      transform: translateY(-4px);
      background: linear-gradient(135deg,rgb(17, 28, 81), #3f4fc0);
      box-shadow: 0 12px 24px rgba(0,0,0,0.2);
    }

    button.opsi:active, button.opsi-ukm:active {
      transform: scale(0.97);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .text-center {
      margin-top: 30px;
      text-align: center;
    }

    .text-center h2 {
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 15px;
      color: #333;
    }

    .text-center p {
      font-size: 18px;
      color: #666;
      max-width: 600px;
      margin: 0 auto;
    }

    footer {
      background: #f0390f;
      color: white;
      padding: 20px 0;
      text-align: center;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
  </style>
</head>

<body class="main-layout inner_page">
  <!-- loader -->
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
            <button class="navbar-toggler" type="button" data-toggle="collapse"
              data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Tentang</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{ url('/opsi') }}">Rekomendasi</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/recruitment') }}">Recruitment</a></li> -->
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

  <!-- content -->
  <div class="main-content">
    <div class="text-center">
      <div class="container">
        <h2>Temukan Rekomendasi Organisasi Mahasiswa yang Cocok untuk Anda</h2>
        <p>Pilih salah satu opsi berikut untuk menemukan Organisasi Mahasiswa yang sesuai dengan minat dan hobi Anda.</p>
      </div>
    </div>

    <div class="container_opsi">
      <button class="opsi-ukm"><a href="{{ url('/rekomendasi')}}">Organisasi Minat dan Bakat</a></button>
      <button class="opsi"><a href="{{ url('/ormawa-rekomendasi')}}">Organisasi Struktural dan Kelembagaan</a></button>
    </div>
  </div>

  <!-- footer -->
  <footer>
    <p>© 2020 All Rights Reserved. Design by <a href="https://html.design/"> Free html Templates</a></p>
  </footer>

  <!-- JS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
