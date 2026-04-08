<style>
    .sidebar {
        width: 220px;
        transition: 0.3s;
        overflow: hidden;
        padding-top: 10px;
    }

    .sidebar.collapsed {
        width: 70px;
    }

    /* NAV LINK BIAR RAPI */
    .nav-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 15px;
    }

    .nav-link i {
        width: 20px;
        text-align: center;
    }

    /* COLLAPSE MODE - LEBIH KE KIRI */
    .sidebar.collapsed .nav-link {
        justify-content: flex-start;
        padding-left: 10px !important;
        /* kecilin jarak kiri */
    }

    /* ICON LEBIH NEMPEL KE KIRI */
    .sidebar.collapsed .nav-link i {
        margin-left: 0;
        width: 20px;
        text-align: left;
    }

    /* OPTIONAL: kalau masih kurang kiri */
    .sidebar.collapsed {
        padding-left: 5px;
    }

    /* PAKSA SEMUA TEXT HILANG */
    .sidebar.collapsed .nav-link span {
        display: none !important;
    }

    .nav-link span {
        transition: 0.2s;
    }

    .nav-link.active {
        background: #e9f2ff;
        color: #0d6efd;
        border-radius: 6px;
    }

    /* JAGA JARAK BIAR GAK ANEH */
    .sidebar.collapsed .nav-link {
        gap: 0 !important;
    }

    #alatMenu {
        transition: 0.2s;
    }

    /* ================= PROFILE ================= */

    /* POSISI PROFILE KE KIRI ATAS */
    .nav-item.text-center {
        text-align: left !important;
        padding-left: 15px !important;
    }

    /* FOTO PROFILE */
    .nav-item.text-center img {
        height: 40px;
        width: 40px;
        object-fit: cover;
        margin-bottom: 5px;
    }

    /* TEXT PROFILE */
    .nav-item.text-center div {
        font-size: 12px;
        line-height: 1.2;
    }

    /* SAAT COLLAPSE */
    .sidebar.collapsed .nav-item.text-center {
        display: flex;
        justify-content: center;
        padding-left: 0 !important;
    }

    /* FOTO TETAP MUNCUL */
    .sidebar.collapsed .nav-item.text-center img {
        margin: 0 auto;
        display: block;
    }

    /* SEMBUNYIKAN NAMA & ROLE SAJA */
    .sidebar.collapsed .nav-item.text-center div {
        display: none;
    }

    .nav-link.active {
        border-left: 3px solid #0d6efd;
    }

    /* ================= DROPDOWN ALAT ================= */

    .sidebar.collapsed #alatMenu {
        position: absolute;
        left: 70px;
        top: 0;
        background: #ffffff;
        border-radius: 6px;
        padding: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.08);
        display: none;
    }

    .sidebar.collapsed .nav-item:hover #alatMenu {
        display: block;
    }

    /* HOVER MENU */
    .nav-link:hover {
        background: #ffffff;
        border-radius: 6px;
    }

    if (window.innerWidth < 768) {
        document.getElementById("sidebar").classList.add("collapsed");
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

            <a class="nav-link d-flex align-items-center gap-2"
                onclick="toggleMenu('alatMenu')" style="cursor:pointer;">
                <i class="bi bi-box"></i>
                <span>Alat</span>
            </a>

            <div id="alatMenu" class="ms-4 d-none">

                <a href="<?= base_url('/alat/data') ?>" class="nav-link">Data</a>

                <?php if (session('role') == 'admin'): ?>
                    <a href="<?= base_url('/alat/tambah') ?>" class="nav-link">Tambah</a>
                <?php endif; ?>

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