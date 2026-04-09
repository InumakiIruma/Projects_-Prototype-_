<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Laporan Masuk (Feedback & Bug)</h4>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Waktu</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($feedback) && is_array($feedback)) : ?>
                            <?php foreach ($feedback as $row) : ?>
                                <tr>
                                    <td><?= date('d/m/H:i', strtotime($row['created_at'])) ?></td>
                                    <td>
                                        <div class="fw-bold"><?= esc($row['nama']) ?></div>
                                        <small class="text-muted"><?= esc($row['email']) ?></small>
                                    </td>
                                    <td>
                                        <?php if ($row['tipe'] == 'Bug'): ?>
                                            <span class="badge bg-danger">Bug</span>
                                        <?php elseif ($row['tipe'] == 'Error'): ?>
                                            <span class="badge bg-warning text-dark">Error</span>
                                        <?php else: ?>
                                            <span class="badge bg-info">Saran</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc($row['pesan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada feedback masuk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>