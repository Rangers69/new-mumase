<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Jurusan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jurusan'); ?>">Jurusan</a></li>
      <li class="breadcrumb-item active"><?php echo $jurusan->nama_jurusan; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-lg-8">
          
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
              <h5 class="card-title mb-3">Deskripsi Jurusan</h5>
              <p class="card-text"><?php echo nl2br($jurusan->deskripsi_jurusan); ?></p>
            </div>
          </div>
          
          <div class="mt-4">
            <a href="<?php echo base_url('jurusan/edit/'.$jurusan->id_jurusan); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Jurusan
            </a>
            <a href="<?php echo base_url('jurusan'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Jurusan</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID Jurusan</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $jurusan->id_jurusan; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Nama</span>
                  <strong><?php echo $jurusan->nama_jurusan; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Icon</span>
                  <i class="<?php echo $jurusan->icon_jurusan; ?>"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
    </div>
  </div>
</section>
