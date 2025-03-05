<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Selamat Datang di Dashboard</h1>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Informasi Pengguna</h5>
            <p class="card-text"><strong>Username:</strong> <?= esc($username) ?></p>
            <p class="card-text"><strong>Role:</strong> <?= esc($role) ?></p>
        </div>
    </div>

    <h3>Menu yang Tersedia</h3>
    <div class="list-group">
        <?php if ($role === 'administrator'): ?>
            <a href="/employees" class="list-group-item list-group-item-action">Manajemen Karyawan</a>
            <a href="/items" class="list-group-item list-group-item-action">Manajemen Inventori</a>
        <?php elseif ($role === 'stakeholder'): ?>
            <a href="/items" class="list-group-item list-group-item-action">Manajemen Inventori</a>
        <?php endif; ?>
    </div>

    <a href="/logout" class="btn btn-danger mt-3">Logout</a>
</div>
<?= $this->endSection() ?>