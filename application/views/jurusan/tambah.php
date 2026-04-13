<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Jurusan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jurusan'); ?>">Jurusan</a></li>
      <li class="breadcrumb-item active">Tambah Jurusan</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Tambah Jurusan</h4>
        <p class="text-muted">Silakan isi form berikut untuk menambahkan data jurusan.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('jurusan/insert'); ?>" method="post" enctype="multipart/form-data">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_jurusan" class="form-label">Nama Jurusan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" 
                   value="<?php echo set_value('nama_jurusan'); ?>" required>
            <?php echo form_error('nama_jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="deskripsi_jurusan" class="form-label">Deskripsi Jurusan <span class="text-danger">*</span></label>
            <textarea class="form-control" id="deskripsi_jurusan" name="deskripsi_jurusan" rows="5" required><?php echo set_value('deskripsi_jurusan'); ?></textarea>
            <?php echo form_error('deskripsi_jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="icon_jurusan" class="form-label">Icon Jurusan <span class="text-danger">*</span></label>
            <select class="form-select" id="icon_jurusan" name="icon_jurusan" required>
              <option value="">-- Pilih Icon --</option>
              <option value="bi bi-cpu" <?php echo set_select('icon_jurusan', 'bi bi-cpu'); ?>>CPU</option>
              <option value="bi bi-code-slash" <?php echo set_select('icon_jurusan', 'bi bi-code-slash'); ?>>Code</option>
              <option value="bi bi-database" <?php echo set_select('icon_jurusan', 'bi bi-database'); ?>>Database</option>
              <option value="bi bi-globe" <?php echo set_select('icon_jurusan', 'bi bi-globe'); ?>>Globe</option>
              <option value="bi bi-graph-up" <?php echo set_select('icon_jurusan', 'bi bi-graph-up'); ?>>Graph</option>
              <option value="bi bi-laptop" <?php echo set_select('icon_jurusan', 'bi bi-laptop'); ?>>Laptop</option>
              <option value="bi bi-phone" <?php echo set_select('icon_jurusan', 'bi bi-phone'); ?>>Mobile</option>
              <option value="bi bi-network" <?php echo set_select('icon_jurusan', 'bi bi-network'); ?>>Network</option>
              <option value="bi bi-palette" <?php echo set_select('icon_jurusan', 'bi bi-palette'); ?>>Design</option>
              <option value="bi bi-camera" <?php echo set_select('icon_jurusan', 'bi bi-camera'); ?>>Camera</option>
              <option value="bi bi-music-note" <?php echo set_select('icon_jurusan', 'bi bi-music-note'); ?>>Music</option>
              <option value="bi bi-brush" <?php echo set_select('icon_jurusan', 'bi bi-brush'); ?>>Art</option>
              <option value="bi bi-calculator" <?php echo set_select('icon_jurusan', 'bi bi-calculator'); ?>>Accounting</option>
              <option value="bi bi-cart" <?php echo set_select('icon_jurusan', 'bi bi-cart'); ?>>Commerce</option>
              <option value="bi bi-heart-pulse" <?php echo set_select('icon_jurusan', 'bi bi-heart-pulse'); ?>>Health</option>
              <option value="bi bi-bank" <?php echo set_select('icon_jurusan', 'bi bi-bank'); ?>>Finance</option>
              <option value="bi bi-building" <?php echo set_select('icon_jurusan', 'bi bi-building'); ?>>Business</option>
              <option value="bi bi-gear" <?php echo set_select('icon_jurusan', 'bi bi-gear'); ?>>Engineering</option>
              <option value="bi bi-lightbulb" <?php echo set_select('icon_jurusan', 'bi bi-lightbulb'); ?>>Innovation</option>
              <option value="bi bi-book" <?php echo set_select('icon_jurusan', 'bi bi-book'); ?>>Literature</option>
              <option value="bi bi-microscope" <?php echo set_select('icon_jurusan', 'bi bi-microscope'); ?>>Science</option>
              <option value="bi bi-people" <?php echo set_select('icon_jurusan', 'bi bi-people'); ?>>Social</option>
            </select>
            <?php echo form_error('icon_jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Simpan Jurusan
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
