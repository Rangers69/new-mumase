<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Jadwal Tidak Aktif</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('jadwal'); ?>">Jadwal</a></li>
      <li class="breadcrumb-item active">Tidak Aktif</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Jadwal Tidak Aktif</h5>
          <p class="text-muted mb-0">
            Daftar jadwal yang sudah dinonaktifkan.
          </p>
        </div>
        <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-primary">
          <i class="bi bi-arrow-left me-1"></i> Kembali ke Jadwal Aktif
        </a>
      </div>

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

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th width="40">No</th>
              <th>Hari</th>
              <th>Jam</th>
              <th>Mata Pelajaran</th>
              <th>Guru</th>
              <th>Kelas</th>
              <th width="180">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($jadwal)): ?>
              <?php $no = 1; ?>
              <?php foreach ($jadwal as $j): ?>
                <tr class="table-secondary">
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td>
                    <span class="badge bg-secondary"><?php echo $j->hari; ?></span>
                  </td>
                  <td><?php echo $j->jam_mulai . ' - ' . $j->jam_selesai; ?></td>
                  <td><?php echo $j->nama_mapel ?? '-'; ?></td>
                  <td><?php echo $j->nama_guru ?? '-'; ?></td>
                  <td><?php echo $j->nama_kelas ?? '-'; ?></td>
                  <td>
                    <div class="d-flex gap-1">
                      <a href="<?php echo base_url('jadwal/detail/' . $j->id_jadwal); ?>" class="btn btn-sm btn-info" title="Detail">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="<?php echo base_url('jadwal/activate/' . $j->id_jadwal); ?>" class="btn btn-sm btn-success" title="Aktifkan" onclick="return confirm('Aktifkan kembali jadwal ini?')">
                        <i class="bi bi-check-circle"></i>
                      </a>
                      <a href="<?php echo base_url('jadwal/hapus/' . $j->id_jadwal); ?>" class="btn btn-sm btn-danger" title="Hapus Permanen" onclick="return confirm('PERHATIAN: Data akan dihapus permanen. Lanjutkan?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-4">
                  <i class="bi bi-calendar-check fs-1 d-block mb-2"></i>
                  Tidak ada jadwal yang tidak aktif.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
