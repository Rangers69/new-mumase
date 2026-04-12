<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <!-- Welcome Card -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang!</h5>
                    <p>
                        <?php if (isset($user['username'])): ?>
                            Halo, <strong><?php echo $user['username']; ?></strong>!
                        <?php else: ?>
                            Halo, <strong>Administrator</strong>!
                        <?php endif; ?>
                    </p>
                    <p>Anda telah berhasil masuk ke sistem administrasi SMK Muhammadiyah 15 Jakarta.</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aksi Cepat</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h6 class="card-title">Data Guru</h6>
                                    <p>Kelola data guru</p>
                                    <a href="<?php echo base_url('guru'); ?>" class="btn btn-sm btn-light">
                                        <i class="bi bi-people"></i> Kelola
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h6 class="card-title">Siswa</h6>
                                    <p>Kelola data siswa</p>
                                    <a href="#" class="btn btn-sm btn-light">
                                        <i class="bi bi-mortarboard"></i> Kelola
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h6 class="card-title">Laporan</h6>
                                    <p>Lihat laporan</p>
                                    <a href="#" class="btn btn-sm btn-light">
                                        <i class="bi bi-file-text"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Info -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Sistem</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
                            <p><strong>CodeIgniter Version:</strong> 3.x</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Database Status:</strong> <span class="badge bg-success">Connected</span></p>
                            <p><strong>Last Login:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
