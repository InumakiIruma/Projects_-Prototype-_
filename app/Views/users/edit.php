<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5" style="max-width: 500px;">

    <h4 class="mb-4 text-center">Edit Akun</h4>

    <form action="<?= base_url('users/update/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <input type="text" name="nama" value="<?= $user['nama'] ?>"
                class="form-control" placeholder="Nama Lengkap" required>
        </div>

        <div class="mb-3">
            <input type="text" name="username" value="<?= $user['username'] ?>"
                class="form-control" placeholder="Username" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password"
                class="form-control" placeholder="Password baru (opsional)">
        </div>

        <div class="mb-3">
            <select name="role" class="form-control">
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
            </select>
        </div>

        <div class="mb-3 text-center">
            <?php if ($user['foto']): ?>
                <img src="<?= base_url('uploads/users/' . $user['foto']) ?>"
                    width="70" class="rounded-circle mb-2">
            <?php endif; ?>

            <input type="file" name="foto" class="form-control">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="<?= base_url('users') ?>" class="btn btn-light">Kembali</a>
            <button type="submit" class="btn btn-dark">Simpan</button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>