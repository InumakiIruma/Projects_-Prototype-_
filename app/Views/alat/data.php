<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="row g-3">

        <!-- CARD -->
        <div class="col-md-4">
            <a href="<?= base_url('/alat/data') ?>" class="menu-box text-decoration-none">
                <div class="card menu-card text-center p-3">
                    <div class="fs-4 mb-2">📦</div>
                    <div>Data Alat</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('/alat/tambah') ?>" class="menu-box text-decoration-none">
                <div class="card menu-card text-center p-3">
                    <div class="fs-4 mb-2">➕</div>
                    <div>Tambah Alat</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('/alat/peminjaman') ?>" class="menu-box text-decoration-none">
                <div class="card menu-card text-center p-3">
                    <div class="fs-4 mb-2">📋</div>
                    <div>Peminjaman</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('/alat/laporan') ?>" class="menu-box text-decoration-none">
                <div class="card menu-card text-center p-3">
                    <div class="fs-4 mb-2">📊</div>
                    <div>Laporan</div>
                </div>
            </a>
        </div>

    </div>

</div>

<style>
    .menu-card {
        border-radius: 10px;
        transition: 0.2s;
        color: #0d6efd;
        font-weight: 500;
    }

    .menu-card:hover {
        background: #f5f7f9;
        transform: translateY(-3px);
    }

    .menu-box {
        display: block;
    }
</style>

<?= $this->endSection() ?>