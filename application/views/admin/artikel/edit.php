<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Edit Artikel</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('admin/artikel_edit/' . $artikel->id); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo form_error('judul') ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?php echo set_value('judul', $artikel->judul); ?>">
                <?php echo form_error('judul', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea class="form-control <?php echo form_error('konten') ? 'is-invalid' : ''; ?>" id="konten" name="konten" rows="8"><?php echo set_value('konten', $artikel->konten); ?></textarea>
                <?php echo form_error('konten', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <div class="mb-2">
                    <img src="<?php echo base_url('uploads/artikel/' . $artikel->gambar); ?>" alt="" style="max-height: 200px; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="<?php echo base_url('admin/artikel'); ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>