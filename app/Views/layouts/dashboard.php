<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <!-- Header -->
    <div class="mb-4">
        <h4 class="fw-semibold">Dashboard</h4>
        <p class="text-muted">Welcome to Projects <b>Prototype App</b> 👋</p>
    </div>

    <!-- Menu Shortcut -->
    <div class="row g-3">

        <!-- Card Menu -->
        <div class="col-md-4">
            <a href="<?= base_url('/') ?>" class="text-decoration-none">
                <div class="p-3 border rounded-3 text-center menu-card">
                    <div class="mb-2 fs-4">🏠</div>
                    <div class="fw-semibold">Dashboard</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('/alat') ?>" class="text-decoration-none">
                <div class="p-3 border rounded-3 text-center menu-card">
                    <div class="mb-2 fs-4">📦</div>
                    <div class="fw-semibold">Alat</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                <div class="p-3 border rounded-3 text-center menu-card">
                    <div class="mb-2 fs-4">👥</div>
                    <div class="fw-semibold">Users</div>
                </div>
            </a>
        </div>

    </div>

</div>

<!-- Style tambahan -->
<style>
    .menu-card {
        transition: 0.2s;
        background: #fff;
    }

    .menu-card:hover {
        background: #f5f7f9;
        transform: translateY(-3px);
    }
</style>

<?= $this->endSection() ?>