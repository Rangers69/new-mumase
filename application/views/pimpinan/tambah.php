<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Pimpinan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('pimpinan'); ?>">Pimpinan</a></li>
      <li class="breadcrumb-item active">Tambah Pimpinan</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Tambah Pimpinan</h4>
        <p class="text-muted">Silakan isi form berikut untuk menambahkan data pimpinan.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('pimpinan/insert'); ?>" method="post" enctype="multipart/form-data">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" 
                   value="<?php echo set_value('nama_pimpinan'); ?>" required>
            <?php echo form_error('nama_pimpinan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="jabatan_pimpinan" class="form-label">Jabatan Pimpinan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="jabatan_pimpinan" name="jabatan_pimpinan" 
                   value="<?php echo set_value('jabatan_pimpinan'); ?>" required>
            <?php echo form_error('jabatan_pimpinan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="foto_pimpinan" class="form-label">Foto Pimpinan</label>
            <input type="file" class="form-control" id="foto_pimpinan" name="foto_pimpinan" 
                   accept="image/*">
            <?php echo form_error('foto_pimpinan', '<small class="text-danger">', '</small>'); ?>
            <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max: 10MB)</small>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Simpan Pimpinan
            </button>
            <a href="<?php echo base_url('pimpinan'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
