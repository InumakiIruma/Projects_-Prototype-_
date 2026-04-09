<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: #f4f6f9;
        transition: 0.3s;
    }

    /* ================= GLOBAL DARK MODE ================= */
    body.dark-mode {
        background: #1e1e2f !important;
        color: #e4e6eb !important;
    }

    body.dark-mode * {
        color: #e4e6eb !important;
    }

    body.dark-mode .card,
    body.dark-mode .settings-content,
    body.dark-mode .settings-menu {
        background: #2a2a40 !important;
        border: 1px solid #444 !important;
    }

    body.dark-mode .form-control {
        background: #1e1e2f;
        color: #fff;
        border: 1px solid #444;
    }

    body.dark-mode .nav-link {
        color: #ddd !important;
    }

    body.dark-mode .nav-link:hover {
        background: #3a3a55;
    }

    body.dark-mode .btn {
        border: none;
    }

    body.dark-mode .text-muted {
        color: #aaa !important;
    }

    body.dark-mode hr {
        border-color: #555;
    }

    /* ================= SETTINGS ================= */

    .settings-wrapper {
        display: flex;
        gap: 20px;
    }

    .settings-menu {
        width: 230px;
        background: #fff;
        border-radius: 14px;
        padding: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .settings-menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 8px;
        color: #333;
        text-decoration: none;
        margin-bottom: 5px;
        cursor: pointer;
    }

    .settings-menu a:hover,
    .settings-menu a.active {
        background: #eef4ff;
        color: #0d6efd;
    }

    .settings-content {
        flex: 1;
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .profile-card {
        text-align: center;
    }

    .profile-card img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }

    .badge-role {
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 20px;
        background: #e7f1ff;
        color: #0d6efd;
    }
</style>

<div class="container mt-4">

    <h4 class="mb-3">⚙️ Settings Dashboard</h4>

    <div class="settings-wrapper">

        <!-- SIDEBAR -->
        <div class="settings-menu">
            <a onclick="openTab(event,'profile')" class="active">
                <i class="bi bi-person"></i> Profile
            </a>

            <a onclick="openTab(event,'edit')">
                <i class="bi bi-pencil"></i> Edit User
            </a>

            <a onclick="openTab(event,'setting')">
                <i class="bi bi-gear"></i> Settings
            </a>

            <a onclick="openTab(event,'about')">
                <i class="bi bi-info-circle"></i> About
            </a>
        </div>

        <!-- CONTENT -->
        <div class="settings-content">

            <!-- PROFILE -->
            <div id="profile" class="tab-content active">
                <div class="profile-card">
                    <img src="<?= base_url('uploads/users/' . $user['foto']) ?>">
                    <h5><?= $user['nama'] ?></h5>
                    <p class="text-muted"><?= $user['username'] ?></p>
                    <span class="badge-role"><?= $user['role'] ?></span>
                </div>
            </div>

            <!-- EDIT -->
            <div id="edit" class="tab-content">
                <h5>Edit User</h5>

                <form action="<?= base_url('users/update/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password baru">
                    </div>

                    <!-- ROLE LOCK -->
                    <div class="mb-3">
                        <?php if (session('role') == 'admin'): ?>
                            <select name="role" class="form-control">
                                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" value="<?= $user['role'] ?>" readonly>
                        <?php endif; ?>
                    </div>

                    <!-- PREVIEW FOTO -->
                    <div class="mb-3 text-center">
                        <img id="previewFoto"
                            src="<?= base_url('uploads/users/' . $user['foto']) ?>"
                            width="80"
                            class="rounded-circle mb-2">

                        <input type="file" name="foto" class="form-control" onchange="previewImage(event)">
                    </div>

                    <button class="btn btn-primary w-100">💾 Simpan</button>
                </form>
            </div>

            <!-- SETTINGS -->
            <div id="setting" class="tab-content">
                <h5>Settings</h5>

                <div class="card p-3 mt-3">

                    <!-- DARK MODE -->
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkToggle">
                        <label class="form-check-label">Dark Mode</label>
                    </div>

                </div>

                <!-- ACTIVITY LOG -->
                <h6 class="mt-3">Activity Log</h6>

                <div class="card p-2 mt-2" style="max-height:200px; overflow:auto;">
                    <?php
                    $db = \Config\Database::connect();
                    $log = $db->table('log_activity')
                        ->where('user_id', session('id_user'))
                        ->orderBy('id', 'DESC')
                        ->get()->getResultArray();

                    foreach ($log as $l): ?>
                        <small>• <?= $l['aktivitas'] ?><br>
                            <span class="text-muted"><?= $l['created_at'] ?></span></small>
                        <hr>
                    <?php endforeach; ?>
                </div>

            </div>

            <!-- ABOUT -->
            <div id="about" class="tab-content">
                <h5>About</h5>
                <p>Aplikasi Peminjaman Alat</p>
                <small>Versi 1.0</small>
            </div>

        </div>

    </div>

</div>

<script>
    function openTab(e, tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');

        document.querySelectorAll('.settings-menu a').forEach(el => el.classList.remove('active'));
        e.target.classList.add('active');
    }

    // DARK MODE GLOBAL
    const toggle = document.getElementById("darkToggle");

    if (localStorage.getItem("darkMode") === "on") {
        document.body.classList.add("dark-mode");
        toggle.checked = true;
    }

    toggle.addEventListener("change", function() {
        if (this.checked) {
            document.body.classList.add("dark-mode");
            localStorage.setItem("darkMode", "on");
        } else {
            document.body.classList.remove("dark-mode");
            localStorage.setItem("darkMode", "off");
        }
    });

    // PREVIEW FOTO
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('previewFoto').src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?= $this->endSection() ?>