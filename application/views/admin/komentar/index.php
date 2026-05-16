<div class="card">
    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Kelola Komentar</h5>
    </div>
    <div class="card-body">
        <?php if (count($komentar) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($komentar as $kmt): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $kmt->nama; ?></td>
                                <td><?php echo $kmt->email; ?></td>
                                <td><?php echo substr($kmt->komentar, 0, 50); ?>...</td>
                                <td>
                                    <?php if ($kmt->status == 'aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php elseif ($kmt->status == 'pending'): ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Spam</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($kmt->created_at)); ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/komentar_hapus/' . $kmt->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
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
                <i class="fas fa-info-circle"></i> Tidak ada komentar.
            </div>
        <?php endif; ?>
    </div>
</div>