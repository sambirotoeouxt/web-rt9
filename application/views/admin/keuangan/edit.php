<div class="card">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Edit Transaksi Keuangan</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('admin/keuangan_edit/' . $keuangan->id); ?>" method="POST">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                <input type="date" class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?php echo set_value('tanggal', $keuangan->tanggal); ?>">
                <?php echo form_error('tanggal', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Transaksi <span class="text-danger">*</span></label>
                <select class="form-select <?php echo form_error('tipe') ? 'is-invalid' : ''; ?>" id="tipe" name="tipe">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="masuk" <?php echo set_value('tipe', $keuangan->tipe) == 'masuk' ? 'selected' : ''; ?>>Pemasukan</option>
                    <option value="keluar" <?php echo set_value('tipe', $keuangan->tipe) == 'keluar' ? 'selected' : ''; ?>>Pengeluaran</option>
                </select>
                <?php echo form_error('tipe', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                <textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="3"><?php echo set_value('keterangan', $keuangan->keterangan); ?></textarea>
                <?php echo form_error('keterangan', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal (Rp) <span class="text-danger">*</span></label>
                <input type="number" class="form-control <?php echo form_error('nominal') ? 'is-invalid' : ''; ?>" id="nominal" name="nominal" value="<?php echo set_value('nominal', $keuangan->nominal); ?>">
                <?php echo form_error('nominal', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="<?php echo base_url('admin/keuangan'); ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>