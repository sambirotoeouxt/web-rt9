<div class="card">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Galeri</h5>
        <a href="<?php echo base_url('admin/galeri_tambah'); ?>" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Tambah Galeri
        </a>
    </div>
    <div class="card-body">
        <?php if (count($galeri) > 0): ?>
            <div class="row">
                <?php foreach ($galeri as $foto): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="<?php echo base_url('uploads/galeri/' . $foto->gambar); ?>" class="card-img-top" alt="<?php echo $foto->judul; ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body p-2">
                                <p class="card-text mb-2"><?php echo substr($foto->judul, 0, 30); ?></p>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo base_url('admin/galeri_hapus/' . $foto->id); ?>" class="btn btn-danger btn-sm flex-grow-1" onclick="return confirm('Yakin ingin menghapus?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-3">
                <?php echo $pagination; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Belum ada galeri. <a href="<?php echo base_url('admin/galeri_tambah'); ?>">Tambah galeri baru</a>
            </div>
        <?php endif; ?>
    </div>
</div>