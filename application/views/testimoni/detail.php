<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Testimoni</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('testimoni'); ?>">Testimoni</a></li>
      <li class="breadcrumb-item active"><?php echo $testimoni->nama_testimoni; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-lg-8">
          <div class="d-flex align-items-center mb-4">
            <?php if ($testimoni->foto_testimoni): ?>
              <img src="<?php echo base_url('assets/img/testimoni/' . $testimoni->foto_testimoni); ?>" 
                   class="rounded-circle me-4" style="width: 100px; height: 100px; object-fit: cover;" 
                   alt="<?php echo $testimoni->nama_testimoni; ?>">
            <?php else: ?>
              <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-4" 
                   style="width: 100px; height: 100px;">
                <i class="bi bi-person text-white" style="font-size: 2rem;"></i>
              </div>
            <?php endif; ?>
            <div>
              <h4 class="card-title mb-1"><?php echo $testimoni->nama_testimoni; ?></h4>
              <p class="text-muted mb-0"><?php echo $testimoni->pekerjaan; ?></p>
              <span class="badge bg-<?php echo $testimoni->status == 'Aktif' ? 'success' : 'secondary'; ?>">
                <?php echo $testimoni->status; ?>
              </span>
            </div>
          </div>
          
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
              <h5 class="card-title mb-3">Isi Testimoni</h5>
              <p class="card-text"><?php echo nl2br($testimoni->isi_testimoni); ?></p>
            </div>
          </div>
          
          <div class="mt-4">
            <a href="<?php echo base_url('testimoni/edit/'.$testimoni->id_testimoni); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Testimoni
            </a>
            <a href="<?php echo base_url('testimoni'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Testimoni</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID Testimoni</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $testimoni->id_testimoni; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Nama</span>
                  <strong><?php echo $testimoni->nama_testimoni; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Pekerjaan</span>
                  <strong><?php echo $testimoni->pekerjaan; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Status</span>
                  <span class="badge bg-<?php echo $testimoni->status == 'Aktif' ? 'success' : 'secondary'; ?>">
                    <?php echo $testimoni->status; ?>
                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Foto</span>
                  <span class="badge bg-info">
                    <?php echo $testimoni->foto_testimoni ? 'Ada' : 'Tidak Ada'; ?>
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
    </div>
  </div>
</section>
