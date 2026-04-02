<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <h4 class="mb-4">Menu Alat</h4>

    <div class="row g-3">

        <!-- Menu 1 -->
        <div class="col-md-3">
            <a href="<?= base_url('/alat/data') ?>" class="text-decoration-none">
                <div class="menu-card p-3 text-center border rounded-3">
                    <div class="fs-3 mb-2">📦</div>
                    <div class="fw-semibold">Data Alat</div>
                </div>
            </a>
        </div>

        <!-- Menu 2 -->
        <div class="col-md-3">
            <a href="<?= base_url('/alat/tambah') ?>" class="text-decoration-none">
                <div class="menu-card p-3 text-center border rounded-3">
                    <div class="fs-3 mb-2">➕</div>
                    <div class="fw-semibold">Tambah Alat</div>
                </div>
            </a>
        </div>

        <!-- Menu 3 -->
        <div class="col-md-3">
            <a href="<?= base_url('/alat/peminjaman') ?>" class="text-decoration-none">
                <div class="menu-card p-3 text-center border rounded-3">
                    <div class="fs-3 mb-2">📋</div>
                    <div class="fw-semibold">Peminjaman</div>
                </div>
            </a>
        </div>

        <!-- Menu 4 -->
        <div class="col-md-3">
            <a href="<?= base_url('/alat/laporan') ?>" class="text-decoration-none">
                <div class="menu-card p-3 text-center border rounded-3">
                    <div class="fs-3 mb-2">📊</div>
                    <div class="fw-semibold">Laporan</div>
                </div>
            </a>
        </div>

    </div>

</div>

<style>
    .menu-card {
        background: #fff;
        transition: 0.2s;
    }

    .menu-card:hover {
        background: #f5f7f9;
        transform: translateY(-4px);
    }
</style>

<?= $this->endSection() ?>