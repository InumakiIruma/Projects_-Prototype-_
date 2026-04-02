<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CSS Lokal -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: "Segoe UI", sans-serif;
        }

        .login-card {
            width: 360px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .login-title {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            font-size: 14px;
        }

        .btn-primary {
            border-radius: 8px;
        }

        .btn-outline-success {
            border-radius: 8px;
        }

        .logo {
            font-size: 22px;
            font-weight: 600;
            color: #0d6efd;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card login-card p-4">

            <!-- Logo / Title -->
            <div class="text-center mb-3">
                <div class="logo">📦 PrototypeApp</div>
                <div class="text-muted" style="font-size: 13px;">Silakan login untuk melanjutkan</div>
            </div>

            <!-- Error -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('salahpw')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('salahpw') ?></div>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?= base_url('/proses-login') ?>" method="post">

                <div class="mb-3">
                    <label class="form-label small text-muted">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-muted">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <button class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Sign In
                </button>

            </form>

            <!-- Register -->
            <div class="text-center mt-3">
                <a href="<?= base_url('users/create') ?>" class="text-decoration-none" style="font-size: 13px;">
                    Belum punya akun? <span class="text-primary">Daftar</span>
                </a>
            </div>

        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>