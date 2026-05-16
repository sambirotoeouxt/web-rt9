<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Tambah Foto Galeri</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('admin/galeri_tambah'); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo form_error('judul') ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?php echo set_value('judul'); ?>">
                <?php echo form_error('judul', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                <small class="text-muted">Format: JPG, PNG, GIF. Max 2MB</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="<?php echo base_url('admin/galeri'); ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>