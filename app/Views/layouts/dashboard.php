<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Dashboard Operasional</h4>
            <p class="text-muted">Manajemen peminjaman alat dalam satu pintu.</p>
        </div>
        <div class="text-end">
            <span class="badge bg-primary-soft text-primary p-2 px-3 rounded-pill">
                <i class="fas fa-calendar-alt me-1"></i> <?= date('d M Y') ?>
            </span>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="p-3 border-0 shadow-sm rounded-4 bg-white">
                <small class="text-muted d-block mb-1">Total Alat</small>
                <h3 class="fw-bold mb-0">124</h3>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 border-0 shadow-sm rounded-4 bg-white border-start border-primary border-4">
                <small class="text-muted d-block mb-1">Sedang Dipinjam</small>
                <h3 class="fw-bold mb-0 text-primary">12</h3>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 border-0 shadow-sm rounded-4 bg-white">
                <small class="text-muted d-block mb-1">Tersedia</small>
                <h3 class="fw-bold mb-0 text-success">112</h3>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 border-0 shadow-sm rounded-4 bg-white">
                <small class="text-muted d-block mb-1">Laporan Error</small>
                <h3 class="fw-bold mb-0 text-danger">
                    <?= (session()->get('role') === 'admin') ? ($total_feedback ?? 0) : 0 ?>
                </h3>
            </div>
        </div>
    </div>

    <h5 class="fw-semibold mb-3">Menu Utama</h5>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <a href="<?= base_url('/alat') ?>" class="text-decoration-none">
                <div class="p-4 border-0 shadow-sm rounded-4 text-center menu-card h-100">
                    <div class="icon-circle bg-primary-light text-primary mx-auto mb-3">
                        <i class="fs-3">📦</i>
                    </div>
                    <div class="fw-bold text-dark">Katalog Alat</div>
                    <small class="text-muted">Cek stok & spesifikasi alat</small>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= (session()->get('role') === 'admin') ? base_url('/admin/feedback') : base_url('/feedback') ?>" class="text-decoration-none">
                <div class="p-4 border-0 shadow-sm rounded-4 text-center menu-card h-100 border-top border-warning border-4 position-relative">

                    <?php if (session()->get('role') === 'admin' && isset($total_feedback) && $total_feedback > 0) : ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light" style="font-size: 0.8rem; z-index: 1;">
                            <?= $total_feedback ?>
                        </span>
                    <?php endif; ?>

                    <div class="icon-circle bg-warning-light text-warning mx-auto mb-3">
                        <i class="fs-3">🛠️</i>
                    </div>
                    <div class="fw-bold text-dark">Feedback & Bug</div>
                    <small class="text-muted">
                        <?= (session()->get('role') === 'admin') ? 'Kelola laporan masuk' : 'Lapor error atau saran perbaikan' ?>
                    </small>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                <div class="p-4 border-0 shadow-sm rounded-4 text-center menu-card h-100">
                    <div class="icon-circle bg-info-light text-info mx-auto mb-3">
                        <i class="fs-3">👥</i>
                    </div>
                    <div class="fw-bold text-dark">Data Member</div>
                    <small class="text-muted">Kelola data peminjam</small>
                </div>
            </a>
        </div>

    </div>

</div>

<style>
    body {
        background-color: #f8f9fa;
    }

    .menu-card {
        transition: all 0.3s ease;
        background: #fff;
    }

    .menu-card:hover {
        background: #ffffff;
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .bg-primary-light {
        background-color: #e7f1ff;
    }

    .bg-info-light {
        background-color: #e7f5ff;
    }

    .bg-primary-soft {
        background-color: #cfe2ff;
    }

    .bg-warning-light {
        background-color: #fff9db;
    }

    .text-warning {
        color: #f08c00 !important;
    }
</style>

<?= $this->endSection() ?>