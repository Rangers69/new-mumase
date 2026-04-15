<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit Siswa</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('siswacontroller'); ?>">Siswa</a></li>
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
          <h5 class="card-title mb-1">Edit Data Siswa</h5>
          <p class="text-muted mb-0">
            Perbarui informasi siswa.
          </p>
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

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle me-2"></i>
          <?php echo $this->session->flashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (!empty($siswa)): ?>
        <form action="<?php echo base_url('siswacontroller/proses_edit'); ?>" method="post" role="form">
          <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa; ?>" />
          
          <div class="row">
            <!-- Informasi Personal -->
            <div class="col-lg-6 mb-4">
              <h6 class="text-primary fw-bold mb-3">
                <i class="bi bi-person me-2"></i>Informasi Personal
              </h6>
              
              <div class="row g-3">
                <div class="col-md-12">
                  <label for="nama_siswa" class="form-label">
                    Nama Lengkap <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-person"></i>
                    </span>
                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" 
                           placeholder="Contoh: Ahmad Rizki" required 
                           value="<?php echo set_value('nama_siswa', $siswa->nama_siswa); ?>">
                  </div>
                  <?php echo form_error('nama_siswa', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="nis" class="form-label">
                    NIS <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-card-text"></i>
                    </span>
                    <input type="text" class="form-control" name="nis" id="nis" 
                           placeholder="Contoh: 12345" required maxlength="10"
                           value="<?php echo set_value('nis', $siswa->nis); ?>">
                  </div>
                  <?php echo form_error('nis', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="nisn" class="form-label">
                    NISN <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-credit-card"></i>
                    </span>
                    <input type="text" class="form-control" name="nisn" id="nisn" 
                           placeholder="Contoh: 0034567890" required maxlength="10"
                           value="<?php echo set_value('nisn', $siswa->nisn); ?>">
                  </div>
                  <?php echo form_error('nisn', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="tempat_lahir" class="form-label">
                    Tempat Lahir <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-geo-alt"></i>
                    </span>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" 
                           placeholder="Contoh: Jakarta" required 
                           value="<?php echo set_value('tempat_lahir', $siswa->tempat_lahir); ?>">
                  </div>
                  <?php echo form_error('tempat_lahir', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="tanggal_lahir" class="form-label">
                    Tanggal Lahir <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-calendar"></i>
                    </span>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" 
                           required value="<?php echo set_value('tanggal_lahir', $siswa->tanggal_lahir); ?>">
                  </div>
                  <?php echo form_error('tanggal_lahir', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="jenis_kelamin" class="form-label">
                    Jenis Kelamin <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-gender-ambiguous"></i>
                    </span>
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="Laki-laki" <?php echo ($siswa->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                      <option value="Perempuan" <?php echo ($siswa->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                  </div>
                  <?php echo form_error('jenis_kelamin', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="tahun_masuk" class="form-label">
                    Tahun Masuk <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-calendar-check"></i>
                    </span>
                    <input type="number" class="form-control" name="tahun_masuk" id="tahun_masuk" 
                           placeholder="Contoh: 2023" required min="2000" max="<?php echo date('Y'); ?>"
                           value="<?php echo set_value('tahun_masuk', $siswa->tahun_masuk); ?>">
                  </div>
                  <?php echo form_error('tahun_masuk', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
              </div>
            </div>

            <!-- Informasi Kontak -->
            <div class="col-lg-6 mb-4">
              <h6 class="text-primary fw-bold mb-3">
                <i class="bi bi-telephone me-2"></i>Informasi Kontak
              </h6>
              
              <div class="row g-3">
                <div class="col-md-12">
                  <label for="alamat" class="form-label">
                    Alamat <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-house"></i>
                    </span>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3" required 
                              placeholder="Contoh: Jl. Merdeka No. 123, Jakarta Pusat"><?php echo set_value('alamat', $siswa->alamat); ?></textarea>
                  </div>
                  <?php echo form_error('alamat', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="no_hp" class="form-label">
                    No HP <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-phone"></i>
                    </span>
                    <input type="tel" class="form-control" name="no_hp" id="no_hp" 
                           placeholder="Contoh: 081234567890" required 
                           value="<?php echo set_value('no_hp', $siswa->no_hp); ?>">
                  </div>
                  <?php echo form_error('no_hp', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-6">
                  <label for="email" class="form-label">
                    Email <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control" name="email" id="email" 
                           placeholder="Contoh: email@example.com" required 
                           value="<?php echo set_value('email', $siswa->email); ?>">
                  </div>
                  <?php echo form_error('email', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
              </div>
            </div>

            <!-- Informasi Akademik -->
            <div class="col-lg-12 mb-4">
              <h6 class="text-primary fw-bold mb-3">
                <i class="bi bi-mortarboard me-2"></i>Informasi Akademik
              </h6>
              
              <div class="row g-3">
                <div class="col-md-4">
                  <label for="kelas" class="form-label">
                    Kelas <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-door-open"></i>
                    </span>
                    <select class="form-select" name="id_kelas" id="id_kelas" required>
                      <option value="">Pilih Kelas</option>
                      <?php if (!empty($kelas)): ?>
                        <?php foreach ($kelas as $kelas_item): ?>
                          <option value="<?php echo $kelas_item->id_kelas; ?>" 
                                  <?php echo set_select('id_kelas', $kelas_item->id_kelas, $siswa->id_kelas == $kelas_item->id_kelas); ?>>
                            <?php echo $kelas_item->nama_kelas; ?>
                          </option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                  <?php echo form_error('kelas', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
                
                <div class="col-md-8">
                  <label for="jurusan" class="form-label">
                    Jurusan <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-book"></i>
                    </span>
                    <select class="form-select" name="jurusan" id="jurusan" required>
                      <option value="">Pilih Jurusan</option>
                      <option value="Rekayasa Perangkat Lunak" <?php echo set_select('jurusan', 'Rekayasa Perangkat Lunak', $siswa->jurusan == 'Rekayasa Perangkat Lunak'); ?>>Rekayasa Perangkat Lunak</option>
                      <option value="Desain Komunikasi Visual" <?php echo set_select('jurusan', 'Desain Komunikasi Visual', $siswa->jurusan == 'Desain Komunikasi Visual'); ?>>Desain Komunikasi Visual</option>
                    </select>
                  </div>
                  <?php echo form_error('jurusan', '<div class="text-danger small mt-1">', '</div>'); ?>
                </div>
              </div>
            </div>

            <!-- Submit Buttons -->
            <div class="col-lg-12">
              <div class="d-flex justify-content-end gap-2">
                <a href="<?php echo base_url('siswacontroller'); ?>" class="btn btn-secondary">
                  <i class="bi bi-arrow-left me-1"></i>
                  Batal
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-save me-1"></i>
                  Perbarui Data
                </button>
              </div>
            </div>
          </div>
        </form>
      <?php else: ?>
        <div class="alert alert-warning">
          <i class="bi bi-exclamation-triangle me-2"></i>
          Data siswa tidak ditemukan.
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Form Validation -->
<script>
$(document).ready(function() {
    // Auto-capitalize first letter of each word in nama_siswa
    $('#nama_siswa').on('input', function() {
        var words = this.value.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
        }
        this.value = words.join(' ');
    });

    // Only allow numbers for NIS and NISN
    $('#nis, #nisn, #no_hp, #no_hp_ortu').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
</script>
