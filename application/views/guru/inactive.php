<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Guru Tidak Aktif</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item">Guru</li>
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
          <h5 class="card-title mb-1">Data Guru Tidak Aktif SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Berikut adalah daftar tenaga pengajar yang tidak aktif.
          </p>
        </div>

        <a href="<?php echo base_url('guru/active'); ?>" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Kembali ke Guru Aktif
        </a>
      </div>

      <div class="row g-4">
        <?php if (!empty($guru)): ?>
          <?php foreach ($guru as $row): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body text-center">
                  <img src="<?php echo base_url('assets/img/guru/' . ($row->foto_guru ?: 'default.jpg')); ?>" 
                       alt="<?php echo $row->nama_guru; ?>" 
                       class="img-fluid rounded-circle mb-3" 
                       style="width: 100px; height: 100px; object-fit: cover;">

                  <h5 class="card-title mb-1"><?php echo $row->nama_guru; ?></h5>
                  <p class="text-muted mb-2">
                    <?php if (!empty($row->guru_mapel)): ?>
                      <?php foreach ($row->guru_mapel as $mapel): ?>
                        <span class="badge bg-secondary me-1 mb-1"><?php echo $mapel->nama_mapel; ?></span>
                      <?php endforeach; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </p>

                  <div class="text-muted small mb-3">
                    <div><strong>Hobi:</strong> <?php echo !empty($row->hobi) ? $row->hobi : '-'; ?></div>
                    <div><strong>Bergabung:</strong> <?php echo !empty($row->tanggal_bergabung) ? date('d F Y', strtotime($row->tanggal_bergabung)) : '-'; ?></div>
                  </div>

                  <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="<?php echo base_url('guru/detail/' . $row->id_guru); ?>" class="btn btn-info btn-sm text-white">
                      <i class="bi bi-eye"></i> Detail
                    </a>
                    <a 
                      href="<?php echo base_url('guru/activate/' . $row->id_guru); ?>" 
                      class="btn btn-success btn-sm"
                      onclick="return confirm('Apakah Anda yakin ingin mengaktifkan kembali data ini?')"
                    >
                      <i class="bi bi-play-circle"></i> Aktifkan
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-info text-center mb-0">
              <i class="bi bi-info-circle"></i> Tidak ada data guru tidak aktif yang tersedia.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
