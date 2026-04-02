<style>
    .sidebar {
        width: 220px;
        transition: 0.3s;
        overflow: hidden;
    }

    .sidebar.collapsed {
        width: 70px;
    }

    .sidebar.collapsed span {
        display: none;
    }

    .sidebar.collapsed .nav-link {
        justify-content: center;
    }

    .sidebar.collapsed .nav-link i {
        font-size: 18px;
    }

    .sidebar.collapsed .nav-item.text-center div {
        display: none;
    }

    .sidebar.collapsed .nav-item {
        position: relative;
    }

    .sidebar.collapsed .nav-item:hover::after {
        content: attr(data-title);
        position: absolute;
        left: 70px;
        background: #000;
        color: #fff;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 11px;
        white-space: nowrap;
    }

    .menu-card:hover {
        background: #f5f7f9;
    }
</style>

<!-- Tombol ☰ -->
<button class="btn btn-light m-2" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<div id="sidebar" class="sidebar">

    <ul class="nav flex-column mt-3">

        <!-- PROFILE -->
        <li class="nav-item mt-3 text-center px-2 position-relative">

            <div onclick="toggleUserMenu()" style="cursor: pointer;">
                <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>"
                    height="55"
                    class="rounded-circle mb-2">

                <div><b><?= session('nama'); ?></b></div>
                <div style="font-size: 12px; color: #777;">
                    <?= session('role'); ?>
                </div>
            </div>

            <div id="userMenu" class="menu-box d-none text-start">
                <a href="<?= base_url('users') ?>">
                    <i class="bi bi-person"></i> Profile
                </a>

                <a href="<?= base_url('users/edit/' . session('id_user')) ?>">
                    <i class="bi bi-gear"></i> Settings
                </a>

                <hr>

                <a href="<?= base_url('/logout') ?>" class="text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>

        </li>

        <!-- DASHBOARD -->
        <li class="nav-item" data-title="Dashboard">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url('/dashboard') ?>">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- ALAT (DROPDOWN) -->
        <li class="nav-item" data-title="Alat">
            <a class="nav-link d-flex align-items-center gap-2" onclick="toggleMenu('alatMenu')" style="cursor:pointer;">
                <i class="bi bi-box"></i>
                <span>Alat</span>
            </a>

            <div id="alatMenu" class="ms-4 d-none">
                <a href="<?= base_url('/alat/data') ?>" class="nav-link">Data</a>
                <a href="<?= base_url('/alat/tambah') ?>" class="nav-link">Tambah</a>
                <a href="<?= base_url('/alat/peminjaman') ?>" class="nav-link">Peminjaman</a>
                <a href="<?= base_url('/alat/laporan') ?>" class="nav-link">Laporan</a>
            </div>
        </li>

        <!-- USERS -->
        <li class="nav-item" data-title="Users">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url('/users') ?>">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>

    </ul>

</div>

<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("collapsed");
    }

    function toggleMenu(id) {
        document.getElementById(id).classList.toggle("d-none");
    }

    function toggleUserMenu() {
        document.getElementById("userMenu").classList.toggle("d-none");
    }

    document.addEventListener("click", function(e) {
        let menu = document.getElementById("userMenu");

        if (!e.target.closest(".position-relative")) {
            menu.classList.add("d-none");
        }
    });
</script>