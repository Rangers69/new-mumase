<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Program</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('program'); ?>">Program</a></li>
      <li class="breadcrumb-item active"><?php echo $program->nama_program; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-lg-8">
          <div class="d-flex align-items-center mb-3">
            <?php if (!empty($program->icon_program)): ?>
              <i class="<?php echo $program->icon_program; ?> me-3" style="font-size: 2rem;"></i>
            <?php else: ?>
              <i class="bi bi-book me-3" style="font-size: 2rem;"></i>
            <?php endif; ?>
            <h4 class="card-title mb-0"><?php echo $program->nama_program; ?></h4>
          </div>
          <p class="card-text"><?php echo nl2br($program->deskripsi_program); ?></p>
          
          <div class="mt-4">
            <a href="<?php echo base_url('program/edit/'.$program->id_program); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Program
            </a>
            <a href="<?php echo base_url('program'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Program</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID Program</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $program->id_program; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Nama Program</span>
                  <strong><?php echo $program->nama_program; ?></strong>
                </li>
                <li class="list-group-item">
                  <span>Deskripsi</span>
                  <p class="mb-0 mt-2"><?php echo nl2br($program->deskripsi_program); ?></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
