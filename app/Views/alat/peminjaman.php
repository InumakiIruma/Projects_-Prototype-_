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

        <?php
        $alat = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        foreach ($alat as $a):
        ?>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center p-4 hover-card">
                        <i class="bi bi-box fs-1 mb-2"></i>
                        <span>Alat <?= $a ?></span>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>

</div>

<?= $this->endSection() ?>