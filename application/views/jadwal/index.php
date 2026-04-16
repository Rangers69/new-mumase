<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Jadwal Pelajaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">Jadwal</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Jadwal Pelajaran SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Kelola jadwal pelajaran untuk setiap kelas.
          </p>
        </div>
        <div class="d-flex gap-2">
          <a href="<?php echo base_url('jadwal/inactive'); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-pause-circle me-1"></i> Jadwal Tidak Aktif
          </a>
          <a href="<?php echo base_url('jadwal/tambah'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jadwal
          </a>
        </div>
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

      <!-- Filter Section -->
      <div class="card bg-light mb-4">
        <div class="card-body">
          <h6 class="mb-3"><i class="bi bi-funnel me-1"></i> Filter Jadwal</h6>
          <form action="<?php echo base_url('jadwal'); ?>" method="get">
            <div class="row g-3">
              <div class="col-md-3">
                <label for="filter_kelas" class="form-label">Kelas</label>
                <select name="filter_kelas" id="filter_kelas" class="form-select">
                  <option value="">Semua Kelas</option>
                  <?php foreach ($kelas_list as $k): ?>
                    <option value="<?php echo $k->id_kelas; ?>" <?php echo ($this->input->get('filter_kelas') == $k->id_kelas) ? 'selected' : ''; ?>>
                      <?php echo $k->nama_kelas; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filter_hari" class="form-label">Hari</label>
                <select name="filter_hari" id="filter_hari" class="form-select">
                  <option value="">Semua Hari</option>
                  <?php 
                    $hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    foreach ($hari_list as $h): 
                  ?>
                    <option value="<?php echo $h; ?>" <?php echo ($this->input->get('filter_hari') == $h) ? 'selected' : ''; ?>>
                      <?php echo $h; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filter_guru" class="form-label">Guru</label>
                <select name="filter_guru" id="filter_guru" class="form-select">
                  <option value="">Semua Guru</option>
                  <?php foreach ($guru_list as $g): ?>
                    <option value="<?php echo $g->id_guru; ?>" <?php echo ($this->input->get('filter_guru') == $g->id_guru) ? 'selected' : ''; ?>>
                      <?php echo $g->nama_guru; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-search me-1"></i> Filter
                </button>
                <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-outline-secondary">
                  <i class="bi bi-x-circle me-1"></i> Reset
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

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
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($jadwal)): ?>
              <?php $no = 1; ?>
              <?php foreach ($jadwal as $j): ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td>
                    <span class="badge bg-primary"><?php echo $j->hari; ?></span>
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
                      <a href="<?php echo base_url('jadwal/edit/' . $j->id_jadwal); ?>" class="btn btn-sm btn-warning" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <a href="<?php echo base_url('jadwal/set_inactive/' . $j->id_jadwal); ?>" class="btn btn-sm btn-secondary" title="Nonaktifkan" onclick="return confirm('Nonaktifkan jadwal ini?')">
                        <i class="bi bi-pause-circle"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-4">
                  <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                  Belum ada data jadwal.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
