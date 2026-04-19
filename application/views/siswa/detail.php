<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Siswa</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('SiswaController'); ?>">Siswa</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <?php if (!empty($siswa)): ?>
    <div class="row">
      <!-- Profile Card -->
      <div class="col-lg-4 col-md-5 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <div class="profile-avatar mb-3">
              <div class="avatar-placeholder bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                   style="width: 150px; height: 150px; margin: 0 auto; font-size: 3rem;">
                <?php echo strtoupper(substr($siswa->nama_siswa, 0, 2)); ?>
              </div>
            </div>
            <h4 class="card-title mb-1"><?php echo $siswa->nama_siswa; ?></h4>
            <p class="text-primary fw-semibold mb-3"><?php echo $siswa->nama_kelas; ?> - <?php echo $siswa->jurusan; ?></p>
            
            <div class="d-flex justify-content-center gap-2 mb-3">
              <a href="mailto:<?php echo $siswa->email; ?>" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-envelope"></i>
              </a>
              <a href="tel:<?php echo $siswa->no_hp; ?>" class="btn btn-sm btn-outline-success">
                <i class="bi bi-telephone"></i>
              </a>
            </div>
            
            <div class="text-muted small">
              <div><strong>NIS:</strong> <?php echo $siswa->nis; ?></div>
              <div><strong>NISN:</strong> <?php echo $siswa->nisn; ?></div>
              <div><strong>Tahun Masuk:</strong> <?php echo $siswa->tahun_masuk; ?></div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Information Cards -->
      <div class="col-lg-8 col-md-7">
        <!-- Informasi Personal -->
        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <h6 class="mb-0">
              <i class="bi bi-person-badge me-2"></i>Informasi Personal
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Nama Lengkap</label>
                  <p class="mb-0 fw-semibold"><?php echo $siswa->nama_siswa; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Jenis Kelamin</label>
                  <p class="mb-0 fw-semibold">
                    <?php echo $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Tempat Lahir</label>
                  <p class="mb-0 fw-semibold"><?php echo $siswa->tempat_lahir; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Tanggal Lahir</label>
                  <p class="mb-0 fw-semibold">
                    <?php echo !empty($siswa->tanggal_lahir) ? date('d F Y', strtotime($siswa->tanggal_lahir)) : '-'; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="card mb-4">
          <div class="card-header bg-info text-white">
            <h6 class="mb-0">
              <i class="bi bi-telephone me-2"></i>Informasi Kontak
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Email</label>
                  <p class="mb-0">
                    <a href="mailto:<?php echo $siswa->email; ?>" class="text-primary">
                      <?php echo $siswa->email; ?>
                    </a>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">No HP</label>
                  <p class="mb-0">
                    <a href="tel:<?php echo $siswa->no_hp; ?>" class="text-success">
                      <?php echo $siswa->no_hp; ?>
                    </a>
                  </p>
                </div>
              </div>
              <div class="col-12">
                <div class="info-item">
                  <label class="text-muted small">Alamat</label>
                  <p class="mb-0"><?php echo $siswa->alamat; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informasi Akademik -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white">
            <h6 class="mb-0">
              <i class="bi bi-mortarboard me-2"></i>Informasi Akademik
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <div class="info-item">
                  <label class="text-muted small">Kelas</label>
                  <p class="mb-0 fw-semibold"><?php echo $siswa->nama_kelas; ?></p>
                </div>
              </div>
              <div class="col-md-8">
                <div class="info-item">
                  <label class="text-muted small">Jurusan</label>
                  <p class="mb-0 fw-semibold"><?php echo $siswa->jurusan; ?></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-item">
                  <label class="text-muted small">Tahun Masuk</label>
                  <p class="mb-0 fw-semibold"><?php echo $siswa->tahun_masuk; ?></p>
                </div>
              </div>
              <div class="col-md-8">
                <div class="info-item">
                  <label class="text-muted small">Status</label>
                  <p class="mb-0">
                    <?php if ($siswa->active == 1): ?>
                      <span class="badge bg-success">Aktif</span>
                    <?php else: ?>
                      <span class="badge bg-danger">Tidak Aktif</span>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informasi Orang Tua -->
        <?php if (!empty($siswa->nama_ortu) || !empty($siswa->no_hp_ortu)): ?>
        <div class="card mb-4">
          <div class="card-header bg-secondary text-white">
            <h6 class="mb-0">
              <i class="bi bi-people me-2"></i>Informasi Orang Tua
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <?php if (!empty($siswa->nama_ortu)): ?>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Nama Orang Tua/Wali</label>
                  <p class="mb-0 fw-semibold"><?php echo $siswa->nama_ortu; ?></p>
                </div>
              </div>
              <?php endif; ?>
              <?php if (!empty($siswa->no_hp_ortu)): ?>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">No HP Orang Tua/Wali</label>
                  <p class="mb-0">
                    <a href="tel:<?php echo $siswa->no_hp_ortu; ?>" class="text-success">
                      <?php echo $siswa->no_hp_ortu; ?>
                    </a>
                  </p>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2">
          <a href="<?php echo base_url('SiswaController'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
          </a>
          <a href="<?php echo base_url('SiswaController/edit/' . $siswa->id_siswa); ?>" class="btn btn-warning text-white">
            <i class="bi bi-pencil me-1"></i>
            Edit
          </a>
          <a href="<?php echo base_url('SiswaController/set_inactive/' . $siswa->id_siswa); ?>" 
             class="btn btn-secondary"
             onclick="return confirm('Apakah Anda yakin ingin menonaktifkan siswa ini?')">
            <i class="bi bi-pause-circle me-1"></i>
            Nonaktifkan
          </a>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="card">
      <div class="card-body text-center py-5">
        <i class="bi bi-exclamation-triangle text-warning fs-1 d-block mb-3"></i>
        <h5>Data Tidak Ditemukan</h5>
        <p class="text-muted">Data siswa yang Anda cari tidak ditemukan.</p>
        <a href="<?php echo base_url('siswa'); ?>" class="btn btn-primary">
          <i class="bi bi-arrow-left me-1"></i>
          Kembali ke Daftar
        </a>
      </div>
    </div>
  <?php endif; ?>
</section>
