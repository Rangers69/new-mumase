<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Statistik</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Laporan</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('statistik'); ?>">Statistik</a></li>
      <li class="breadcrumb-item active">Edit Tahun <?php echo $statistik->tahun_ajaran; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Edit Statistik</h4>
        <p class="text-muted">Silakan ubah form berikut untuk mengedit data statistik kelulusan.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('statistik/update'); ?>" method="post">
        <input type="hidden" name="id_statistik" value="<?php echo $statistik->id_statistik; ?>">
        
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="tahun_ajaran" name="tahun_ajaran" 
                   value="<?php echo set_value('tahun_ajaran', $statistik->tahun_ajaran); ?>" 
                   min="2000" max="2099" required>
            <?php echo form_error('tahun_ajaran', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label for="jumlah_siswa" class="form-label">Jumlah Siswa <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="jumlah_siswa" name="jumlah_siswa" 
                   value="<?php echo set_value('jumlah_siswa', $statistik->jumlah_siswa); ?>" min="0" required>
            <?php echo form_error('jumlah_siswa', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-md-4">
            <label for="jumlah_guru" class="form-label">Jumlah Guru <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="jumlah_guru" name="jumlah_guru" 
                   value="<?php echo set_value('jumlah_guru', $statistik->jumlah_guru); ?>" min="0" required>
            <?php echo form_error('jumlah_guru', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-md-4">
            <label for="jumlah_kelas" class="form-label">Jumlah Kelas <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="jumlah_kelas" name="jumlah_kelas" 
                   value="<?php echo set_value('jumlah_kelas', $statistik->jumlah_kelas); ?>" min="0" required>
            <?php echo form_error('jumlah_kelas', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Update Statistik
            </button>
            <a href="<?php echo base_url('statistik'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
