<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail Sarana Prasarana</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('sarpras'); ?>">Sarana Prasarana</a></li>
      <li class="breadcrumb-item active"><?php echo $sarpras->nama_sarpras; ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      
      <div class="row">
        <div class="col-lg-8">
          <h4 class="card-title mb-3">Detail Sarana Prasarana: <?php echo $sarpras->nama_sarpras; ?></h4>
          
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                  <h5 class="card-title text-primary"><?php echo $sarpras->foto_sarpras ? '<img src="'.base_url('assets/img/sarpras/'.$sarpras->foto_sarpras).'" class="img-fluid" style="max-height: 200px;">' : 'Tidak ada foto'; ?></h5>
                  <p class="card-text">Foto</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                  <h5 class="card-title text-info"><?php echo $sarpras->kategori_sarpras; ?></h5>
                  <p class="card-text">Kategori</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div>
          
          <div class="mt-4">
            <a href="<?php echo base_url('sarpras/edit/'.$sarpras->id_sarpras); ?>" class="btn btn-warning">
              <i class="bi bi-pencil"></i> Edit Sarana Prasarana
            </a>
            <a href="<?php echo base_url('sarpras'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Informasi Sarana Prasarana</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>ID</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $sarpras->id_sarpras; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Nama</span>
                  <strong><?php echo $sarpras->nama_sarpras; ?></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Kategori</span>
                  <strong><?php echo $sarpras->kategori_sarpras; ?></strong>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
      
    </div>
  </div>
</section>
