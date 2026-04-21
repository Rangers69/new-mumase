<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Edit News</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item">Master Data</li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('news'); ?>">News</a></li>
      <li class="breadcrumb-item active">Edit</li>
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
          <h5 class="card-title mb-1">Edit News</h5>
          <p class="text-muted mb-0">Perbarui data news di bawah.</p>
        </div>
        <div class="d-flex gap-2">
          <a href="<?php echo base_url('news/detail/' . $news->id); ?>" class="btn btn-info">
            <i class="bi bi-eye me-1"></i> Lihat
          </a>
          <a href="<?php echo base_url('news'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
          </a>
        </div>
      </div>

      <?php echo validation_errors('<div class="alert alert-danger rounded-3">', '</div>'); ?>

      <form action="<?php echo base_url('news/update/' . $news->id); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $news->id; ?>">

        <div class="row g-4">

          <!-- Kategori -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="category_id" class="form-select" required>
              <option value="">-- Pilih Kategori --</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php echo ($news->category_id == $category->id) ? 'selected' : ''; ?>>
                  <?php echo $category->name; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Status -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select" required>
              <option value="published" <?php echo ($news->status == 'published') ? 'selected' : ''; ?>>Published</option>
              <option value="draft" <?php echo ($news->status == 'draft') ? 'selected' : ''; ?>>Draft</option>
            </select>
          </div>

          <!-- Judul -->
          <div class="col-md-12">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control"
              value="<?php echo $news->title; ?>" required>
          </div>

          <!-- Slug -->
          <div class="col-md-12">
            <label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control"
              value="<?php echo $news->slug; ?>" required>
          </div>

          <!-- Thumbnail -->
          <div class="col-md-12">
            <label class="form-label fw-semibold">Thumbnail</label>
            <div class="mb-3">
              <div class="thumbnail-preview" id="thumbnail-preview">
                <?php if (!empty($news->thumbnail)): ?>
                  <img src="<?php echo base_url('assets/img/berita/' . $news->thumbnail); ?>" 
                       alt="Current thumbnail" 
                       class="img-thumbnail-preview">
                <?php else: ?>
                  <div class="no-thumbnail">
                    <i class="bi bi-image"></i>
                    <span>Belum ada thumbnail</span>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="input-group">
              <input type="file" name="thumbnail" id="thumbnail" class="form-control" 
                     accept="image/*" 
                     onchange="previewThumbnail(event)">
              <input type="hidden" name="thumbnail_path" id="thumbnail_path" 
                     value="<?php echo $news->thumbnail; ?>">
              <div class="form-text text-muted">
                <small>Format: JPG, PNG, GIF. Maksimal: 2MB</small>
              </div>
            </div>
          </div>

          <!-- Short Desc -->
          <div class="col-md-12">
            <label class="form-label fw-semibold">Short Description</label>
            <textarea name="short_description" rows="3"
              class="form-control"><?php echo $news->short_description; ?></textarea>
          </div>

          <!-- Content -->
          <div class="col-md-12">
            <label class="form-label fw-semibold">Content</label>
            <textarea name="content" id="editor"
              class="form-control"><?php echo $news->content; ?></textarea>
          </div>

          <!-- Author -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Author</label>
            <input type="text" name="author" class="form-control bg-light"
              value="<?php echo $news->author ?: $user['username']; ?>" readonly>
          </div>

          <!-- Publish -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Published At</label>
            <input type="datetime-local" name="published_at"
              class="form-control"
              value="<?php echo $news->published_at; ?>">
          </div>

          <!-- Submit -->
          <div class="col-md-12 text-end mt-3">
            <button type="submit" class="btn btn-success px-4 py-2">
              <i class="bi bi-save"></i> Update News
            </button>
          </div>

        </div>

      </form>

      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

// Thumbnail preview functionality
function previewThumbnail(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('thumbnail-preview');
    const hiddenInput = document.getElementById('thumbnail_path');
    
    if (file) {
        // Check file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            alert('File tidak valid! Hanya boleh upload: JPG, PNG, GIF');
            event.target.value = '';
            return;
        }
        
        // Check file size (2MB max)
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
        if (file.size > maxSize) {
            alert('File terlalu besar! Maksimal ukuran: 2MB');
            event.target.value = '';
            return;
        }
        
        // Preview image
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" 
                     alt="Thumbnail preview" 
                     class="img-thumbnail-preview">
            `;
            // Update hidden input with filename
            hiddenInput.value = file.name;
        };
        reader.readAsDataURL(file);
    } else {
        // Clear preview if no file selected
        preview.innerHTML = `
            <div class="no-thumbnail">
                <i class="bi bi-image"></i>
                <span>Belum ada thumbnail</span>
            </div>
        `;
        hiddenInput.value = '';
    }
}

// Initialize preview on page load
document.addEventListener('DOMContentLoaded', function() {
    const thumbnailInput = document.getElementById('thumbnail');
    if (thumbnailInput && thumbnailInput.value) {
        // Trigger change event if there's already a value
        const event = new Event('change', { bubbles: true });
        thumbnailInput.dispatchEvent(event);
    }
});
</script>

<style>
.card {
  overflow: hidden;
}

.form-control,
.form-select {
  border-radius: 10px;
  padding: 10px 14px;
}

.form-control:focus,
.form-select:focus {
  box-shadow: 0 0 0 0.2rem rgba(13,110,253,.15);
}

.ck-editor__editable {
  min-height: 300px;
}

.btn {
  border-radius: 10px;
}

/* Thumbnail Upload Styles */
.thumbnail-preview {
    width: 100%;
    height: 200px;
    border: 2px dashed #ddd;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    overflow: hidden;
    margin-bottom: 15px;
}

.img-thumbnail-preview {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.no-thumbnail {
    text-align: center;
    color: #6c757d;
    padding: 40px 20px;
}

.no-thumbnail i {
    font-size: 3rem;
    color: #dee2e6;
    margin-bottom: 10px;
}

.no-thumbnail span {
    display: block;
    font-size: 0.9rem;
    margin-top: 5px;
}

.input-group {
    position: relative;
}

.input-group input[type="file"] {
    padding-right: 120px; /* Space for file info */
}

.form-text {
    font-size: 0.85rem;
    color: #6c757d;
    margin-top: 5px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .thumbnail-preview {
        height: 150px;
    }
}
</style>
