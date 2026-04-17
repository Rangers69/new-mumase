<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Mata Pelajaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">Mata Pelajaran</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Mata Pelajaran SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Kelola data mata pelajaran yang tersedia di sekolah.
          </p>
        </div>
        <a href="<?php echo base_url('MapelController/tambah'); ?>" class="btn btn-primary">
          <i class="bi bi-plus-circle me-1"></i> Tambah Mata Pelajaran
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
        <table class="table table-hover" id="mapelTable">
          <thead>
            <tr>
              <th width="50" class="text-center">No</th>
              <th>Nama Mata Pelajaran</th>
              <th width="120" class="text-center">Status</th>
              <th width="150" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($mapel)): ?>
              <?php $no = 1; foreach ($mapel as $row): ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <h6 class="mb-0 fw-semibold"><?php echo $row->nama_mapel; ?></h6>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <?php if ($row->active == 1): ?>
                      <span class="badge bg-success">Aktif</span>
                    <?php else: ?>
                      <span class="badge bg-danger">Tidak Aktif</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('MapelController/detail/' . $row->id_mapel); ?>" 
                         class="btn btn-sm btn-info text-white" title="Detail">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="<?php echo base_url('MapelController/edit/' . $row->id_mapel); ?>" 
                         class="btn btn-sm btn-warning text-white" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <?php if ($row->active == 1): ?>
                        <a href="<?php echo base_url('MapelController/set_inactive/' . $row->id_mapel); ?>" 
                           class="btn btn-sm btn-secondary" title="Nonaktifkan"
                           onclick="return confirm('Apakah Anda yakin ingin menonaktifkan mata pelajaran ini?')">
                          <i class="bi bi-pause-circle"></i>
                        </a>
                      <?php else: ?>
                        <a href="<?php echo base_url('MapelController/activate/' . $row->id_mapel); ?>" 
                           class="btn btn-sm btn-success" title="Aktifkan"
                           onclick="return confirm('Apakah Anda yakin ingin mengaktifkan kembali mata pelajaran ini?')">
                          <i class="bi bi-play-circle"></i>
                        </a>
                      <?php endif; ?>
                      <a href="<?php echo base_url('MapelController/hapus/' . $row->id_mapel); ?>" 
                         class="btn btn-sm btn-danger" title="Hapus"
                         onclick="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center py-4">
                  <div class="text-muted">
                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                    Tidak ada data mata pelajaran yang tersedia.
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
    $('#mapelTable').DataTable({
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
        order: [[1, 'asc']] // Sort by nama_mapel ascending
    });
});
</script>
