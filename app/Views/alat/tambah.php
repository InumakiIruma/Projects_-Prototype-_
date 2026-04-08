<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .form-card {
        max-width: 600px;
        margin: auto;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .form-control {
        border-radius: 8px;
    }

    .btn {
        border-radius: 8px;
    }
</style>

<div class="container mt-4">

    <div class="card form-card p-4">

        <h4 class="mb-3">Tambah Alat</h4>
        <p class="text-muted">Masukkan data alat baru</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('alat/simpan') ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Nama Alat</label>
                <input type="text" name="nama_alat" class="form-control" placeholder="Contoh: Laptop" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi alat..."></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="persediaan" class="form-control" placeholder="0" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('alat') ?>" class="btn btn-outline-secondary">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>