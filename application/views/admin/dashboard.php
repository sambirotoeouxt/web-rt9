<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h6 class="card-title">Total Artikel</h6>
                <h3 class="mb-0"><?php echo $total_artikel; ?></h3>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?php echo base_url('admin/artikel'); ?>" class="text-white text-decoration-none">Kelola <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h6 class="card-title">Total Galeri</h6>
                <h3 class="mb-0"><?php echo $total_galeri; ?></h3>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?php echo base_url('admin/galeri'); ?>" class="text-white text-decoration-none">Kelola <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h6 class="card-title">Total Penduduk</h6>
                <h3 class="mb-0"><?php echo $total_penduduk; ?></h3>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?php echo base_url('admin/penduduk'); ?>" class="text-white text-decoration-none">Kelola <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h6 class="card-title">Total Keuangan</h6>
                <h3 class="mb-0"><?php echo $total_keuangan; ?></h3>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?php echo base_url('admin/keuangan'); ?>" class="text-white text-decoration-none">Kelola <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang di Admin Panel</h5>
                <p class="card-text">
                    Gunakan menu di sebelah kiri untuk mengelola konten website RT 9 Sambiroto.
                </p>
                <div class="list-group">
                    <a href="<?php echo base_url('admin/artikel_tambah'); ?>" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus"></i> Tambah Artikel Baru
                    </a>
                    <a href="<?php echo base_url('admin/galeri_tambah'); ?>" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus"></i> Tambah Foto Galeri
                    </a>
                    <a href="<?php echo base_url('admin/penduduk_tambah'); ?>" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus"></i> Tambah Data Penduduk
                    </a>
                    <a href="<?php echo base_url('admin/keuangan_tambah'); ?>" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus"></i> Tambah Transaksi Keuangan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>