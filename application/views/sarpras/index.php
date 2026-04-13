<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Sarana Prasarana</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">Sarana Prasarana</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">

      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Sarana Prasarana SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Berikut adalah daftar sarana prasarana yang tersedia di SMK Muhammadiyah 15 Jakarta.
          </p>
        </div>

        <a href="<?php echo base_url('sarpras/tambah'); ?>" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Tambah Sarana Prasarana
        </a>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($sarpras)): ?>
              <?php $no = 1; foreach ($sarpras as $row): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->nama_sarpras; ?></td>
                  <td><img src="<?php echo base_url('assets/img/sarpras/' . $row->foto_sarpras); ?>" alt="<?php echo $row->nama_sarpras; ?>" style="width: 100px; height: 100px; object-fit: cover;"></td>
                  <td><?php echo $row->deskripsi_sarpras; ?></td>
                  <td><?php echo $row->kategori_sarpras; ?></td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('sarpras/detail/'.$row->id_sarpras); ?>" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="<?php echo base_url('sarpras/edit/'.$row->id_sarpras); ?>" class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <a href="<?php echo base_url('sarpras/delete/'.$row->id_sarpras); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center">
                  <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> Belum ada data sarana prasarana yang tersedia.
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
