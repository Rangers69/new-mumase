<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title><?php echo isset($title) ? $title : 'SMK Muhammadiyah 15 Jakarta'; ?></title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/logo-smk.png'); ?>" rel="icon" />
  <link href="<?php echo base_url('assets/img/logo-smk.png'); ?>" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header Section ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">smkmuh15setiabudi@gmail.com</a></i>
        <i class="bi bi-phone d-none d-sm-flex align-items-center ms-4"><span>(021) 52920657</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://web.facebook.com/smkmuh15" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/officialmuh15/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.tiktok.com/@officialmuh15" class="tiktok"><i class="bi bi-tiktok"></i></a>
        <a href="https://maps.app.goo.gl/8LLfTswY5NyxhnuB6" class="maps"><i class="bi bi-geo-alt-fill"></i></a>
      </div>
    </div>
  </section>
  <!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Muh15<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="dropdown">
            <a href="<?php echo base_url(); ?>#about"><span>Tentang Kami</span>
              <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url(); ?>#about">Visi & Misi</a></li>
              <li><a href="<?php echo base_url(); ?>#partnership">Partnership</a></li>
              <li><a href="<?php echo base_url(); ?>#statistik">Statistik Sekolah</a></li>
              <li><a href="<?php echo base_url(); ?>#sarpras">Sarana Prasarana</a></li>
              <li><a href="<?php echo base_url('guru/public'); ?>">Guru</a></li>
              <li><a href="<?php echo base_url(); ?>#news">Berita</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url(); ?>#program">Program Unggulan</a></li>
          <li><a href="#pimpinan">Pimpinan</a></li>
          <li class="dropdown">
            <a href="#"><span>Lainnya</span>
              <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="jadwal-pelajaran.php">Jadwal Pelajaran</a></li>
              <li><a href="jadwal-ujian.php">Jadwal Ujian</a></li>
              <li class="dropdown">
                <a href="#"><span>Kejuruan</span>
                  <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">DKV</a></li>
                  <li><a href="#">RPL</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#"><span>Ekstrakurikuler</span>
                  <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">PR IPM</a></li>
                  <li><a href="#">Hizbul Wathon</a></li>
                  <li><a href="#">Web Programming</a></li>
                  <li><a href="#">Hadrah</a></li>
                  <li><a href="#">Math Club</a></li>
                  <li><a href="#">Bisnis Club</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="https://forms.gle/E9xGT8E77j1bUwUH8">Kritik & Saran</a></li>
        </ul>
      </nav>
      <!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>
  <!-- End Header -->