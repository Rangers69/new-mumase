<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Testimoni</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('testimoni'); ?>">Testimoni</a></li>
      <li class="breadcrumb-item active">Tambah Testimoni</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Tambah Testimoni</h4>
        <p class="text-muted">Silakan isi form berikut untuk menambahkan data testimoni.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('testimoni/insert'); ?>" method="post" enctype="multipart/form-data">
        
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="nama_alumni" class="form-label">Nama Alumni <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_alumni" name="nama_alumni" 
                   value="<?php echo set_value('nama_alumni'); ?>" required>
            <?php echo form_error('nama_alumni', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-md-6">
            <label for="profesi_alumni" class="form-label">Profesi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="profesi_alumni" name="profesi_alumni" 
                   value="<?php echo set_value('profesi_alumni'); ?>" required>
            <?php echo form_error('profesi_alumni', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="komentar_alumni" class="form-label">Komentar Alumni <span class="text-danger">*</span></label>
            <textarea class="form-control" id="komentar_alumni" name="komentar_alumni" rows="5" required><?php echo set_value('komentar_alumni'); ?></textarea>
            <?php echo form_error('komentar_alumni', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="foto_alumni" class="form-label">Foto Alumni</label>
            <input type="file" class="form-control" id="foto_alumni" name="foto_alumni" 
                   accept="image/*">
            <?php echo form_error('foto_alumni', '<small class="text-danger">', '</small>'); ?>
            <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max: 10MB)</small>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Simpan Testimoni
            </button>
            <a href="<?php echo base_url('testimoni'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
