<div class="py-5">
    <div class="container">
        <h2 class="mb-4"><i class="fas fa-money-bill-wave"></i> Laporan Keuangan Kas RT 9</h2>

        <!-- Ringkasan Keuangan -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Pemasukan</h5>
                        <h3>Rp <?php echo number_format($total_masuk, 0, ',', '.'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengeluaran</h5>
                        <h3>Rp <?php echo number_format($total_keluar, 0, ',', '.'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Saldo</h5>
                        <h3>Rp <?php echo number_format($saldo, 0, ',', '.'); ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Keuangan -->
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>