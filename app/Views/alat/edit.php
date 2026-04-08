<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="card p-4" style="max-width:600px; margin:auto;">
        <h4 class="mb-3">Edit Alat</h4>

        <form action="<?= base_url('alat/update/' . $alat['id_alat']) ?>" method="post">

            <div class="mb-3">
                <label class="form-label">Nama Alat</label>
                <input type="text" name="nama_alat" class="form-control"
                    value="<?= $alat['nama_alat'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?= $alat['deskripsi'] ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="persediaan" class="form-control"
                    value="<?= $alat['jumlah'] ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('/alat/data') ?>" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>
    </div>

</div>

<?= $this->endSection() ?>