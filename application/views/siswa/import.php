<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Import Data Siswa</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('SiswaController'); ?>">Siswa</a></li>
      <li class="breadcrumb-item active">Import</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Import Data Siswa dari CSV</h5>
          <p class="text-muted mb-0">
            Upload file CSV untuk menambahkan data siswa secara massal.
          </p>
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

      <!-- Instructions -->
      <div class="alert alert-info">
        <h6><i class="bi bi-info-circle me-2"></i>Petunjuk Import Data:</h6>
        <ol class="mb-0">
          <li>Download template Excel yang telah disediakan</li>
          <li>Isi data siswa sesuai format kolom yang tersedia</li>
          <li>Pastikan semua field wajib diisi (ditandai dengan *)</li>
          <li>Upload file Excel yang telah diisi</li>
          <li>System akan memvalidasi dan mengimport data secara otomatis</li>
        </ol>
      </div>

      <!-- Download Template -->
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card border-primary">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="card-title mb-1">
                    <i class="bi bi-download me-2"></i>Template Import Data Siswa
                  </h6>
                  <p class="text-muted mb-0">
                    Download template CSV untuk format import data yang benar.
                  </p>
                </div>
                <a href="<?php echo base_url('SiswaController/download_template'); ?>" class="btn btn-primary">
                  <i class="bi bi-download me-1"></i> Download Template
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Upload Form -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-success text-white">
              <h6 class="mb-0">
                <i class="bi bi-upload me-2"></i>Upload File CSV
              </h6>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('SiswaController/proses_import'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <label for="excel_file" class="form-label">
                        Pilih File CSV <span class="text-danger">*</span>
                      </label>
                      <input type="file" class="form-control" name="excel_file" id="excel_file" 
                             accept=".csv" required>
                      <div class="form-text">
                        Format file yang diizinkan: .csv (Maksimal 5MB)
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">
                      <i class="bi bi-upload me-1"></i> Import Data
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Format Kolom -->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-secondary text-white">
              <h6 class="mb-0">
                <i class="bi bi-table me-2"></i>Format Kolom CSV
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm">
                  <thead class="table-light">
                    <tr>
                      <th>Kolom</th>
                      <th>Nama Field</th>
                      <th>Tipe Data</th>
                      <th>Wajib</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>A</td>
                      <td>nama_siswa</td>
                      <td>Text</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Nama lengkap siswa</td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>nis</td>
                      <td>Number</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Nomor Induk Siswa (unik)</td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>nisn</td>
                      <td>Number</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>NISN (unik, 10 digit)</td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>tempat_lahir</td>
                      <td>Text</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Tempat lahir</td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>tanggal_lahir</td>
                      <td>Date</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Format: YYYY-MM-DD</td>
                    </tr>
                    <tr>
                      <td>F</td>
                      <td>jenis_kelamin</td>
                      <td>Text</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Laki-laki/Perempuan</td>
                    </tr>
                    <tr>
                      <td>G</td>
                      <td>alamat</td>
                      <td>Text</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Alamat lengkap</td>
                    </tr>
                    <tr>
                      <td>H</td>
                      <td>no_hp</td>
                      <td>Number</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Nomor HP</td>
                    </tr>
                    <tr>
                      <td>I</td>
                      <td>email</td>
                      <td>Email</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Email siswa (unik)</td>
                    </tr>
                    <tr>
                      <td>J</td>
                      <td>id_kelas</td>
                      <td>Number</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>ID kelas (sesuai tb_kelas)</td>
                    </tr>
                    <tr>
                      <td>K</td>
                      <td>jurusan</td>
                      <td>Text</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Rekayasa Perangkat Lunak/Desain Komunikasi Visual</td>
                    </tr>
                    <tr>
                      <td>L</td>
                      <td>tahun_masuk</td>
                      <td>Number</td>
                      <td><span class="badge bg-danger">Ya</span></td>
                      <td>Tahun masuk (4 digit)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="d-flex justify-content-start gap-2 mt-4">
        <a href="<?php echo base_url('siswa'); ?>" class="btn btn-secondary">
          <i class="bi bi-arrow-left me-1"></i>
          Kembali ke Daftar Siswa
        </a>
      </div>
    </div>
  </div>
</section>
