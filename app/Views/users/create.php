<!-- app/Views/users/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width: 500px;">

        <h4 class="text-center mb-4">Buat Akun</h4>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger text-center">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <input type="text" name="nama" class="form-control"
                    placeholder="Nama Lengkap" required>
            </div>

            <div class="mb-3">
                <input type="text" name="username" class="form-control"
                    placeholder="Username" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control"
                    placeholder="Password" required>
            </div>

            <div class="mb-3">
                <select name="role" class="form-control" required>
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Upload foto (opsional)</small>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('login') ?>" class="btn btn-light">Login</a>
                <button type="submit" class="btn btn-dark">Daftar</button>
            </div>

        </form>

    </div>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>