<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Pimpinan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('pimpinan'); ?>">Pimpinan</a></li>
      <li class="breadcrumb-item active"><?php echo $pimpinan->nama_pimpinan; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-lg-6">
          <div class="d-flex align-items-center mb-4">
            <?php if ($pimpinan->foto_pimpinan): ?>
              <img src="<?php echo base_url('assets/img/pimpinan/' . $pimpinan->foto_pimpinan); ?>" 
                   class="rounded-circle me-4" style="width: 100px; height: 100px; object-fit: cover;" 
                   alt="<?php echo $pimpinan->nama_pimpinan; ?>">
            <?php else: ?>
              <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-4" 
                   style="width: 100px; height: 100px;">
                <i class="bi bi-person text-white" style="font-size: 2rem;"></i>
              </div>
            <?php endif; ?>
          </div>
          
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
              <h5 class="card-title mb-3">Informasi Pimpinan</h5>
              <p class="card-text">
                <strong>Nama:</strong> <?php echo $pimpinan->nama_pimpinan; ?><br>
                <strong>Jabatan:</strong> <?php echo $pimpinan->jabatan_pimpinan; ?><br>
              </p>
            </div>
          </div>
          
          <div class="mt-4">
            <a href="<?php echo base_url('pimpinan/edit/'.$pimpinan->id_pimpinan); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Pimpinan
            </a>
            <a href="<?php echo base_url('pimpinan'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Detail</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID Pimpinan</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $pimpinan->id_pimpinan; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Nama</span>
                  <strong><?php echo $pimpinan->nama_pimpinan; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Jabatan</span>
                  <strong><?php echo $pimpinan->jabatan_pimpinan; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Foto</span>
                  <span class="badge bg-info">
                    <?php echo $pimpinan->foto_pimpinan ? 'Ada' : 'Tidak Ada'; ?>
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
    </div>
  </div>
</section>
