<!-- ======= Page Title ======= -->
<div class="pagetitle container mt-5">
  <h1>Berita</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Beranda</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('news'); ?>">Berita</a></li>
      <li class="breadcrumb-item active"><?php echo htmlspecialchars($news->title); ?></li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- Blog Detail -->
        <article class="blog-details" data-aos="fade-up">

          <div class="post-img">
            <?php if (!empty($news->thumbnail)): ?>
              <img src="<?php echo base_url('assets/img/' . $news->thumbnail); ?>" alt="" class="img-fluid">
            <?php else: ?>
              <img src="<?php echo base_url('assets/img/blog-placeholder.jpg'); ?>" alt="" class="img-fluid">
            <?php endif; ?>
          </div>

          <h2 class="title"><?php echo htmlspecialchars($news->title); ?></h2>

          <div class="meta-top">
            <ul>
              <li class="d-flex align-items-center">
                <span class="badge bg-primary me-2"><?php echo htmlspecialchars($news->category_name); ?></span>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-person"></i>
                <span><?php echo htmlspecialchars($news->author); ?></span>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-calendar"></i>
                <time datetime="<?php echo date('Y-m-d', strtotime($news->published_at)); ?>">
                  <?php echo date('d F Y', strtotime($news->published_at)); ?>
                </time>
              </li>
            </ul>
          </div>

          <div class="content">
            <?php echo $news->content; ?>
          </div>

          <div class="meta-bottom">
            <div class="d-flex justify-content-between align-items-center">
              <div class="social-share">
                <span class="me-3">Bagikan:</span>
                <a href="#" onclick="shareOnFacebook(); return false;" class="social-icon facebook">
                  <i class="bi bi-facebook"></i>
                </a>
                <a href="#" onclick="shareOnTwitter(); return false;" class="social-icon twitter">
                  <i class="bi bi-twitter"></i>
                </a>
                <a href="#" onclick="shareOnWhatsApp(); return false;" class="social-icon whatsapp">
                  <i class="bi bi-whatsapp"></i>
                </a>
                <a href="#" onclick="copyLink(); return false;" class="social-icon link">
                  <i class="bi bi-link-45deg"></i>
                </a>
              </div>
              <div class="back-to-news">
                <a href="<?php echo base_url('');?>#news" class="btn btn-outline-primary">
                  <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                </a>
              </div>
            </div>
          </div>

        </article>
        <!-- End Blog Detail -->

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
                    <a href="<?php echo base_url('news?filter_category=' . urlencode($category->slug)); ?>">
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
                  <img src="<?php echo !empty($recent->thumbnail) ? base_url('assets/img/' . $recent->thumbnail) : base_url('assets/img/blog-placeholder.jpg'); ?>" alt="" class="img-fluid">
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
.blog-details {
  background: white;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  margin-bottom: 30px;
}

.post-img {
  margin-bottom: 30px;
  border-radius: 10px;
  overflow: hidden;
}

.post-img img {
  width: 100%;
  height: auto;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.post-img:hover img {
  transform: scale(1.05);
}

.title {
  font-size: 2rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 20px;
  line-height: 1.3;
}

.meta-top ul {
  list-style: none;
  padding: 0;
  margin: 0 0 30px 0;
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.meta-top ul li {
  display: flex;
  align-items: center;
  color: #6c757d;
  font-size: 0.9rem;
}

.meta-top ul li i {
  margin-right: 5px;
}

.content {
  margin-bottom: 30px;
  line-height: 1.8;
  color: #333;
}

.content img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  margin: 20px 0;
}

.content h1, .content h2, .content h3, .content h4, .content h5, .content h6 {
  color: #2c3e50;
  margin-top: 30px;
  margin-bottom: 15px;
}

.content p {
  margin-bottom: 20px;
}

.content ul, .content ol {
  margin-bottom: 20px;
  padding-left: 20px;
}

.content blockquote {
  border-left: 4px solid #007bff;
  padding-left: 20px;
  margin: 20px 0;
  font-style: italic;
  color: #6c757d;
}

.meta-bottom {
  border-top: 1px solid #e9ecef;
  padding-top: 20px;
}

.social-share {
  display: flex;
  align-items: center;
}

.social-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  margin-right: 10px;
  color: white;
  text-decoration: none;
  transition: all 0.3s ease;
}

.social-icon.facebook {
  background: #3b5998;
}

.social-icon.twitter {
  background: #1da1f2;
}

.social-icon.whatsapp {
  background: #25d366;
}

.social-icon.link {
  background: #6c757d;
}

.social-icon:hover {
  transform: translateY(-2px);
  color: white;
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

@media (max-width: 768px) {
  .blog-details {
    padding: 20px;
  }
  
  .title {
    font-size: 1.5rem;
  }
  
  .meta-top ul {
    flex-direction: column;
    gap: 10px;
  }
  
  .social-share {
    margin-bottom: 15px;
  }
  
  .meta-bottom .d-flex {
    flex-direction: column;
    align-items: flex-start !important;
  }
  
  .recent-posts .post-item img {
    width: 60px;
    height: 60px;
  }
}
</style>

<!-- JavaScript -->
<script>
function shareOnFacebook() {
  var url = encodeURIComponent(window.location.href);
  var title = encodeURIComponent(document.title);
  window.open('https://www.facebook.com/sharer/sharer.php?u=' + url + '&t=' + title, '_blank', 'width=600,height=400');
}

function shareOnTwitter() {
  var url = encodeURIComponent(window.location.href);
  var title = encodeURIComponent(document.title);
  window.open('https://twitter.com/intent/tweet?url=' + url + '&text=' + title, '_blank', 'width=600,height=400');
}

function shareOnWhatsApp() {
  var url = encodeURIComponent(window.location.href);
  var title = encodeURIComponent(document.title);
  window.open('https://wa.me/?text=' + title + ' ' + url, '_blank');
}

function copyLink() {
  navigator.clipboard.writeText(window.location.href).then(function() {
    alert('Link berhasil disalin!');
  }).catch(function() {
    // Fallback for older browsers
    var textArea = document.createElement("textarea");
    textArea.value = window.location.href;
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
      document.execCommand('copy');
      alert('Link berhasil disalin!');
    } catch (err) {
      alert('Gagal menyalin link. Silakan salin secara manual.');
    }
    document.body.removeChild(textArea);
  });
}
</script>
