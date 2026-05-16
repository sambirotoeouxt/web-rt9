<div class="py-5">
    <div class="container">
        <h2 class="mb-4"><i class="fas fa-users"></i> Data Penduduk RT 9</h2>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau No. KTP...">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. KTP</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($penduduk as $p): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p->nama; ?></td>
                            <td><?php echo $p->no_ktp; ?></td>
                            <td><?php echo $p->alamat; ?></td>
                            <td><?php echo $p->no_telepon ? $p->no_telepon : '-'; ?></td>
                            <td><?php echo $p->pekerjaan ? $p->pekerjaan : '-'; ?></td>
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