<div class="card">
    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Keuangan</h5>
        <a href="<?php echo base_url('admin/keuangan_tambah'); ?>" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>
    <div class="card-body">
        <!-- Ringkasan -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h6 class="card-title">Total Pemasukan</h6>
                        <h4>Rp <?php echo number_format($total_masuk, 0, ',', '.'); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h6 class="card-title">Total Pengeluaran</h6>
                        <h4>Rp <?php echo number_format($total_keluar, 0, ',', '.'); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h6 class="card-title">Saldo</h6>
                        <h4>Rp <?php echo number_format($saldo, 0, ',', '.'); ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <?php if (count($keuangan) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($keuangan as $k): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($k->tanggal)); ?></td>
                                <td>
                                    <?php if ($k->tipe == 'masuk'): ?>
                                        <span class="badge bg-success"><i class="fas fa-arrow-up"></i> Masuk</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><i class="fas fa-arrow-down"></i> Keluar</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $k->keterangan; ?></td>
                                <td class="<?php echo $k->tipe == 'masuk' ? 'text-success' : 'text-danger'; ?> fw-bold">
                                    <?php echo $k->tipe == 'masuk' ? '+' : '-'; ?> Rp <?php echo number_format($k->nominal, 0, ',', '.'); ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/keuangan_edit/' . $k->id); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?php echo base_url('admin/keuangan_hapus/' . $k->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
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
                <i class="fas fa-info-circle"></i> Belum ada transaksi keuangan. <a href="<?php echo base_url('admin/keuangan_tambah'); ?>">Tambah transaksi baru</a>
            </div>
        <?php endif; ?>
    </div>
</div>