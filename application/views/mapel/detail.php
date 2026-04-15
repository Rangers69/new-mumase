<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Mata Pelajaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('mapelcontroller'); ?>">Mata Pelajaran</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <?php if (!empty($mapel)): ?>
    <div class="row">
      <!-- Information Cards -->
      <div class="col-lg-12">
        <!-- Informasi Utama -->
        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <h6 class="mb-0">
              <i class="bi bi-book me-2"></i>Informasi Mata Pelajaran
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">ID Mata Pelajaran</label>
                  <p class="mb-0 fw-semibold"><?php echo $mapel->id_mapel; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Nama Mata Pelajaran</label>
                  <p class="mb-0 fw-semibold"><?php echo $mapel->nama_mapel; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Status</label>
                  <p class="mb-0">
                    <?php if ($mapel->active == 1): ?>
                      <span class="badge bg-success">Aktif</span>
                    <?php else: ?>
                      <span class="badge bg-danger">Tidak Aktif</span>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label class="text-muted small">Tanggal Dibuat</label>
                  <p class="mb-0 fw-semibold">
                    <?php echo !empty($mapel->created_at) ? date('d F Y H:i', strtotime($mapel->created_at)) : '-'; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistik Penggunaan -->
        <div class="card mb-4">
          <div class="card-header bg-info text-white">
            <h6 class="mb-0">
              <i class="bi bi-people me-2"></i>Statistik Penggunaan
            </h6>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <div class="info-item text-center">
                  <div class="text-primary fs-2 fw-bold">
                    <?php 
                    $this->db->from('tb_guru_mapel');
                    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_guru_mapel.id_guru', 'inner');
                    $this->db->where('tb_guru_mapel.id_mapel', $mapel->id_mapel);
                    $this->db->where('tb_guru_mapel.active', 1);
                    $this->db->where('tb_guru.active', 1);
                    $guru_count = $this->db->count_all_results();
                    echo $guru_count;
                    ?>
                  </div>
                  <div class="text-muted small">Guru Mengampu</div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="info-item">
                  <label class="text-muted small">Daftar Guru yang Mengampu</label>
                  <p class="mb-0">
                    <?php 
                    $this->db->select('tb_guru.nama_guru');
                    $this->db->from('tb_guru_mapel');
                    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_guru_mapel.id_guru', 'inner');
                    $this->db->where('tb_guru_mapel.id_mapel', $mapel->id_mapel);
                    $this->db->where('tb_guru_mapel.active', 1);
                    $this->db->where('tb_guru.active', 1);
                    $this->db->order_by('tb_guru.nama_guru', 'ASC');
                    $guru_list = $this->db->get()->result();
                    
                    if (!empty($guru_list)): ?>
                      <?php foreach ($guru_list as $guru): ?>
                        <span class="badge bg-primary me-1 mb-1"><?php echo $guru->nama_guru; ?></span>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <span class="text-muted">Tidak ada guru yang mengampu mata pelajaran ini.</span>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2">
          <a href="<?php echo base_url('mapelcontroller'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
          </a>
          <a href="<?php echo base_url('mapelcontroller/edit/' . $mapel->id_mapel); ?>" class="btn btn-warning text-white">
            <i class="bi bi-pencil me-1"></i>
            Edit
          </a>
          <?php if ($mapel->active == 1): ?>
            <a href="<?php echo base_url('mapelcontroller/set_inactive/' . $mapel->id_mapel); ?>" 
               class="btn btn-secondary"
               onclick="return confirm('Apakah Anda yakin ingin menonaktifkan mata pelajaran ini?')">
              <i class="bi bi-pause-circle me-1"></i>
              Nonaktifkan
            </a>
          <?php else: ?>
            <a href="<?php echo base_url('mapelcontroller/activate/' . $mapel->id_mapel); ?>" 
               class="btn btn-success"
               onclick="return confirm('Apakah Anda yakin ingin mengaktifkan kembali mata pelajaran ini?')">
              <i class="bi bi-play-circle me-1"></i>
              Aktifkan
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="card">
      <div class="card-body text-center py-5">
        <i class="bi bi-exclamation-triangle text-warning fs-1 d-block mb-3"></i>
        <h5>Data Tidak Ditemukan</h5>
        <p class="text-muted">Data mata pelajaran yang Anda cari tidak ditemukan.</p>
        <a href="<?php echo base_url('mapel'); ?>" class="btn btn-primary">
          <i class="bi bi-arrow-left me-1"></i>
          Kembali ke Daftar
        </a>
      </div>
    </div>
  <?php endif; ?>
</section>
