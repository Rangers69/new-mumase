<!-- ======= Page Title ======= -->
<section id="page-title" class="page-title">
  <div class="container">
    <h1>Data Guru</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="breadcrumb-item active">Guru</li>
      </ol>
    </nav>
  </div>
</section>
<!-- End Page Title -->

<section id="guru" class="guru section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-header">
          <h2 class="section-title">Tenaga Pengajar</h2>
          <p class="section-description">
            Berikut adalah daftar tenaga pengajar profesional yang siap membimbing siswa meraih kesuksesan di SMK Muhammadiyah 15 Jakarta.
          </p>
        </div>
      </div>
    </div>

    <div class="row g-4">
      <?php if (!empty($guru)): ?>
        <?php foreach ($guru as $row): ?>
          <div class="col-lg-3 col-md-6">
            <div class="team-member text-center">
              <div class="member-img">
                <img 
                  src="<?php echo base_url('assets/img/guru/' . (!empty($row->foto_guru) ? $row->foto_guru : 'default.jpg')); ?>" 
                  alt="<?php echo $row->nama_guru; ?>" 
                  class="img-fluid rounded-circle"
                  style="width: 200px; height: 200px; object-fit: cover; border: 4px solid #f8f9fa;"
                >
              </div>
              <div class="member-info">
                <h4><?php echo $row->nama_guru; ?></h4>
                <span><?php echo $row->nama_mapel; ?></span>
                <div class="social">
                  <?php if (!empty($row->email)): ?>
                    <a href="mailto:<?php echo $row->email; ?>" title="Email">
                      <i class="bi bi-envelope"></i>
                    </a>
                  <?php endif; ?>
                  <?php if (!empty($row->telepon)): ?>
                    <a href="tel:<?php echo $row->telepon; ?>" title="Telepon">
                      <i class="bi bi-telephone"></i>
                    </a>
                  <?php endif; ?>
                </div>
                <?php if (!empty($row->pendidikan)): ?>
                  <p class="mt-2 small text-muted">
                    <strong>Pendidikan:</strong> <?php echo $row->pendidikan; ?>
                  </p>
                <?php endif; ?>
                <?php if (!empty($row->hobi)): ?>
                  <p class="small text-muted">
                    <strong>Hobi:</strong> <?php echo $row->hobi; ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> 
            <strong>Informasi:</strong> Data guru sedang dalam proses pembaruan.
          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php if (!empty($guru)): ?>
      <div class="row mt-5">
        <div class="col-12">
          <div class="text-center">
            <div class="stats-box">
              <h3>Total Guru</h3>
              <div class="stats-number"><?php echo count($guru); ?></div>
              <p class="stats-label">Tenaga Pengajar Profesional</p>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<style>
/* Page Title Styles */
#page-title {
  padding: 80px 0 40px 0;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  margin-bottom: 0;
}

#page-title h1 {
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 10px;
}

#page-title .breadcrumb {
  background: none;
  padding: 0;
  margin: 0;
}

#page-title .breadcrumb-item a {
  color: rgba(255,255,255,0.8);
  text-decoration: none;
}

#page-title .breadcrumb-item a:hover {
  color: white;
}

#page-title .breadcrumb-item.active {
  color: rgba(255,255,255,0.9);
}

/* Section Styles */
.section-header {
  text-align: center;
  margin-bottom: 50px;
}

.section-title {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 15px;
  color: #2c3e50;
}

.section-description {
  font-size: 16px;
  color: #6c757d;
  max-width: 700px;
  margin: 0 auto;
}

/* Team Member Card Styles */
.team-member {
  margin-bottom: 30px;
  transition: transform 0.3s ease;
  background: white;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  border: 1px solid #f0f0f0;
}

.team-member:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.member-img {
  position: relative;
  overflow: hidden;
  margin-bottom: 20px;
  border-radius: 50%;
  width: 200px;
  height: 200px;
  margin-left: auto;
  margin-right: auto;
  border: 4px solid #f8f9fa;
}

.member-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50%;
}

.member-info h4 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #2c3e50;
}

.member-info span {
  display: block;
  color: #ff3d07;
  font-weight: 500;
  margin-bottom: 15px;
  font-size: 14px;
  font-style: bold;
}

.member-info .social {
  margin-bottom: 15px;
}

.member-info .social a {
  display: inline-block;
  width: 32px;
  height: 32px;
  line-height: 32px;
  text-align: center;
  background: #f8f9fa;
  border-radius: 50%;
  color: #2c3e50;
  margin: 0 3px;
  transition: all 0.3s ease;
  text-decoration: none;
}

.member-info .social a:hover {
  background: #e74c3c;
  color: white;
  transform: scale(1.1);
  text-decoration: none;
}

.member-info .social i {
  font-size: 14px;
}

/* Stats Box Styles */
.stats-box {
  display: inline-block;
  padding: 30px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 15px;
  color: white;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  text-align: center;
  min-width: 250px;
}

.stats-box h3 {
  font-size: 18px;
  margin-bottom: 10px;
  opacity: 0.9;
  font-weight: 500;
}

.stats-number {
  font-size: 48px;
  font-weight: 700;
  margin-bottom: 5px;
  line-height: 1;
}

.stats-label {
  margin: 0;
  opacity: 0.9;
  font-size: 14px;
}

/* Alert Styles */
.alert {
  border-radius: 10px;
  border: none;
  padding: 20px;
}

.alert-info {
  background-color: #d1ecf1;
  color: #0c5460;
}

/* Responsive Design */
@media (max-width: 768px) {
  .team-member {
    margin-bottom: 20px;
    padding: 20px;
  }
  
  .member-img {
    width: 150px;
    height: 150px;
  }
  
  .section-title {
    font-size: 28px;
  }
  
  .stats-box {
    padding: 20px;
    min-width: 200px;
  }
  
  .stats-number {
    font-size: 36px;
  }
}

@media (max-width: 576px) {
  #page-title {
    padding: 60px 0 30px 0;
  }
  
  #page-title h1 {
    font-size: 28px;
  }
  
  .section-title {
    font-size: 24px;
  }
  
  .team-member {
    padding: 15px;
  }
  
  .member-img {
    width: 120px;
    height: 120px;
  }
}
</style>