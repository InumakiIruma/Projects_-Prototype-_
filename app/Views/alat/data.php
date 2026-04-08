<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Alat</h4>

        <?php if (session('role') == 'admin'): ?>
            <a href="<?= base_url('/alat/tambah') ?>" class="btn btn-success btn-sm">
                + Tambah Alat
            </a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card p-3">
        <table class="table table-hover align-middle">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($alat)): ?>
                    <?php $no = 1;
                    foreach ($alat as $a): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $a['nama_alat'] ?></td>
                            <td><?= $a['deskripsi'] ?></td>
                            <td class="text-center"><?= $a['jumlah'] ?></td>

                            <td class="text-center">

                                <!-- ADMIN -->
                                <?php if (session('role') == 'admin'): ?>
                                    <a href="<?= base_url('alat/edit/' . $a['id_alat']) ?>" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="<?= base_url('alat/delete/' . $a['id_alat']) ?>"
                                        onclick="return confirm('Hapus data ini?')"
                                        class="btn btn-danger btn-sm">
                                        Hapus
                                    </a>
                                <?php endif; ?>

                                <!-- USER -->
                                <?php if (session('role') == 'user'): ?>
                                    <?php if ($a['jumlah'] > 0): ?>
                                        <a href="<?= base_url('pinjam/' . $a['id_alat']) ?>" class="btn btn-primary btn-sm">
                                            Pinjam
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm" disabled>
                                            Habis
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data alat
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>