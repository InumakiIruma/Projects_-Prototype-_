<style>
    /* USER PROFILE */
    .nav-item.text-center img {
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #f1f3f5;
        transition: 0.2s;
    }

    .nav-item.text-center img:hover {
        transform: scale(1.05);
    }

    .nav-item.text-center div b {
        font-size: 13px;
        font-weight: 600;
        color: #222;
    }

    .nav-item.text-center div:last-child {
        font-size: 11px;
        color: #888;
    }

    /* DROPDOWN */
    .menu-box {
        position: absolute;
        top: 110%;
        left: 50%;
        transform: translateX(-50%);
        width: 160px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
        padding: 6px;
        z-index: 1000;
    }

    .menu-box a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 6px 8px;
        text-decoration: none;
        color: #444;
        border-radius: 6px;
        font-size: 12px;
        transition: 0.2s;
    }

    .menu-box a:hover {
        background: #f5f7f9;
        color: #000;
    }

    .menu-box hr {
        margin: 6px 0;
        opacity: 0.2;
    }

    /* NAV MENU */
    .nav-link {
        font-size: 13px;
        color: #444;
        border-radius: 6px;
        padding: 8px 10px;
        transition: 0.2s;
    }

    .nav-link:hover {
        background: #f5f7f9;
        color: #000;
    }

    .nav-link i {
        font-size: 14px;
    }
</style>

<ul class="nav flex-column mt-3">

    <!-- User Info + Dropdown -->
    <li class="nav-item mt-3 text-center px-2 position-relative">

        <div onclick="toggleUserMenu()" style="cursor: pointer;">
            <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>"
                height="65"
                class="rounded-circle mb-2">

            <div style="font-size: 13px;">
                <b><?= session('nama'); ?></b>
            </div>

            <div style="font-size: 12px; color: #777;">
                <?= session('role'); ?>
            </div>
        </div>

        <!-- Dropdown -->
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

    <!-- Menu -->
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url('/') ?>">
            <i class="bi bi-house"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url('/alat') ?>">
            <i class="bi bi-box"></i>
            <span>Alat</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url('/users') ?>">
            <i class="bi bi-people"></i>
            <span>Users</span>
        </a>
    </li>

</ul>

<script>
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