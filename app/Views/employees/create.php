<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Tambah Karyawan</h1>
<form action="/employees/store" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="administrator">Administrator</option>
            <option value="stakeholder">Stakeholder</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?= $this->endSection() ?>