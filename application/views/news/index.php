<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data News</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">News</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data News SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Kelola berita sekolah, pengumuman, prestasi, dan informasi terbaru.
          </p>
        </div>
        <div class="d-flex gap-2">
          <a href="<?php echo base_url('news/create'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah News
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
          <h6 class="mb-3"><i class="bi bi-funnel me-1"></i> Filter News</h6>
          <form action="<?php echo base_url('news'); ?>" method="get">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="filter_category" class="form-label">Kategori</label>
                <select name="filter_category" id="filter_category" class="form-select">
                  <option value="">Semua Kategori</option>
                  <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>" <?php echo ($this->input->get('filter_category') == $category->id) ? 'selected' : ''; ?>>
                      <?php echo $category->name; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-4">
                <label for="filter_status" class="form-label">Status</label>
                <select name="filter_status" id="filter_status" class="form-select">
                  <option value="">Semua Status</option>
                  <option value="published" <?php echo ($this->input->get('filter_status') == 'published') ? 'selected' : ''; ?>>Published</option>
                  <option value="draft" <?php echo ($this->input->get('filter_status') == 'draft') ? 'selected' : ''; ?>>Draft</option>
                </select>
              </div>

              <div class="col-md-4">
                <label for="filter_keyword" class="form-label">Judul / Author</label>
                <input
                  type="text"
                  name="filter_keyword"
                  id="filter_keyword"
                  class="form-control"
                  placeholder="Cari judul atau author..."
                  value="<?php echo html_escape($this->input->get('filter_keyword')); ?>"
                >
              </div>

              <div class="col-md-12 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-search me-1"></i> Filter
                </button>
                <a href="<?php echo base_url('news'); ?>" class="btn btn-outline-secondary">
                  <i class="bi bi-x-circle me-1"></i> Reset
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table id="newsTable" class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th width="40">No</th>
              <th width="90">Thumbnail</th>
              <th>Kategori</th>
              <th>Judul</th>
              <th>Author</th>
              <th>Status</th>
              <th>Published At</th>
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($news)): ?>
              <?php $no = 1; ?>
              <?php foreach ($news as $item): ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>

                  <td class="text-center">
                    <?php if (!empty($item->thumbnail)): ?>
                      <img src="<?php echo base_url('assets/img/' . $item->thumbnail); ?>" alt="Thumbnail" class="img-thumbnail" style="max-width: 70px; max-height: 70px;">
                    <?php else: ?>
                      <span class="text-muted small">No Image</span>
                    <?php endif; ?>
                  </td>

                  <td>
                    <span class="badge bg-secondary">
                      <?php echo $item->category_name ?? '-'; ?>
                    </span>
                  </td>

                  <td>
                    <div class="fw-semibold"><?php echo $item->title; ?></div>
                    <small class="text-muted">
                      <?php echo !empty($item->short_description) ? character_limiter(strip_tags($item->short_description), 80) : '-'; ?>
                    </small>
                  </td>

                  <td><?php echo !empty($item->author) ? $item->author : '-'; ?></td>

                  <td>
                    <?php if ($item->status == 'published'): ?>
                      <span class="badge bg-success">Published</span>
                    <?php else: ?>
                      <span class="badge bg-secondary">Draft</span>
                    <?php endif; ?>
                  </td>

                  <td>
                    <?php echo !empty($item->published_at) ? date('d-m-Y H:i', strtotime($item->published_at)) : '-'; ?>
                  </td>

                  <td>
                    <div class="d-flex gap-1">
                      <a href="<?php echo base_url('news/detail/' . $item->id); ?>" class="btn btn-sm btn-info text-white" title="Detail">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="<?php echo base_url('news/edit/' . $item->id); ?>" class="btn btn-sm btn-warning" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <a href="<?php echo base_url('news/delete/' . $item->id); ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin hapus news ini?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="8" class="text-center text-muted py-4">
                  <i class="bi bi-newspaper fs-1 d-block mb-2"></i>
                  Belum ada data news.
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 5 -->
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#newsTable').DataTable({
      pageLength: 10,
      lengthMenu: [
        [5, 10, 25, 50, 100],
        [5, 10, 25, 50, 100]
      ],
      ordering: true,
      searching: true,
      paging: true,
      info: true,
      autoWidth: false,
      responsive: false,
      columnDefs: [
        { orderable: false, targets: [1, 7] }
      ],
      language: {
        lengthMenu: "Tampilkan _MENU_ data per halaman",
        search: "Cari:",
        zeroRecords: "Tidak ada data yang cocok",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data yang ditampilkan",
        infoFiltered: "(difilter dari _MAX_ total data)",
        paginate: {
          first: "Awal",
          last: "Akhir",
          next: "Selanjutnya",
          previous: "Sebelumnya"
        },
        emptyTable: "Tidak ada data tersedia"
      }
    });
  });
</script>