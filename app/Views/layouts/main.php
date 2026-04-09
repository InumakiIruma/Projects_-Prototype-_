<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROTOTYPE App</title>

    <!-- Bootstrap -->
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

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background: #ffffff;
            border-right: 1px solid #eaeaea;
            padding: 20px 10px;
            transition: 0.3s;
            overflow: hidden;
        }

        /* COLLAPSE */
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 10px 5px;
        }

        /* MAIN */
        .main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }

        /* TOPBAR */
        .topbar {
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        /* NOTIF */
        .notif-icon {
            position: relative;
            cursor: pointer;
            margin-left: auto;
        }

        .notif-badge {
            position: absolute;
            top: -5px;
            right: -8px;
            background: red;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
        }

        .notif-box {
            position: absolute;
            right: 20px;
            top: 60px;
            width: 260px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 999;
            padding: 10px;
        }

        .content {
            padding: 25px;
        }

        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <!-- TOGGLE SIDEBAR -->
            <?php if (session('role') == 'admin'): ?>

                <!-- NOTIF ICON -->
                <div class="notif-icon" onclick="openNotif()">
                    <i class="bi bi-bell fs-5"></i>
                    <span id="notifCount" class="notif-badge"></span>
                </div>

                <!-- DROPDOWN -->
                <div id="notifBox" class="notif-box">
                    <b>Notifikasi</b>
                    <hr>
                    <div id="notifList"></div>
                </div>

            <?php endif; ?>

        </div>

        <!-- CONTENT -->
        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>

    </div>

    <!-- SCRIPT -->
    <script>
        // TOGGLE SIDEBAR
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
        }

        // AUTO COLLAPSE DI HP
        if (window.innerWidth < 768) {
            document.querySelector('.sidebar').classList.add('collapsed');
        }

        // NOTIF
        function loadNotif() {
            fetch("<?= base_url('/notif') ?>")
                .then(res => res.json())
                .then(data => {

                    let html = '';

                    if (data.length == 0) {
                        html = '<small>Tidak ada notifikasi</small>';
                    } else {
                        data.forEach(n => {
                            html += `
                        <div style="font-size:13px; margin-bottom:5px;">
                            🔔 ${n.nama_peminjam} pinjam <b>${n.nama_alat}</b>
                        </div>
                        <hr>
                    `;
                        });
                    }

                    document.getElementById('notifList').innerHTML = html;
                });
        }

        function loadCount() {
            fetch("<?= base_url('/notif/count') ?>")
                .then(res => res.json())
                .then(data => {
                    document.getElementById('notifCount').innerText = data.total;
                });
        }

        function openNotif() {
            let box = document.getElementById('notifBox');

            box.style.display = box.style.display === 'block' ? 'none' : 'block';

            fetch("<?= base_url('/notif/read') ?>", {
                method: 'POST'
            });

            loadNotif();
            loadCount();
        }

        // AUTO REFRESH
        setInterval(loadCount, 5000);

        // LOAD AWAL
        loadCount();
    </script>

    <!-- Bootstrap -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>