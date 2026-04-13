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
        <!-- Statistics Cards -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title">Total Siswa</h6>
                            <span class="text-success small pt-1 fw-bold"><?php echo $stats['students']['growth']; ?>%</span>
                            <span class="text-muted small pt-2 ps-1"><?php echo $stats['students']['keterangan']; ?></span>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-3">
                        <h3><?php echo number_format($stats['students']['total']); ?></h3>
                        <span class="text-muted small">Tahun lalu: <?php echo number_format($stats['students']['last_year']); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title">Total Guru</h6>
                            <span class="text-success small pt-1 fw-bold"><?php echo $stats['teachers']['growth']; ?>%</span>
                            <span class="text-muted small pt-2 ps-1"><?php echo $stats['teachers']['keterangan']; ?></span>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-3">
                        <h3><?php echo number_format($stats['teachers']['total']); ?></h3>
                        <span class="text-muted small">Tahun lalu: <?php echo number_format($stats['teachers']['last_year']); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title">Total Kelas</h6>
                            <span class="text-success small pt-1 fw-bold"><?php echo $stats['classes']['growth']; ?>%</span>
                            <span class="text-muted small pt-2 ps-1"><?php echo $stats['classes']['keterangan']; ?></span>
                        </div>
                        <div class="icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-3">
                        <h3><?php echo number_format($stats['classes']['total']); ?></h3>
                        <span class="text-muted small">Tahun lalu: <?php echo number_format($stats['classes']['last_year']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

<style>
.info-card {
    border-left: 4px solid #0d6efd;
    transition: transform 0.2s;
}

.info-card:hover {
    transform: translateY(-2px);
}

.info-card .icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
}

.revenue-card {
    border-left-color: #0d6efd;
}

.revenue-card .icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.customers-card {
    border-left-color: #198754;
}

.customers-card .icon {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.sales-card {
    border-left-color: #ffc107;
}

.sales-card .icon {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

.info-card h3 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
}

.info-card .card-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6c757d;
    margin-bottom: 0.25rem;
}
</style>
