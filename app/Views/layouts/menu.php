<style>
    /* Dropdown Menu */
    .menu-box {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: 180px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        padding: 8px;
        z-index: 1000;
    }

    .menu-box a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 7px 10px;
        text-decoration: none;
        color: #333;
        border-radius: 6px;
        font-size: 13px;
    }

    .menu-box a:hover {
        background: #f1f3f5;
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