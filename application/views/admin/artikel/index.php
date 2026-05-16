<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Artikel</h5>
        <a href="<?php echo base_url('admin/artikel_tambah'); ?>" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Tambah Artikel
        </a>
    </div>
    <div class="card-body">
        <?php if (count($artikel) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($artikel as $art): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo substr($art->judul, 0, 40); ?></td>
                                <td>
                                    <img src="<?php echo base_url('uploads/artikel/' . $art->gambar); ?>" alt="" style="height: 50px; border-radius: 5px;">
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($art->created_at)); ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/artikel_edit/' . $art->id); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?php echo base_url('admin/artikel_hapus/' . $art->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <?php echo $pagination; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Belum ada artikel. <a href="<?php echo base_url('admin/artikel_tambah'); ?>">Tambah artikel baru</a>
            </div>
        <?php endif; ?>
    </div>
</div>