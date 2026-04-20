<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Detail News</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('news'); ?>">News</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">

      <?php if (empty($news)): ?>
        <div class="text-center py-5">
          <i class="bi bi-exclamation-triangle text-warning fs-1 d-block mb-3"></i>
          <h5>Data Tidak Ditemukan</h5>
          <p class="text-muted">Data news yang Anda cari tidak ditemukan.</p>
          <a href="<?php echo base_url('news'); ?>" class="btn btn-primary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
          </a>
        </div>
      <?php else: ?>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Detail News</h5>
          <p class="text-muted mb-0">Informasi lengkap berita.</p>
        </div>
        <div class="d-flex gap-2">
          <a href="<?php echo base_url('news/edit/' . $news->id); ?>" class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit
          </a>
          <a href="<?php echo base_url('news'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
              <h6 class="mb-0">
                <i class="bi bi-newspaper me-2"></i> Informasi News
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-borderless">
                <tr>
                  <th width="150">Thumbnail</th>
                  <td>
                    <?php if (!empty($news->thumbnail)): ?>
                      <img src="<?php echo base_url('assets/img/' . $news->thumbnail); ?>" alt="Thumbnail" class="img-fluid rounded" style="max-width: 200px;">
                    <?php else: ?>
                      <span class="text-muted">Tidak ada thumbnail</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th>Kategori</th>
                  <td>
                    <span class="badge bg-secondary">
                      <?php echo $news->category_name ?? '-'; ?>
                    </span>
                  </td>
                </tr>
                <tr>
                  <th>Judul</th>
                  <td>
                    <h5 class="fw-bold"><?php echo $news->title; ?></h5>
                  </td>
                </tr>
                <tr>
                  <th>Slug</th>
                  <td>
                    <code><?php echo $news->slug; ?></code>
                  </td>
                </tr>
                <tr>
                  <th>Author</th>
                  <td>
                    <?php echo $news->author ?? '-'; ?>
                  </td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    <?php if ($news->status == 'published'): ?>
                      <span class="badge bg-success">Published</span>
                    <?php else: ?>
                      <span class="badge bg-secondary">Draft</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <th>Published At</th>
                  <td>
                    <?php echo !empty($news->published_at) ? date('d F Y H:i', strtotime($news->published_at)) : '-'; ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-info text-white">
              <h6 class="mb-0">
                <i class="bi bi-file-text me-2"></i> Konten
              </h6>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <h6 class="fw-semibold">Short Description</h6>
                <p class="text-muted small">
                  <?php echo !empty($news->short_description) ? $news->short_description : '-'; ?>
                </p>
              </div>
              
              <div>
                <h6 class="fw-semibold mb-3">Full Content</h6>
                <div class="content-preview">
                  <?php echo $news->content; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php endif; ?>
    </div>
  </div>
</section>

<style>
.img-fluid {
  max-width: 100%;
  height: auto;
}

.content-preview {
  max-height: 400px;
  overflow-y: auto;
  padding: 15px;
  background-color: #f8f9fa;
  border-radius: 8px;
  border: 1px solid #e9ecef;
}

.content-preview p {
  margin-bottom: 1rem;
}

.content-preview p:last-child {
  margin-bottom: 0;
}
</style>