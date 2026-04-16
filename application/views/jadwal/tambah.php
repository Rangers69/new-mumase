<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Jadwal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jadwal'); ?>">Jadwal</a></li>
      <li class="breadcrumb-item active">Tambah</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Tambah Jadwal Baru</h5>
          <p class="text-muted mb-0">Isi form di bawah untuk menambahkan jadwal pelajaran baru.</p>
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

      <form action="<?php echo base_url('jadwal/proses_tambah'); ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="guru_mapel" class="form-label">
                  Guru & Mata Pelajaran <span class="text-danger">*</span>
              </label>
                <select name="id_guru" id="id_guru" class="form-select" required>
                  <option value="">-- Pilih Guru & Mapel --</option>
                  <?php foreach ($guru_mapel as $gm): ?>
                    <option value="<?php echo $gm->id_guru . '|' . $gm->id_mapel; ?>">
                      <?php echo $gm->nama_guru . ' - ' . $gm->nama_mapel; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div class="form-text">Pilih guru beserta mata pelajaran yang diampu</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="id_kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
              <select name="id_kelas" id="id_kelas" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                <?php foreach ($kelas as $k): ?>
                  <option value="<?php echo $k->id_kelas; ?>">
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
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label for="jam_mulai" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
              <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label for="jam_selesai" class="form-label">Jam Selesai <span class="text-danger">*</span></label>
              <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" required>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-start gap-2 mt-3">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Simpan
          </button>
          <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</section>
