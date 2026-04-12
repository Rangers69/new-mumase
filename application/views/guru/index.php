<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Guru</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">Guru</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">

      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Guru SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Berikut adalah daftar tenaga pengajar profesional yang siap membimbing siswa meraih kesuksesan.
          </p>
        </div>

        <a href="<?php echo base_url('guru/tambah'); ?>" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Tambah Guru
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

      <div class="row g-4">
        <?php if (!empty($guru)): ?>
          <?php foreach ($guru as $row): ?>
            <div class="col-xxl-3 col-xl-4 col-md-6">
              <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                  <img 
                    src="<?php echo base_url('assets/img/guru/' . (!empty($row->foto_guru) ? $row->foto_guru : 'default.jpg')); ?>" 
                    alt="<?php echo $row->nama_guru; ?>" 
                    class="rounded-circle mb-3"
                    style="width: 120px; height: 120px; object-fit: cover;"
                  >

                  <h5 class="card-title mb-1"><?php echo $row->nama_guru; ?></h5>
                  <p class="text-primary fw-semibold mb-2"><?php echo $row->mapel_guru; ?></p>

                  <div class="text-muted small mb-3">
                    <div><strong>Hobi:</strong> <?php echo !empty($row->hobi_guru) ? $row->hobi_guru : '-'; ?></div>
                    <div><strong>Bergabung:</strong> <?php echo !empty($row->tanggal_bergabung) ? date('d F Y', strtotime($row->tanggal_bergabung)) : '-'; ?></div>
                  </div>

                  <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="<?php echo base_url('guru/detail/' . $row->id_guru); ?>" class="btn btn-info btn-sm text-white">
                      <i class="bi bi-eye"></i> Detail
                    </a>
                    <a href="<?php echo base_url('guru/edit/' . $row->id_guru); ?>" class="btn btn-warning btn-sm text-white">
                      <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a 
                      href="<?php echo base_url('guru/hapus/' . $row->id_guru); ?>" 
                      class="btn btn-danger btn-sm"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                    >
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
              <i class="bi bi-info-circle"></i> Belum ada data guru yang tersedia.
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>