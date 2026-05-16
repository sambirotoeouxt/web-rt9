<div class="py-5">
    <div class="container">
        <h2 class="mb-4"><i class="fas fa-newspaper"></i> Daftar Artikel</h2>

        <div class="row">
            <?php foreach ($artikel as $art): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        <img src="<?php echo base_url('uploads/artikel/' . $art->gambar); ?>" class="card-img-top" alt="<?php echo $art->judul; ?>" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $art->judul; ?></h5>
                            <p class="card-text text-muted small">
                                <i class="fas fa-calendar"></i> <?php echo date('d/m/Y H:i', strtotime($art->created_at)); ?>
                            </p>
                            <p class="card-text flex-grow-1"><?php echo substr(strip_tags($art->konten), 0, 150); ?>...</p>
                            <a href="<?php echo base_url('artikel/detail/' . $art->id); ?>" class="btn btn-primary btn-sm mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-5">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>