<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Mata Pelajaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('MapelController'); ?>">Mata Pelajaran</a></li>
      <li class="breadcrumb-item active">Tambah</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Tambah Data Mata Pelajaran</h5>
          <p class="text-muted mb-0">
            Masukkan informasi mata pelajaran baru.
          </p>
        </div>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-triangle me-2"></i>
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle me-2"></i>
          <?php echo $this->session->flashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <!-- Form -->
      <form action="<?php echo base_url('MapelController/proses_tambah'); ?>" method="post" role="form">
        <div class="row">
          <!-- Informasi Utama -->
          <div class="col-lg-12 mb-4">
            <h6 class="text-primary fw-bold mb-3">
              <i class="bi bi-info-circle me-2"></i>Informasi Mata Pelajaran
            </h6>
            
            <div class="row g-3">
              <div class="col-md-8">
                <label for="nama_mapel" class="form-label">
                  Nama Mata Pelajaran <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-book"></i>
                  </span>
                  <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" 
                         placeholder="Contoh: Matematika, Fisika, Kimia" required 
                         value="<?php echo set_value('nama_mapel'); ?>">
                </div>
                <?php echo form_error('nama_mapel', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
              
              <div class="col-md-4">
                <label for="active" class="form-label">
                  Status <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-toggle-on"></i>
                  </span>
                  <select class="form-select" name="active" id="active" required>
                    <option value="">Pilih Status</option>
                    <option value="1" <?php echo set_select('active', '1'); ?>>Aktif</option>
                    <option value="0" <?php echo set_select('active', '0'); ?>>Tidak Aktif</option>
                  </select>
                </div>
                <?php echo form_error('active', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
            </div>
          </div>

          <!-- Submit Buttons -->
          <div class="col-lg-12">
            <div class="d-flex justify-content-end gap-2">
              <a href="<?php echo base_url('MapelController'); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Batal
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>
                Simpan Data
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Form Validation -->
<script>
$(document).ready(function() {
    // Auto-capitalize first letter of each word in nama_mapel
    $('#nama_mapel').on('input', function() {
        var words = this.value.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
        }
        this.value = words.join(' ');
    });
});
</script>
