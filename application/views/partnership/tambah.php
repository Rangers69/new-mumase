<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Partnership</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('partnership'); ?>">Partnership</a></li>
      <li class="breadcrumb-item active">Tambah Partnership</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Tambah Partnership</h4>
        <p class="text-muted">Silakan isi form berikut untuk menambahkan data partnership.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('partnership/insert'); ?>" method="post" enctype="multipart/form-data">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_partnership" class="form-label">Nama Partnership <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_partnership" name="nama_partnership" 
                   value="<?php echo set_value('nama_partnership'); ?>" required>
            <?php echo form_error('nama_partnership', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="logo_partnership" class="form-label">Logo Partnership</label>
            <input type="file" class="form-control" id="logo_partnership" name="logo_partnership" 
                   accept="image/*">
            <?php echo form_error('logo_partnership', '<small class="text-danger">', '</small>'); ?>
            <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max: 10MB)</small>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Simpan Partnership
            </button>
            <a href="<?php echo base_url('partnership'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
