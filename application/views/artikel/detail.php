<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <h1 class="mb-3"><?php echo $artikel->judul; ?></h1>
                    <div class="mb-4 text-muted">
                        <small>
                            <i class="fas fa-calendar"></i> <?php echo date('d F Y H:i', strtotime($artikel->created_at)); ?>
                        </small>
                    </div>
                    <img src="<?php echo base_url('uploads/artikel/' . $artikel->gambar); ?>" alt="<?php echo $artikel->judul; ?>" class="img-fluid mb-4 rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                    <div class="article-content">
                        <?php echo $artikel->konten; ?>
                    </div>
                </article>

                <hr class="my-5">

                <!-- Komentar Section -->
                <section>
                    <h3 class="mb-4"><i class="fas fa-comments"></i> Komentar (<?php echo count($komentar); ?>)</h3>

                    <!-- List Komentar -->
                    <div class="comments-list mb-5">
                        <?php if (count($komentar) > 0): ?>
                            <?php foreach ($komentar as $kmt): ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="card-title mb-1"><?php echo $kmt->nama; ?></h6>
                                                <small class="text-muted">
                                                    <i class="fas fa-envelope"></i> <?php echo $kmt->email; ?>
                                                </small>
                                            </div>
                                            <small class="text-muted"><?php echo date('d/m/Y H:i', strtotime($kmt->created_at)); ?></small>
                                        </div>
                                        <p class="card-text mt-2"><?php echo $kmt->komentar; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> Belum ada komentar. Jadilah yang pertama berkomentar!
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Form Komentar -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Tinggalkan Komentar</h5>
                            <form action="<?php echo base_url('artikel/tambah_komentar'); ?>" method="POST">
                                <input type="hidden" name="artikel_id" value="<?php echo $artikel->id; ?>">

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="komentar" class="form-label">Komentar <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="komentar" name="komentar" rows="4" required></textarea>
                                    <small class="text-muted">Komentar Anda akan ditampilkan setelah disetujui oleh admin.</small>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> Kirim Komentar
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4">
                <!-- Sidebar -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="fas fa-search"></i> Cari Artikel</h5>
                        <input type="text" class="form-control" placeholder="Cari artikel...">
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><i class="fas fa-star"></i> Artikel Populer</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Artikel 1</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Artikel 2</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Artikel 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>