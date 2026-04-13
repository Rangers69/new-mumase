<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Statistik</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Laporan</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('statistik'); ?>">Statistik</a></li>
      <li class="breadcrumb-item active">Tahun <?php echo $statistik->tahun_ajaran; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-lg-8">
          <h4 class="card-title mb-3">Statistik Kelulusan Tahun <?php echo $statistik->tahun_ajaran; ?></h4>
          
          <div class="row mb-4">
            <div class="col-md-4">
              <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                  <h5 class="card-title text-primary"><?php echo number_format($statistik->jumlah_siswa); ?></h5>
                  <p class="card-text">Total Siswa</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                  <h5 class="card-title text-success"><?php echo number_format($statistik->jumlah_guru); ?></h5>
                  <p class="card-text">Jumlah Guru</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                  <h5 class="card-title text-danger"><?php echo number_format($statistik->jumlah_kelas); ?></h5>
                  <p class="card-text">Jumlah Kelas</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="mt-4">
            <a href="<?php echo base_url('statistik/edit/'.$statistik->id_statistik); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Statistik
            </a>
            <a href="<?php echo base_url('statistik'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Statistik</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID Statistik</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $statistik->id_statistik; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Tahun Ajaran</span>
                  <strong><?php echo $statistik->tahun_ajaran; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Jumlah Siswa</span>
                  <strong><?php echo number_format($statistik->jumlah_siswa); ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Jumlah Guru</span>
                  <strong><?php echo number_format($statistik->jumlah_guru); ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Jumlah Kelas</span>
                  <strong><?php echo number_format($statistik->jumlah_kelas); ?></strong>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
