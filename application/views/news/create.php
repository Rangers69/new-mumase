<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow border-0 rounded-4">
                
                <!-- Header -->
                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold">
                            <i class="bi bi-newspaper me-2"></i> Tambah News
                        </h3>

                        <a href="<?php echo base_url('news'); ?>" class="btn btn-light btn-sm px-3">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <?php echo validation_errors('<div class="alert alert-danger rounded-3">', '</div>'); ?>

                    <form action="<?php echo base_url('news/store'); ?>" method="post">

                        <div class="row g-4">

                            <!-- Kategori -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>">
                                            <?php echo $category->name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>

                            <!-- Judul -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Judul</label>
                                <input type="text" name="title" class="form-control"
                                    value="<?php echo set_value('title'); ?>" required>
                            </div>

                            <!-- Slug -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Slug</label>
                                <input type="text" name="slug" class="form-control"
                                    value="<?php echo set_value('slug'); ?>" required>
                            </div>

                            <!-- Thumbnail -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Thumbnail</label>
                                <input type="text" name="thumbnail" class="form-control"
                                    placeholder="contoh: news/prestasi.jpg"
                                    value="<?php echo set_value('thumbnail'); ?>">
                            </div>

                            <!-- Short Desc -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Short Description</label>
                                <textarea name="short_description" rows="3"
                                    class="form-control"><?php echo set_value('short_description'); ?></textarea>
                            </div>

                            <!-- Content -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Content</label>
                                <textarea name="content" id="editor"
                                    class="form-control"><?php echo set_value('content'); ?></textarea>
                            </div>

                            <!-- Author -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Author</label>
                                <input type="text" name="author" class="form-control bg-light"
                                    value="<?php echo $user['username']; ?>" readonly>
                            </div>

                            <!-- Publish -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Published At</label>
                                <input type="datetime-local" name="published_at"
                                    class="form-control"
                                    value="<?php echo set_value('published_at'); ?>">
                            </div>

                            <!-- Submit -->
                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-success px-4 py-2">
                                    <i class="bi bi-save"></i> Simpan News
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

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
</style>