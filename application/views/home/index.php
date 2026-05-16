<!-- Hero Section -->
<div class="hero-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang</h1>
        <p class="lead mb-0">Website Resmi RT 9 Desa Sambiroto</p>
    </div>
</div>

<!-- Artikel Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center"><i class="fas fa-newspaper"></i> Artikel Terbaru</h2>
        <div class="row">
            <?php foreach ($artikel as $art): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        <img src="<?php echo base_url('uploads/artikel/' . $art->gambar); ?>" class="card-img-top" alt="<?php echo $art->judul; ?>" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo substr($art->judul, 0, 50); ?>...</h5>
                            <p class="card-text text-muted small">
                                <i class="fas fa-calendar"></i> <?php echo date('d/m/Y', strtotime($art->created_at)); ?>
                            </p>
                            <p class="card-text flex-grow-1"><?php echo substr(strip_tags($art->konten), 0, 100); ?>...</p>
                            <a href="<?php echo base_url('artikel/detail/' . $art->id); ?>" class="btn btn-primary btn-sm mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo base_url('artikel'); ?>" class="btn btn-primary">Lihat Semua Artikel</a>
        </div>
    </div>
</section>

<!-- Galeri Section -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center"><i class="fas fa-images"></i> Galeri Foto</h2>
        <div class="row">
            <?php foreach ($galeri as $foto): ?>
                <div class="col-md-4 col-lg-2 mb-3">
                    <div class="overflow-hidden rounded" style="height: 200px;">
                        <img src="<?php echo base_url('uploads/galeri/' . $foto->gambar); ?>" alt="<?php echo $foto->judul; ?>" class="img-fluid w-100 h-100" style="object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galeriModal" onclick="showGaleri('<?php echo base_url('uploads/galeri/' . $foto->gambar); ?>', '<?php echo $foto->judul; ?>')">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo base_url('galeri'); ?>" class="btn btn-primary">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

<!-- Modal Galeri -->
<div class="modal fade" id="galeriModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galeriTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="galeriImage" src="" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Info Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center"><i class="fas fa-info-circle"></i> Informasi Penting</h2>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h4 class="text-primary mb-3"><i class="fas fa-users fa-2x"></i></h4>
                        <h5>Data Penduduk</h5>
                        <p class="text-muted mb-0">Lihat data penduduk RT 9 secara lengkap</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo base_url('penduduk'); ?>" class="btn btn-sm btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h4 class="text-success mb-3"><i class="fas fa-money-bill-wave fa-2x"></i></h4>
                        <h5>Laporan Keuangan</h5>
                        <p class="text-muted mb-0">Transparansi keuangan kas RT 9</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo base_url('keuangan'); ?>" class="btn btn-sm btn-success">Lihat Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h4 class="text-info mb-3"><i class="fas fa-newspaper fa-2x"></i></h4>
                        <h5>Berita Terbaru</h5>
                        <p class="text-muted mb-0">Informasi dan pengumuman terkini</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo base_url('artikel'); ?>" class="btn btn-sm btn-info">Baca Artikel</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h4 class="text-warning mb-3"><i class="fas fa-camera fa-2x"></i></h4>
                        <h5>Dokumentasi</h5>
                        <p class="text-muted mb-0">Koleksi foto kegiatan RT 9</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo base_url('galeri'); ?>" class="btn btn-sm btn-warning">Lihat Galeri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showGaleri(image, title) {
        document.getElementById('galeriImage').src = image;
        document.getElementById('galeriTitle').textContent = title;
    }
</script>