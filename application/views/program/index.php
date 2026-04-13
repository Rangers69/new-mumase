<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Data Program</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item active">Program</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">

      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
          <h5 class="card-title mb-1">Data Program SMK Muhammadiyah 15 Jakarta</h5>
          <p class="text-muted mb-0">
            Berikut adalah daftar program keahlian yang tersedia di SMK Muhammadiyah 15 Jakarta.
          </p>
        </div>

        <a href="<?php echo base_url('program/tambah'); ?>" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Tambah Program
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
        <?php if (!empty($program)): ?>
          <?php foreach ($program as $row): ?>
            <div class="col-xxl-3 col-xl-4 col-md-6">
              <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row->nama_program; ?></h5>
                  <p class="card-text"><?php echo character_limiter($row->deskripsi_program, 100); ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo base_url('program/detail/'.$row->id_program); ?>" class="btn btn-sm btn-outline-primary">
                      <i class="bi bi-eye"></i> Detail
                    </a>
                    <a href="<?php echo base_url('program/edit/'.$row->id_program); ?>" class="btn btn-sm btn-outline-warning">
                      <i class="bi bi-pencil"></i> Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-info text-center">
              <i class="bi bi-info-circle"></i> Belum ada data program yang tersedia.
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
