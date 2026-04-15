<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Siswa</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">Siswa</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Siswa SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Kelola data siswa yang terdaftar di sekolah.
          </p>
        </div>
        <div class="d-flex gap-2">
          <a href="<?php echo base_url('siswacontroller/import'); ?>" class="btn btn-success">
            <i class="bi bi-upload me-1"></i> Import Excel
          </a>
          <a href="<?php echo base_url('siswacontroller/inactive'); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-pause-circle me-1"></i> Siswa Tidak Aktif
          </a>
          <a href="<?php echo base_url('siswacontroller/tambah'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
          </a>
        </div>
      </div>

      <!-- Filter Section -->
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card border-0 bg-light">
            <div class="card-body">
              <form method="GET" action="<?php echo base_url('siswacontroller'); ?>" class="row g-3">
                <div class="col-md-3">
                  <label for="filter_kelas" class="form-label small">Filter Kelas</label>
                  <select class="form-select form-select-sm" name="filter_kelas" id="filter_kelas">
                    <option value="">Semua Kelas</option>
                    <?php if (!empty($kelas_list)): ?>
                      <?php foreach ($kelas_list as $kelas_item): ?>
                        <option value="<?php echo $kelas_item->id_kelas; ?>" 
                                <?php echo (isset($_GET['filter_kelas']) && $_GET['filter_kelas'] == $kelas_item->id_kelas) ? 'selected' : ''; ?>>
                          <?php echo $kelas_item->nama_kelas; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="filter_jurusan" class="form-label small">Filter Jurusan</label>
                  <select class="form-select form-select-sm" name="filter_jurusan" id="filter_jurusan">
                    <option value="">Semua Jurusan</option>
                    <option value="Rekayasa Perangkat Lunak" 
                            <?php echo (isset($_GET['filter_jurusan']) && $_GET['filter_jurusan'] == 'Rekayasa Perangkat Lunak') ? 'selected' : ''; ?>>
                      Rekayasa Perangkat Lunak
                    </option>
                    <option value="Desain Komunikasi Visual" 
                            <?php echo (isset($_GET['filter_jurusan']) && $_GET['filter_jurusan'] == 'Desain Komunikasi Visual') ? 'selected' : ''; ?>>
                      Desain Komunikasi Visual
                    </option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="search" class="form-label small">Cari Siswa</label>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="search" id="search" 
                           placeholder="Cari nama, NIS, atau email..." 
                           value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="btn btn-outline-primary">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                  <a href="<?php echo base_url('siswacontroller'); ?>" class="btn btn-sm btn-outline-secondary w-100">
                    <i class="bi bi-arrow-clockwise me-1"></i> Reset
                  </a>
                </div>
              </form>
            </div>
          </div>
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

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-hover" id="siswaTable">
          <thead>
            <tr>
              <th width="50" class="text-center">No</th>
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th width="120" class="text-center">Status</th>
              <th width="150" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($siswa)): ?>
              <?php $no = 1; foreach ($siswa as $row): ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <h6 class="mb-0 fw-semibold"><?php echo $row->nama_siswa; ?></h6>
                        <small class="text-muted"><?php echo $row->email; ?></small>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $row->nis; ?></td>
                  <td><?php echo $row->nama_kelas; ?></td>
                  <td><?php echo $row->jurusan; ?></td>
                  <td class="text-center">
                    <?php if ($row->active == 1): ?>
                      <span class="badge bg-success">Aktif</span>
                    <?php else: ?>
                      <span class="badge bg-danger">Tidak Aktif</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('siswacontroller/detail/' . $row->id_siswa); ?>" 
                         class="btn btn-sm btn-info text-white" title="Detail">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="<?php echo base_url('siswacontroller/edit/' . $row->id_siswa); ?>" 
                         class="btn btn-sm btn-warning text-white" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <a href="<?php echo base_url('siswacontroller/set_inactive/' . $row->id_siswa); ?>" 
                         class="btn btn-sm btn-secondary" title="Nonaktifkan"
                         onclick="return confirm('Apakah Anda yakin ingin menonaktifkan siswa ini?')">
                        <i class="bi bi-pause-circle"></i>
                      </a>
                      <a href="<?php echo base_url('siswacontroller/hapus/' . $row->id_siswa); ?>" 
                         class="btn btn-sm btn-danger" title="Hapus"
                         onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center py-4">
                  <div class="text-muted">
                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                    Tidak ada data siswa yang tersedia.
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#siswaTable').DataTable({
        responsive: true,
        language: {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            },
            "zeroRecords": "Tidak ada data yang ditemukan",
            "emptyTable": "Tidak ada data yang tersedia"
        },
        order: [[1, 'asc']] // Sort by nama_siswa ascending
    });
});
</script>
