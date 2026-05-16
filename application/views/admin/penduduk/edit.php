<div class="card">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0">Edit Data Penduduk</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('admin/penduduk_edit/' . $penduduk->id); ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?php echo set_value('nama', $penduduk->nama); ?>">
                <?php echo form_error('nama', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="no_ktp" class="form-label">No. KTP <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo form_error('no_ktp') ? 'is-invalid' : ''; ?>" id="no_ktp" name="no_ktp" value="<?php echo set_value('no_ktp', $penduduk->no_ktp); ?>">
                <?php echo form_error('no_ktp', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3"><?php echo set_value('alamat', $penduduk->alamat); ?></textarea>
                <?php echo form_error('alamat', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo set_value('no_telepon', $penduduk->no_telepon); ?>">
            </div>

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo set_value('pekerjaan', $penduduk->pekerjaan); ?>">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="<?php echo base_url('admin/penduduk'); ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>