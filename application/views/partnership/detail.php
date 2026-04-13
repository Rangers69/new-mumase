<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Partnership</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('partnership'); ?>">Partnership</a></li>
      <li class="breadcrumb-item active"><?php echo $partnership->nama_partnership; ?></li>
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
            <?php if ($partnership->logo_partnership): ?>
              <img src="<?php echo base_url('assets/img/partnership/' . $partnership->logo_partnership); ?>" 
                   class="rounded-circle me-4" style="width: 100px; height: 100px; object-fit: cover;" 
                   alt="<?php echo $partnership->nama_partnership; ?>">
            <?php else: ?>
              <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-4" 
                   style="width: 100px; height: 100px;">
                <i class="bi bi-building text-white" style="font-size: 2rem;"></i>
              </div>
            <?php endif; ?>
            <div>
              <h4 class="card-title mb-1"><?php echo $partnership->nama_partnership; ?></h4>
            </div>
          </div>
          
          <div class="mt-4">
            <a href="<?php echo base_url('partnership/edit/'.$partnership->id_partnership); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Partnership
            </a>
            <a href="<?php echo base_url('partnership'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Partnership</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID Partnership</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $partnership->id_partnership; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Nama</span>
                  <strong><?php echo $partnership->nama_partnership; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Logo</span>
                  <span class="badge bg-info">
                    <?php echo $partnership->logo_partnership ? 'Ada' : 'Tidak Ada'; ?>
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      
    </div>
  </div>
</section>
