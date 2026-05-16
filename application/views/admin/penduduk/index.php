<div class="card">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Penduduk</h5>
        <a href="<?php echo base_url('admin/penduduk_tambah'); ?>" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Tambah Penduduk
        </a>
    </div>
    <div class="card-body">
        <?php if (count($penduduk) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. KTP</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($penduduk as $p): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $p->nama; ?></td>
                                <td><?php echo $p->no_ktp; ?></td>
                                <td><?php echo substr($p->alamat, 0, 30); ?></td>
                                <td><?php echo $p->no_telepon ? $p->no_telepon : '-'; ?></td>
                                <td><?php echo $p->pekerjaan ? $p->pekerjaan : '-'; ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/penduduk_edit/' . $p->id); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?php echo base_url('admin/penduduk_hapus/' . $p->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
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
                <i class="fas fa-info-circle"></i> Belum ada data penduduk. <a href="<?php echo base_url('admin/penduduk_tambah'); ?>">Tambah data penduduk</a>
            </div>
        <?php endif; ?>
    </div>
</div>