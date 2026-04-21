<!-- ======= Page Title ======= -->
<div class="pagetitle container mt-5">
  <h1>Berita</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li class="breadcrumb-item active">Berita</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- Blog Posts -->
        <div class="blog-posts" data-aos="fade-up">

          <div class="section-header mb-4">
            <h2>Semua Berita</h2>
            <p>
              Informasi terbaru seputar kegiatan sekolah, prestasi siswa,
              pengumuman, dan berita penting lainnya dari
              SMK Muhammadiyah 15 Jakarta.
            </p>
          </div>

          <!-- Filter Section -->
            <div class="container mb-4">
              <form action="<?php echo base_url('news/list'); ?>" method="get">
                  <div class="row g-3">

                      <!-- Kategori -->
                      <div class="col-md-4">
                          <label for="filter_category" class="form-label">Kategori</label>
                          <select name="filter_category" id="filter_category" class="form-select">
                              <option value="">Semua Kategori</option>

                              <?php foreach ($categories as $category): ?>
                                  <option
                                      value="<?php echo $category->slug; ?>"
                                      <?php echo ($this->input->get('filter_category') == $category->slug) ? 'selected' : ''; ?>>
                                      <?php echo $category->name; ?>
                                  </option>
                              <?php endforeach; ?>

                          </select>
                      </div>

                      <!-- Search -->
                      <div class="col-md-4">
                          <label for="filter_keyword" class="form-label">Cari Berita</label>
                          <input
                              type="text"
                              name="filter_keyword"
                              id="filter_keyword"
                              class="form-control"
                              placeholder="Cari judul atau author..."
                              value="<?php echo html_escape($this->input->get('filter_keyword')); ?>">
                      </div>

                      <!-- Button -->
                      <div class="col-md-4 d-flex align-items-end gap-2">
                          <button type="submit" class="btn btn-primary">
                              <i class="bi bi-search me-1"></i> Filter
                          </button>

                          <a href="<?php echo base_url('news/list'); ?>" class="btn btn-outline-secondary">
                              <i class="bi bi-x-circle me-1"></i> Reset
                          </a>
                      </div>

                  </div>
              </form>
          </div>

          <!-- News List -->
          <div class="row gy-4 posts-list">
            <?php if (!empty($news)): ?>
              <?php foreach ($news as $row): ?>
                <div class="col-xl-6 col-md-6">
                  <article class="news-card">
                    <div class="post-img">
                      <?php if (!empty($row->thumbnail)): ?>
                        <img src="<?php echo base_url('assets/img/berita/' . $row->thumbnail); ?>" alt="<?php echo htmlspecialchars($row->title); ?>" class="img-fluid">
                      <?php else: ?>
                        <img src="<?php echo base_url('assets/img/blog-placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($row->title); ?>" class="img-fluid">
                      <?php endif; ?>
                    </div>

                    <div class="post-content">
                      <div class="post-category">
                        <span class="category-badge"><?php echo $row->category_name ?? 'News'; ?></span>
                      </div>

                      <h3 class="title">
                        <a href="<?php echo base_url('news/detail/' . $row->slug); ?>">
                          <?php echo htmlspecialchars($row->title); ?>
                        </a>
                      </h3>

                      <div class="post-meta">
                        <div class="meta-item">
                          <i class="bi bi-person"></i>
                          <span><?php echo htmlspecialchars($row->author); ?></span>
                        </div>
                        <div class="meta-item">
                          <i class="bi bi-calendar"></i>
                          <time datetime="<?php echo date('Y-m-d', strtotime($row->published_at)); ?>">
                            <?php echo date('d F Y', strtotime($row->published_at)); ?>
                          </time>
                        </div>
                      </div>

                      <div class="post-excerpt">
                        <p>
                          <?php echo substr(strip_tags($row->short_description), 0, 150); ?>
                          <?php if (strlen(strip_tags($row->short_description)) > 150): ?>...<?php endif; ?>
                        </p>
                      </div>

                      <div class="post-footer">
                        <a href="<?php echo base_url('news/detail/' . $row->slug); ?>" class="btn-read-more">
                          Baca Selengkapnya
                          <i class="bi bi-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </article>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-12 text-center">
                <div class="alert alert-light border">
                  <i class="bi bi-newspaper fs-3 d-block mb-2"></i>
                  <h5>Belum Ada Berita</h5>
                  <p class="text-muted">Belum ada berita yang dapat ditampilkan.</p>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <!-- Pagination -->
          <?php if (!empty($news) && $total_rows > $per_page): ?>
            <div class="blog-pagination mt-5">
              <ul class="justify-content-center">
                <?php echo $this->pagination->create_links(); ?>
              </ul>
            </div>
          <?php endif; ?>

        </div>
        <!-- End Blog Posts -->

      </div>

      <div class="col-lg-4 sidebar">
        <!-- Sidebar -->
        <div class="sidebar" data-aos="fade-up" data-aos-delay="100">

          <!-- Kategori Widget -->
          <div class="sidebar-item categories">
            <h3 class="sidebar-title">Kategori</h3>
            <ul>
              <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                  <li>
                    <a href="<?php echo base_url('news/list?filter_category=' . urlencode($category->slug)); ?>">
                      <?php echo htmlspecialchars($category->name); ?>
                      <span>(<?php echo $category->news_count ?? 0; ?>)</span>
                    </a>
                  </li>
                <?php endforeach; ?>
              <?php else: ?>
                <li>
                  <a href="#">Belum ada kategori</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>

          <!-- Berita Terbaru Widget -->
          <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Berita Terbaru</h3>
            <?php if (!empty($recent_news)): ?>
              <?php foreach ($recent_news as $recent): ?>
                <div class="post-item clearfix">
                  <img src="<?php echo !empty($recent->thumbnail) ? base_url('assets/img/berita/' . $recent->thumbnail) : base_url('assets/img/blog-placeholder.jpg'); ?>" alt="" class="img-fluid">
                  <h4>
                    <a href="<?php echo base_url('news/detail/' . $recent->slug); ?>">
                      <?php echo htmlspecialchars($recent->title); ?>
                    </a>
                  </h4>
                  <time datetime="<?php echo date('Y-m-d', strtotime($recent->published_at)); ?>">
                    <?php echo date('d M Y', strtotime($recent->published_at)); ?>
                  </time>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-muted">Belum ada berita terbaru.</p>
            <?php endif; ?>
          </div>

          <!-- Tags Widget -->
          <div class="sidebar-item tags">
            <h3 class="sidebar-title">Tags</h3>
            <ul class="tag-list">
              <li><a href="#">SMK Muh 15</a></li>
              <li><a href="#">Pendidikan</a></li>
              <li><a href="#">Jakarta</a></li>
              <li><a href="#">Multimedia</a></li>
              <li><a href="#">Bisnis</a></li>
              <li><a href="#">Prestasi</a></li>
            </ul>
          </div>

        </div>
        <!-- End Sidebar -->

      </div>
    </div>
  </div>
</section>

<!-- Styles -->
<style>
.blog-posts {
  background: white;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  margin-bottom: 30px;
}

.section-header h2 {
  font-size: 2rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 10px;
}

.section-header p {
  color: #6c757d;
  font-size: 1rem;
}

.news-card {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.news-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.post-img {
  height: 220px;
  overflow: hidden;
  position: relative;
}

.post-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.news-card:hover .post-img img {
  transform: scale(1.08);
}

.post-content {
  padding: 25px;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.post-category {
  margin-bottom: 15px;
}

.category-badge {
  display: inline-block;
  background: linear-gradient(135deg, #007bff, #6f42c1);
  color: white;
  padding: 6px 16px;
  border-radius: 25px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.title {
  font-size: 1.25rem;
  font-weight: 700;
  line-height: 1.4;
  margin-bottom: 15px;
  color: #2c3e50;
}

.title a {
  color: inherit;
  text-decoration: none;
  transition: color 0.3s ease;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.title a:hover {
  color: #007bff;
}

.post-meta {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
  padding-bottom: 15px;
  border-bottom: 1px solid #f0f0f0;
}

.meta-item {
  display: flex;
  align-items: center;
  color: #6c757d;
  font-size: 0.85rem;
}

.meta-item i {
  margin-right: 6px;
  font-size: 0.9rem;
}

.post-excerpt {
  flex: 1;
  margin-bottom: 20px;
}

.post-excerpt p {
  color: #5a6c7d;
  font-size: 0.9rem;
  line-height: 1.6;
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.post-footer {
  margin-top: auto;
}

.btn-read-more {
  display: inline-flex;
  align-items: center;
  background: linear-gradient(135deg, #007bff, #0056b3);
  color: white;
  padding: 10px 20px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 600;
  font-size: 0.85rem;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-read-more:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,123,255,0.3);
  color: white;
}

.btn-read-more i {
  margin-left: 8px;
  transition: transform 0.3s ease;
}

.btn-read-more:hover i {
  transform: translateX(3px);
}

.sidebar {
  background: white;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  margin-bottom: 30px;
}

.sidebar-item {
  margin-bottom: 30px;
}

.sidebar-item:last-child {
  margin-bottom: 0;
}

.sidebar-title {
  font-size: 1.2rem;
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 2px solid #007bff;
}

.categories ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.categories ul li {
  margin-bottom: 10px;
}

.categories ul li a {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #6c757d;
  text-decoration: none;
  transition: color 0.3s ease;
}

.categories ul li a:hover {
  color: #007bff;
}

.categories ul li a span {
  background: #f8f9fa;
  padding: 2px 8px;
  border-radius: 12px;
  font-size: 0.8rem;
}

.recent-posts .post-item {
  margin-bottom: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e9ecef;
}

.recent-posts .post-item:last-child {
  margin-bottom: 0;
  padding-bottom: 0;
  border-bottom: none;
}

.recent-posts .post-item img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 8px;
  float: left;
  margin-right: 15px;
}

.recent-posts .post-item h4 {
  margin: 0 0 5px 0;
  font-size: 0.95rem;
  line-height: 1.4;
}

.recent-posts .post-item h4 a {
  color: #2c3e50;
  text-decoration: none;
  transition: color 0.3s ease;
}

.recent-posts .post-item h4 a:hover {
  color: #007bff;
}

.recent-posts .post-item time {
  color: #6c757d;
  font-size: 0.8rem;
}

.tag-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.tag-list li a {
  display: inline-block;
  padding: 5px 12px;
  background: #f8f9fa;
  color: #6c757d;
  text-decoration: none;
  border-radius: 15px;
  font-size: 0.85rem;
  transition: all 0.3s ease;
}

.tag-list li a:hover {
  background: #007bff;
  color: white;
}

.blog-pagination {
  margin-top: 30px;
}

.blog-pagination ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 5px;
}

.blog-pagination .pagination li a,
.blog-pagination .pagination li span {
  padding: 8px 12px;
  border: 1px solid #dee2e6;
  border-radius: 5px;
  color: #007bff;
  text-decoration: none;
  transition: all 0.3s ease;
}

.blog-pagination .pagination li a:hover,
.blog-pagination .pagination .active span {
  background: #007bff;
  color: white;
  border-color: #007bff;
}

@media (max-width: 768px) {
  .blog-posts {
    padding: 20px;
  }
  
  .section-header h2 {
    font-size: 1.5rem;
  }
  
  .post-meta {
    flex-direction: column;
    gap: 5px;
  }
  
  .title {
    font-size: 1.1rem;
  }
  
  .recent-posts .post-item img {
    width: 60px;
    height: 60px;
  }
}
</style>
