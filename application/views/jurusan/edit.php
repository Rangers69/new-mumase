<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Jurusan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jurusan'); ?>">Jurusan</a></li>
      <li class="breadcrumb-item active">Edit <?php echo $jurusan->nama_jurusan; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Edit Jurusan</h4>
        <p class="text-muted">Silakan ubah form berikut untuk mengedit data jurusan.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('jurusan/update'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_jurusan" value="<?php echo $jurusan->id_jurusan; ?>">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_jurusan" class="form-label">Nama Jurusan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" 
                   value="<?php echo set_value('nama_jurusan', $jurusan->nama_jurusan); ?>" required>
            <?php echo form_error('nama_jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="deskripsi_jurusan" class="form-label">Deskripsi Jurusan <span class="text-danger">*</span></label>
            <textarea class="form-control" id="deskripsi_jurusan" name="deskripsi_jurusan" rows="5" required><?php echo set_value('deskripsi_jurusan', $jurusan->deskripsi_jurusan); ?></textarea>
            <?php echo form_error('deskripsi_jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="icon_jurusan" class="form-label">Icon Jurusan <span class="text-danger">*</span></label>
            <select class="form-select" id="icon_jurusan" name="icon_jurusan" required>
              <option value="">-- Pilih Icon --</option>
              <option value="bi bi-cpu" <?php echo ($jurusan->icon_jurusan == 'bi bi-cpu') ? 'selected' : ''; ?>>CPU</option>
              <option value="bi bi-code-slash" <?php echo ($jurusan->icon_jurusan == 'bi bi-code-slash') ? 'selected' : ''; ?>>Code</option>
              <option value="bi bi-database" <?php echo ($jurusan->icon_jurusan == 'bi bi-database') ? 'selected' : ''; ?>>Database</option>
              <option value="bi bi-globe" <?php echo ($jurusan->icon_jurusan == 'bi bi-globe') ? 'selected' : ''; ?>>Globe</option>
              <option value="bi bi-graph-up" <?php echo ($jurusan->icon_jurusan == 'bi bi-graph-up') ? 'selected' : ''; ?>>Graph</option>
              <option value="bi bi-laptop" <?php echo ($jurusan->icon_jurusan == 'bi bi-laptop') ? 'selected' : ''; ?>>Laptop</option>
              <option value="bi bi-phone" <?php echo ($jurusan->icon_jurusan == 'bi bi-phone') ? 'selected' : ''; ?>>Mobile</option>
              <option value="bi bi-network" <?php echo ($jurusan->icon_jurusan == 'bi bi-network') ? 'selected' : ''; ?>>Network</option>
              <option value="bi bi-palette" <?php echo ($jurusan->icon_jurusan == 'bi bi-palette') ? 'selected' : ''; ?>>Design</option>
              <option value="bi bi-camera" <?php echo ($jurusan->icon_jurusan == 'bi bi-camera') ? 'selected' : ''; ?>>Camera</option>
              <option value="bi bi-music-note" <?php echo ($jurusan->icon_jurusan == 'bi bi-music-note') ? 'selected' : ''; ?>>Music</option>
              <option value="bi bi-brush" <?php echo ($jurusan->icon_jurusan == 'bi bi-brush') ? 'selected' : ''; ?>>Art</option>
              <option value="bi bi-calculator" <?php echo ($jurusan->icon_jurusan == 'bi bi-calculator') ? 'selected' : ''; ?>>Accounting</option>
              <option value="bi bi-cart" <?php echo ($jurusan->icon_jurusan == 'bi bi-cart') ? 'selected' : ''; ?>>Commerce</option>
              <option value="bi bi-heart-pulse" <?php echo ($jurusan->icon_jurusan == 'bi bi-heart-pulse') ? 'selected' : ''; ?>>Health</option>
              <option value="bi bi-bank" <?php echo ($jurusan->icon_jurusan == 'bi bi-bank') ? 'selected' : ''; ?>>Finance</option>
              <option value="bi bi-building" <?php echo ($jurusan->icon_jurusan == 'bi bi-building') ? 'selected' : ''; ?>>Business</option>
              <option value="bi bi-gear" <?php echo ($jurusan->icon_jurusan == 'bi bi-gear') ? 'selected' : ''; ?>>Engineering</option>
              <option value="bi bi-lightbulb" <?php echo ($jurusan->icon_jurusan == 'bi bi-lightbulb') ? 'selected' : ''; ?>>Innovation</option>
              <option value="bi bi-book" <?php echo ($jurusan->icon_jurusan == 'bi bi-book') ? 'selected' : ''; ?>>Literature</option>
              <option value="bi bi-microscope" <?php echo ($jurusan->icon_jurusan == 'bi bi-microscope') ? 'selected' : ''; ?>>Science</option>
              <option value="bi bi-people" <?php echo ($jurusan->icon_jurusan == 'bi bi-people') ? 'selected' : ''; ?>>Social</option>
            </select>
            <?php echo form_error('icon_jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Update Jurusan
            </button>
            <a href="<?php echo base_url('jurusan'); ?>" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> Batal
            </a>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
