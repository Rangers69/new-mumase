<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Program</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('program'); ?>">Program</a></li>
      <li class="breadcrumb-item active">Tambah Program</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="card-title mb-4">
        <h4>Form Tambah Program</h4>
        <p class="text-muted">Silakan isi form berikut untuk menambahkan program keahlian baru.</p>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('program/insert'); ?>" method="post">
        
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="nama_program" class="form-label">Nama Program <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_program" name="nama_program" 
                   value="<?php echo set_value('nama_program'); ?>" required>
            <?php echo form_error('nama_program', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="deskripsi" class="form-label">Deskripsi Program <span class="text-danger">*</span></label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required><?php echo set_value('deskripsi'); ?></textarea>
            <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="icon_program" class="form-label">Icon Program</label>
            <select class="form-select" id="icon_program" name="icon_program">
              <option value="">-- Pilih Icon --</option>
              <option value="bi-cpu" <?php echo set_select('icon_program', 'bi-cpu'); ?>>CPU</option>
              <option value="bi-code-slash" <?php echo set_select('icon_program', 'bi-code-slash'); ?>>Programming</option>
              <option value="bi-database" <?php echo set_select('icon_program', 'bi-database'); ?>>Database</option>
              <option value="bi-globe" <?php echo set_select('icon_program', 'bi-globe'); ?>>Web</option>
              <option value="bi-phone" <?php echo set_select('icon_program', 'bi-phone'); ?>>Mobile</option>
              <option value="bi-shield-check" <?php echo set_select('icon_program', 'bi-shield-check'); ?>>Security</option>
              <option value="bi-graph-up" <?php echo set_select('icon_program', 'bi-graph-up'); ?>>Analytics</option>
              <option value="bi-palette" <?php echo set_select('icon_program', 'bi-palette'); ?>>Design</option>
              <option value="bi-easel" <?php echo set_select('icon_program', 'bi-easel'); ?>>Art</option>
              <option value="bi-camera" <?php echo set_select('icon_program', 'bi-camera'); ?>>Photography</option>
              <option value="bi-music-note" <?php echo set_select('icon_program', 'bi-music-note'); ?>>Music</option>
              <option value="bi-film" <?php echo set_select('icon_program', 'bi-film'); ?>>Video</option>
              <option value="bi-book" <?php echo set_select('icon_program', 'bi-book'); ?>>Literature</option>
              <option value="bi-calculator" <?php echo set_select('icon_program', 'bi-calculator'); ?>>Accounting</option>
              <option value="bi-cash" <?php echo set_select('icon_program', 'bi-cash'); ?>>Finance</option>
              <option value="bi-shop" <?php echo set_select('icon_program', 'bi-shop'); ?>>Business</option>
              <option value="bi-heart-pulse" <?php echo set_select('icon_program', 'bi-heart-pulse'); ?>>Health</option>
              <option value="bi-people" <?php echo set_select('icon_program', 'bi-people'); ?>>Social</option>
              <option value="bi-gear" <?php echo set_select('icon_program', 'bi-gear'); ?>>Engineering</option>
              <option value="bi-tools" <?php echo set_select('icon_program', 'bi-tools'); ?>>Technical</option>
              <option value="bi-lightbulb" <?php echo set_select('icon_program', 'bi-lightbulb'); ?>>Innovation</option>
            </select>
            <small class="text-muted">Pilih icon yang merepresentasikan program keahlian ini</small>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Simpan Program
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
