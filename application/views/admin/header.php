<?php 
// Helper function to check if current page matches the given URL segment

function is_active_page($segment) {
    $CI =& get_instance();
    $current_url = trim($CI->uri->uri_string(), '/');
    $segment = trim($segment, '/');

    return $current_url === $segment || strpos($current_url, $segment . '/') === 0;
}

function is_active_group($segments = []) {
    foreach ($segments as $segment) {
        if (is_active_page($segment)) {
            return true;
        }
    }
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo isset($title) ? $title : 'Admin Panel - SMK Muh 15'; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/logo-smk.png'); ?>" rel="icon">
  <link href="<?php echo base_url('assets/img/logo-smk.png'); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex col-6">
      <a href="<?php echo base_url('admin'); ?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url('assets/img/logo-smk.png'); ?>" alt="">
        <span class="d-none d-lg-block">SMK Muh 15 Admin</span>
      </a>
    </div>
    <div class="d-flex col-6">
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-person"></i>
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user['username']; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('admin/logout'); ?>">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('admin') ? 'active' : ''; ?>" href="<?php echo base_url('admin'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed <?php echo is_active_group(['guru', 'guru/inactive']) ? 'active' : ''; ?>" data-bs-target="#guru-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Guru</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="guru-nav" class="nav-content collapse <?php echo is_active_group(['guru', 'guru/inactive']) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link <?php echo is_active_page('guru/active') ? 'active' : ''; ?>" href="<?php echo base_url('guru/active'); ?>">
              <i class="bi bi-person-check"></i><span>Guru Aktif</span>
            </a>
          </li>
          <li>
            <a class="nav-link <?php echo is_active_page('guru/inactive') ? 'active' : ''; ?>" href="<?php echo base_url('guru/inactive'); ?>">
              <i class="bi bi-person-x"></i><span>Guru Tidak Aktif</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('program') ? 'active' : ''; ?>" href="<?php echo base_url('program'); ?>">
          <i class="bi bi-book"></i>
          <span>Program</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed <?php echo (is_active_page('mapel') || is_active_page('jadwal') || is_active_page('siswa')) ? 'active' : ''; ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Akademik</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse <?php echo (is_active_page('mapel') || is_active_page('jadwal') || is_active_page('siswa')) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Jadwal Pelajaran</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('siswa'); ?>" class="<?php echo is_active_page('siswa') ? 'active' : ''; ?>">
              <i class="bi bi-circle"></i><span>Siswa</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('mapel'); ?>" class="<?php echo is_active_page('mapel') ? 'active' : ''; ?>">
              <i class="bi bi-circle"></i><span>Mapel</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('sarpras') ? 'active' : ''; ?>" href="<?php echo base_url('sarpras'); ?>">
          <i class="bi bi-building"></i>
          <span>Sarana Prasarana</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('testimoni') ? 'active' : ''; ?>" href="<?php echo base_url('testimoni'); ?>">
          <i class="bi bi-chat-quote"></i>
          <span>Testimoni</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('pimpinan') ? 'active' : ''; ?>" href="<?php echo base_url('pimpinan'); ?>">
          <i class="bi bi-person-badge"></i>
          <span>Pimpinan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('program') ? 'active' : ''; ?>" href="<?php echo base_url('program'); ?>">
          <i class="bi bi-book"></i>
          <span>Program</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('jurusan') ? 'active' : ''; ?>" href="<?php echo base_url('jurusan'); ?>">
          <i class="bi bi-mortarboard"></i>
          <span>Jurusan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('sarpras') ? 'active' : ''; ?>" href="<?php echo base_url('sarpras'); ?>">
          <i class="bi bi-building"></i>
          <span>Sarana Prasarana</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('partnership') ? 'active' : ''; ?>" href="<?php echo base_url('partnership'); ?>">
          <i class="bi bi-link-45deg"></i>
          <span>Partnership</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('statistik') ? 'active' : ''; ?>" href="<?php echo base_url('statistik'); ?>">
          <i class="bi bi-bar-chart"></i>
          <span>Statistik</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo is_active_page('pengaturan') ? 'active' : ''; ?>" href="#">
          <i class="bi bi-gear"></i>
          <span>Pengaturan</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
