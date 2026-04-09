<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <h4 class="mb-3">Pengembalian Alat</h4>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card p-3">
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($data)): ?>
                    <?php $no = 1;
                    foreach ($data as $d): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $d['nama_peminjam'] ?></td>
                            <td><?= $d['nama_alat'] ?></td>
                            <td class="text-center"><?= $d['tanggal_pinjam'] ?></td>
                            <td class="text-center">

                                <!-- ✅ FIX DISINI -->
                                <a href="<?= base_url('alat/kembalikan/' . $d['id_peminjaman']) ?>"
                                    onclick="return confirm('Kembalikan alat ini?')"
                                    class="btn btn-success btn-sm">
                                    Kembalikan
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada alat yang sedang dipinjam
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>

</div>

<?= $this->endSection() ?>