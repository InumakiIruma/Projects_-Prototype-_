<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card p-4" style="max-width:500px; margin:auto;">
        <h5 class="mb-3">Pinjam Alat</h5>

        <p><b>Alat:</b> <?= $alat['nama_alat'] ?></p>

        <p>
            <b>Stok:</b>
            <span class="<?= $alat['jumlah'] == 0 ? 'text-danger' : '' ?>">
                <?= $alat['jumlah'] ?>
            </span>
        </p>

        <form action="<?= base_url('pinjam') ?>" method="post">

            <input type="hidden" name="id_alat" value="<?= $alat['id_alat'] ?>">

            <div class="mb-3">
                <label>Nama Peminjam</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <?php if ($alat['jumlah'] > 0): ?>
                <button class="btn btn-primary w-100">
                    Pinjam Sekarang
                </button>
            <?php else: ?>
                <button class="btn btn-secondary w-100" disabled>
                    Stok Habis
                </button>
            <?php endif; ?>

        </form>

    </div>

</div>

<?= $this->endSection() ?>