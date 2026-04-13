<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Sarana Prasarana</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('sarpras'); ?>">Sarana Prasarana</a></li>
      <li class="breadcrumb-item active">Edit <?php echo $sarpras->nama_sarpras; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Edit Sarana Prasarana</h4>
        <p class="text-muted">Silakan ubah form berikut untuk mengedit data sarana prasarana.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('sarpras/update'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_sarpras" value="<?php echo $sarpras->id_sarpras; ?>">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_sarpras" class="form-label">Nama Sarana Prasarana <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_sarpras" name="nama_sarpras" 
                   value="<?php echo set_value('nama_sarpras', $sarpras->nama_sarpras); ?>" required>
            <?php echo form_error('nama_sarpras', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="kategori_sarpras" class="form-label">Kategori <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="kategori_sarpras" name="kategori_sarpras" 
                   value="<?php echo set_value('kategori_sarpras', $sarpras->kategori_sarpras); ?>" required>
            <?php echo form_error('kategori_sarpras', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-md-6">
            <label for="kondisi" class="form-label">Kondisi <span class="text-danger">*</span></label>
            <select class="form-select" id="kondisi" name="kondisi" required>
              <option value="">-- Pilih Kondisi --</option>
              <option value="Baik" <?php echo ($sarpras->kondisi == 'Baik') ? 'selected' : ''; ?>>Baik</option>
              <option value="Rusak Ringan" <?php echo ($sarpras->kondisi == 'Rusak Ringan') ? 'selected' : ''; ?>>Rusak Ringan</option>
              <option value="Rusak Berat" <?php echo ($sarpras->kondisi == 'Rusak Berat') ? 'selected' : ''; ?>>Rusak Berat</option>
            </select>
            <?php echo form_error('kondisi', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="foto_sarpras" class="form-label">Foto Sarana Prasarana</label>
            <input type="file" class="form-control" id="foto_sarpras" name="foto_sarpras">
            <?php echo form_error('foto_sarpras', '<small class="text-danger">', '</small>'); ?>
            <?php if ($sarpras->foto_sarpras): ?>
              <div class="mt-2">
                <img src="<?php echo base_url('assets/img/sarpras/' . $sarpras->foto_sarpras); ?>" 
                     class="img-thumbnail" style="max-width: 200px;" alt="Foto Sarana Prasarana">
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Update Sarana Prasarana
            </button>
            <a href="<?php echo base_url('sarpras'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
