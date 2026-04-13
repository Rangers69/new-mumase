<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Program</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('program'); ?>">Program</a></li>
      <li class="breadcrumb-item active">Edit <?php echo $program->nama_program; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Edit Program</h4>
        <p class="text-muted">Silakan ubah form berikut untuk mengedit data program keahlian.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('program/update'); ?>" method="post">
        <input type="hidden" name="id_program" value="<?php echo $program->id_program; ?>">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_program" class="form-label">Nama Program <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_program" name="nama_program" 
                   value="<?php echo set_value('nama_program', $program->nama_program); ?>" required>
            <?php echo form_error('nama_program', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="deskripsi" class="form-label">Deskripsi Program <span class="text-danger">*</span></label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required><?php echo set_value('deskripsi', $program->deskripsi_program); ?></textarea>
            <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Update Program
            </button>
            <a href="<?php echo base_url('program'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
