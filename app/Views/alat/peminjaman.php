<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .hover-card {
        border-radius: 12px;
        transition: 0.2s;
        cursor: pointer;
    }

    .hover-card:hover {
        transform: translateY(-3px);
        background-color: #f8f9fa;
    }
</style>

<div class="container">

    <h4 class="mb-3">Peminjaman Alat</h4>
    <p class="text-muted">Pilih alat yang tersedia:</p>

    <div class="row g-3 mt-2">

        <?php if (!empty($alat)): ?>
            <?php foreach ($alat as $a): ?>

                <div class="col-md-4">
                    <a href="<?= base_url('pinjam/' . $a['id_alat']) ?>" class="text-decoration-none">

                        <div class="card text-center p-4 hover-card">

                            <i class="bi bi-box fs-1 mb-2"></i>

                            <h6><?= $a['nama_alat'] ?></h6>

                            <small class="text-muted">
                                Stok: <?= $a['jumlah'] ?>
                            </small>

                            <?php if ($a['jumlah'] == 0): ?>
                                <div class="text-danger mt-1">Habis</div>
                            <?php endif; ?>

                        </div>

                    </a>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Belum ada alat tersedia</p>
        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>