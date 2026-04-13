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

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="icon_program" class="form-label">Icon Program</label>
            <select class="form-select" id="icon_program" name="icon_program">
              <option value="">-- Pilih Icon --</option>
              <option value="bi-cpu" <?php echo ($program->icon_program == 'bi-cpu') ? 'selected' : ''; ?>>CPU</option>
              <option value="bi-code-slash" <?php echo ($program->icon_program == 'bi-code-slash') ? 'selected' : ''; ?>>Programming</option>
              <option value="bi-database" <?php echo ($program->icon_program == 'bi-database') ? 'selected' : ''; ?>>Database</option>
              <option value="bi-globe" <?php echo ($program->icon_program == 'bi-globe') ? 'selected' : ''; ?>>Web</option>
              <option value="bi-phone" <?php echo ($program->icon_program == 'bi-phone') ? 'selected' : ''; ?>>Mobile</option>
              <option value="bi-shield-check" <?php echo ($program->icon_program == 'bi-shield-check') ? 'selected' : ''; ?>>Security</option>
              <option value="bi-graph-up" <?php echo ($program->icon_program == 'bi-graph-up') ? 'selected' : ''; ?>>Analytics</option>
              <option value="bi-palette" <?php echo ($program->icon_program == 'bi-palette') ? 'selected' : ''; ?>>Design</option>
              <option value="bi-easel" <?php echo ($program->icon_program == 'bi-easel') ? 'selected' : ''; ?>>Art</option>
              <option value="bi-camera" <?php echo ($program->icon_program == 'bi-camera') ? 'selected' : ''; ?>>Photography</option>
              <option value="bi-music-note" <?php echo ($program->icon_program == 'bi-music-note') ? 'selected' : ''; ?>>Music</option>
              <option value="bi-film" <?php echo ($program->icon_program == 'bi-film') ? 'selected' : ''; ?>>Video</option>
              <option value="bi-book" <?php echo ($program->icon_program == 'bi-book') ? 'selected' : ''; ?>>Literature</option>
              <option value="bi-calculator" <?php echo ($program->icon_program == 'bi-calculator') ? 'selected' : ''; ?>>Accounting</option>
              <option value="bi-cash" <?php echo ($program->icon_program == 'bi-cash') ? 'selected' : ''; ?>>Finance</option>
              <option value="bi-shop" <?php echo ($program->icon_program == 'bi-shop') ? 'selected' : ''; ?>>Business</option>
              <option value="bi-heart-pulse" <?php echo ($program->icon_program == 'bi-heart-pulse') ? 'selected' : ''; ?>>Health</option>
              <option value="bi-people" <?php echo ($program->icon_program == 'bi-people') ? 'selected' : ''; ?>>Social</option>
              <option value="bi-gear" <?php echo ($program->icon_program == 'bi-gear') ? 'selected' : ''; ?>>Engineering</option>
              <option value="bi-tools" <?php echo ($program->icon_program == 'bi-tools') ? 'selected' : ''; ?>>Technical</option>
              <option value="bi-lightbulb" <?php echo ($program->icon_program == 'bi-lightbulb') ? 'selected' : ''; ?>>Innovation</option>
            </select>
            <small class="text-muted">Pilih icon yang merepresentasikan program keahlian ini</small>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="btn-group" role="group">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update Program
              </button>
              <a href="<?php echo base_url('program'); ?>" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Batal
              </a>
            </div>
          </div>
        </div>

      </form>
      
    </div>
  </div>
</section>
