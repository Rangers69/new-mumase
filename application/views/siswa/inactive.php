<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Siswa Tidak Aktif</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item">Siswa</li>
      <li class="breadcrumb-item active">Tidak Aktif</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<!-- Flash Messages -->
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>
    <?php echo $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-triangle me-2"></i>
    <?php echo $this->session->flashdata('error'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<section class="section">
  <div class="card">
    <div class="card-body pt-4">

      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Siswa Tidak Aktif SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Berikut adalah daftar siswa yang tidak aktif.
          </p>
        </div>

        <a href="<?php echo base_url('SiswaController'); ?>" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Kembali ke Siswa Aktif
        </a>
      </div>

      <div class="row g-4">
        <?php if (!empty($siswa)): ?>
          <?php foreach ($siswa as $row): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="profile-avatar mb-3">
                    <div class="avatar-placeholder bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 100px; height: 100px; margin: 0 auto; font-size: 2rem;">
                      <?php echo strtoupper(substr($row->nama_siswa, 0, 1)); ?>
                    </div>
                  </div>

                  <h5 class="card-title mb-1"><?php echo $row->nama_siswa; ?></h5>
                  <p class="text-muted mb-2"><?php echo $row->kelas; ?> - <?php echo $row->jurusan; ?></p>

                  <div class="text-muted small mb-3">
                    <div><strong>NIS:</strong> <?php echo $row->nis; ?></div>
                    <div><strong>Email:</strong> <?php echo $row->email; ?></div>
                    <div><strong>Tahun Masuk:</strong> <?php echo $row->tahun_masuk; ?></div>
                  </div>

                  <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="<?php echo base_url('SiswaController/detail/' . $row->id_siswa); ?>" class="btn btn-info btn-sm text-white">
                      <i class="bi bi-eye"></i> Detail
                    </a>
                    <a href="<?php echo base_url('SiswaController/edit/' . $row->id_siswa); ?>" class="btn btn-warning btn-sm text-white">
                      <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="<?php echo base_url('SiswaController/activate/' . $row->id_siswa); ?>" 
                       class="btn btn-success btn-sm"
                       onclick="return confirm('Apakah Anda yakin ingin mengaktifkan kembali siswa ini?')">
                      <i class="bi bi-play-circle"></i> Aktifkan
                    </a>
                    <a href="<?php echo base_url('SiswaController/hapus/' . $row->id_siswa); ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">
                      <i class="bi bi-trash"></i> Hapus
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-info text-center mb-0">
              <i class="bi bi-info-circle"></i> Tidak ada data siswa tidak aktif yang tersedia.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
