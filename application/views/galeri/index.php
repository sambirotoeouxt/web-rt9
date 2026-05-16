<div class="py-5">
    <div class="container">
        <h2 class="mb-4"><i class="fas fa-images"></i> Galeri Foto</h2>

        <div class="row g-3">
            <?php foreach ($galeri as $foto): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="overflow-hidden rounded shadow-sm hover-card" style="cursor: pointer;">
                        <img src="<?php echo base_url('uploads/galeri/' . $foto->gambar); ?>" alt="<?php echo $foto->judul; ?>" class="img-fluid" style="height: 300px; width: 100%; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galeriModal" onclick="showGaleri('<?php echo base_url('uploads/galeri/' . $foto->gambar); ?>', '<?php echo $foto->judul; ?>')">
                        <div class="p-3">
                            <h6 class="mb-0"><?php echo $foto->judul; ?></h6>
                            <small class="text-muted"><?php echo date('d/m/Y', strtotime($foto->created_at)); ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-5">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>

<!-- Modal Galeri -->
<div class="modal fade" id="galeriModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galeriTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="galeriImage" src="" alt="" class="img-fluid" style="max-height: 600px;">
            </div>
        </div>
    </div>
</div>

<script>
    function showGaleri(image, title) {
        document.getElementById('galeriImage').src = image;
        document.getElementById('galeriTitle').textContent = title;
    }
</script>