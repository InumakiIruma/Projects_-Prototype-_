<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold">Kirim Feedback / Lapor Bug</h4>
                    <p class="text-muted">Bantu kami meningkatkan kualitas aplikasi ini.</p>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success border-0 rounded-3"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('feedback/send') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jenis Laporan</label>
                            <select name="tipe" class="form-select">
                                <option value="Bug">Bug (Sistem bermasalah)</option>
                                <option value="Error">Error (Aplikasi berhenti)</option>
                                <option value="Saran">Saran Perbaikan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Detail Masalah</label>
                            <textarea name="pesan" class="form-control" rows="4" placeholder="Jelaskan secara detail..." required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning fw-bold text-white py-2 rounded-3">Kirim Laporan</button>
                            <a href="<?= base_url('/') ?>" class="btn btn-light mt-2 border-0">Kembali ke Dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>