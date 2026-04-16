<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Jadwal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jadwal'); ?>">Jadwal</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Edit Jadwal Pelajaran</h5>
          <p class="text-muted mb-0">Perbarui data jadwal pelajaran di bawah.</p>
        </div>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-triangle me-2"></i>
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (empty($jadwal)): ?>
        <div class="text-center py-5">
          <i class="bi bi-exclamation-triangle text-warning fs-1 d-block mb-3"></i>
          <h5>Data Tidak Ditemukan</h5>
          <p class="text-muted">Data jadwal yang Anda cari tidak ditemukan.</p>
          <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-primary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
          </a>
        </div>
      <?php else: ?>

      <form action="<?php echo base_url('jadwal/proses_edit'); ?>" method="post">
        <input type="hidden" name="id_jadwal" value="<?php echo $jadwal->id_jadwal; ?>">

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="id_guru" class="form-label">Guru & Mata Pelajaran <span class="text-danger">*</span></label>
              <select name="id_guru" id="id_guru" class="form-select" required>
                <option value="">-- Pilih Guru & Mapel --</option>
                <?php foreach ($guru_mapel as $gm): ?>
                  <option value="<?php echo $gm->id_guru; ?>" <?php echo ($jadwal->id_guru == $gm->id_guru) ? 'selected' : ''; ?>>
                    <?php echo $gm->nama_guru . ' - ' . $gm->nama_mapel; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="id_kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
              <select name="id_kelas" id="id_kelas" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                <?php foreach ($kelas as $k): ?>
                  <option value="<?php echo $k->id_kelas; ?>" <?php echo ($jadwal->id_kelas == $k->id_kelas) ? 'selected' : ''; ?>>
                    <?php echo $k->nama_kelas; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="mb-3">
              <label for="hari" class="form-label">Hari <span class="text-danger">*</span></label>
              <select name="hari" id="hari" class="form-select" required>
                <option value="">-- Pilih Hari --</option>
                <?php 
                  $hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                  foreach ($hari_list as $h): 
                ?>
                  <option value="<?php echo $h; ?>" <?php echo ($jadwal->hari == $h) ? 'selected' : ''; ?>>
                    <?php echo $h; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label for="jam_mulai" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
              <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?php echo $jadwal->jam_mulai; ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label for="jam_selesai" class="form-label">Jam Selesai <span class="text-danger">*</span></label>
              <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="<?php echo $jadwal->jam_selesai; ?>" required>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-start gap-2 mt-3">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Perbarui
          </button>
          <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Batal
          </a>
        </div>
      </form>

      <?php endif; ?>
    </div>
  </div>
</section>
