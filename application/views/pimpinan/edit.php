<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Pimpinan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('pimpinan'); ?>">Pimpinan</a></li>
      <li class="breadcrumb-item active">Edit <?php echo $pimpinan->nama_pimpinan; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Edit Pimpinan</h4>
        <p class="text-muted">Silakan ubah form berikut untuk mengedit data pimpinan.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('pimpinan/update'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pimpinan" value="<?php echo $pimpinan->id_pimpinan; ?>">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" 
                   value="<?php echo set_value('nama_pimpinan', $pimpinan->nama_pimpinan); ?>" required>
            <?php echo form_error('nama_pimpinan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="jabatan_pimpinan" class="form-label">Jabatan Pimpinan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="jabatan_pimpinan" name="jabatan_pimpinan" 
                   value="<?php echo set_value('jabatan_pimpinan', $pimpinan->jabatan_pimpinan); ?>" required>
            <?php echo form_error('jabatan_pimpinan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="foto_pimpinan" class="form-label">Foto Pimpinan</label>
            <input type="file" class="form-control" id="foto_pimpinan" name="foto_pimpinan" 
                   accept="image/*">
            <?php echo form_error('foto_pimpinan', '<small class="text-danger">', '</small>'); ?>
            <?php if ($pimpinan->foto_pimpinan): ?>
              <div class="mt-2">
                <img src="<?php echo base_url('assets/img/pimpinan/' . $pimpinan->foto_pimpinan); ?>" 
                     class="img-thumbnail" style="max-width: 200px;" alt="Foto Pimpinan">
                <small class="text-muted d-block">Foto saat ini. Kosongkan jika tidak ingin mengubah.</small>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Update Pimpinan
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
