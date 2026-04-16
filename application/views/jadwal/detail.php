<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Jadwal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jadwal'); ?>">Jadwal</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">

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

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Detail Jadwal Pelajaran</h5>
          <p class="text-muted mb-0">Informasi lengkap jadwal pelajaran.</p>
        </div>
        <div class="d-flex gap-2">
          <a href="<?php echo base_url('jadwal/edit/' . $jadwal->id_jadwal); ?>" class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit
          </a>
          <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h6 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Informasi Jadwal</h6>
            </div>
            <div class="card-body">
              <table class="table table-borderless">
                <tr>
                  <th width="180" class="text-muted">Hari</th>
                  <td>
                    <span class="badge bg-primary fs-6"><?php echo $jadwal->hari; ?></span>
                  </td>
                </tr>
                <tr>
                  <th class="text-muted">Jam Pelajaran</th>
                  <td>
                    <span class="fs-6">
                      <i class="bi bi-clock me-1"></i>
                      <?php echo $jadwal->jam_mulai . ' - ' . $jadwal->jam_selesai; ?> WIB
                    </span>
                  </td>
                </tr>
                <tr>
                  <th class="text-muted">Mata Pelajaran</th>
                  <td><?php echo $jadwal->nama_mapel ?? '-'; ?></td>
                </tr>
                <tr>
                  <th class="text-muted">Guru Pengampu</th>
                  <td>
                    <?php echo $jadwal->nama_guru ?? '-'; ?>
                    <?php if (!empty($jadwal->nip)): ?>
                      <br><small class="text-muted">NIP: <?php echo $jadwal->nip; ?></small>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th class="text-muted">Kelas</th>
                  <td><?php echo $jadwal->nama_kelas ?? '-'; ?></td>
                </tr>
                <tr>
                  <th class="text-muted">Status</th>
                  <td>
                    <?php if ($jadwal->active == 1): ?>
                      <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aktif</span>
                    <?php else: ?>
                      <span class="badge bg-secondary"><i class="bi bi-pause-circle me-1"></i>Tidak Aktif</span>
                    <?php endif; ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php endif; ?>
    </div>
  </div>
</section>
