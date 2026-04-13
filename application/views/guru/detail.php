<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Guru</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('guru/active'); ?>">Master Data</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('guru/active'); ?>">Guru</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <?php if (!empty($guru)): ?>
    <div class="row">
      <!-- Profile Card -->
      <div class="col-lg-4 col-md-5 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <div class="profile-avatar mb-3">
              <img src="<?php echo base_url('assets/img/guru/' . ($guru->foto_guru ?: 'default.jpg')); ?>" 
                   alt="<?php echo $guru->nama_guru; ?>" 
                   class="img-fluid rounded-circle" 
                   style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #f8f9fa;">
            </div>
            <h4 class="card-title mb-1"><?php echo $guru->nama_guru; ?></h4>
            <p class="text-primary fw-semibold mb-3"><?php echo $guru->mapel_guru; ?></p>
            
            <div class="d-flex justify-content-center gap-2 mb-3">
              <a href="mailto:<?php echo $guru->email; ?>" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-envelope"></i>
              </a>
              <a href="tel:<?php echo $guru->telepon; ?>" class="btn btn-sm btn-outline-success">
                <i class="bi bi-telephone"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Information Cards -->
      <div class="col-lg-8 col-md-7">
        <!-- Informasi Personal -->
        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <h6 class="mb-0">
              <i class="bi bi-person-badge me-2"></i>Informasi Personal
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Nama Lengkap</label>
                  <p class="mb-0 fw-semibold"><?php echo $guru->nama_guru; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">NIP</label>
                  <p class="mb-0 fw-semibold"><?php echo $guru->nip; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Email</label>
                  <p class="mb-0">
                    <a href="mailto:<?php echo $guru->email; ?>" class="text-primary">
                      <?php echo $guru->email; ?>
                    </a>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Telepon</label>
                  <p class="mb-0">
                    <a href="tel:<?php echo $guru->telepon; ?>" class="text-success">
                      <?php echo $guru->telepon; ?>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informasi Akademik -->
        <div class="card mb-4">
          <div class="card-header bg-info text-white">
            <h6 class="mb-0">
              <i class="bi bi-mortarboard me-2"></i>Informasi Akademik
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Jurusan</label>
                  <p class="mb-0 fw-semibold"><?php echo $guru->mapel_guru; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Pendidikan</label>
                  <p class="mb-0 fw-semibold"><?php echo $guru->pendidikan ?: '-'; ?></p>
                </div>
              </div>
              <div class="col-12">
                <div class="info-item">
                  <label class="text-muted small">Mata Pelajaran yang Diampu</label>
                  <p class="mb-0"><?php echo $guru->mapel_guru ?: '-'; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informasi Tambahan -->
        <?php if (!empty($guru->pengalaman)): ?>
        <div class="card mb-4">
          <div class="card-header bg-secondary text-white">
            <h6 class="mb-0">
              <i class="bi bi-info-circle me-2"></i>Informasi Tambahan
            </h6>
          </div>
          <div class="card-body">
            <div class="info-item">
              <label class="text-muted small">Pengalaman Mengajar</label>
              <p class="mb-0"><?php echo nl2br($guru->pengalaman); ?></p>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2">
              <a href="<?php echo base_url('guru/active'); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
              </a>
            </div>
      </div>
    </div>
  <?php else: ?>
    <div class="card">
      <div class="card-body">
        <div class="alert alert-warning text-center">
          <i class="bi bi-exclamation-triangle me-2"></i>
          Data guru tidak ditemukan.
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>

<style>
.profile-avatar {
  position: relative;
  display: inline-block;
}

.info-item {
  padding: 0.75rem 0;
  border-bottom: 1px solid #f8f9fa;
}

.info-item:last-child {
  border-bottom: none;
}

.info-item label {
  display: block;
  margin-bottom: 0.25rem;
}

.card-header {
  border-radius: 0.375rem 0.375rem 0 0 !important;
}

.card {
  border: none;
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  transition: box-shadow 0.15s ease-in-out;
}

.card:hover {
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.btn-sm {
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
}
</style>
