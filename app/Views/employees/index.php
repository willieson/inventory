<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Daftar Karyawan</h1>
<a href="/" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
<a href="/employees/create" class="btn btn-primary mb-3">Tambah Karyawan</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['username'] ?></td>
                <td><?= $employee['role'] ?></td>
                <td>
                    <a href="/employees/edit/<?= $employee['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/employees/delete/<?= $employee['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus karyawan ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>