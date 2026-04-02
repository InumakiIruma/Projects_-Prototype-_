<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROTOTYPE App</title>

    <!-- Bootstrap CSS Lokal -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #ffffff;
            border-right: 1px solid #eaeaea;
            padding: 20px 10px;
        }

        /* Judul sidebar (optional kalau mau tambah) */
        .sidebar-title {
            font-weight: 600;
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            padding-left: 10px;
        }

        /* Menu */
        .sidebar a {
            display: block;
            padding: 10px 15px;
            margin: 5px 0;
            color: #555;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background-color: #f1f3f5;
            color: #000;
        }

        .sidebar a.active {
            background-color: #e7f1ff;
            color: #0d6efd;
            font-weight: 500;
        }

        /* Content */
        .content {
            flex-grow: 1;
            padding: 25px;
        }

        /* Card global */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS Lokal -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>