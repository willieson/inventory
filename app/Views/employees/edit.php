<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Edit Karyawan</h1>
<form action="/employees/update/<?= $employee['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= $employee['username'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="administrator" <?= $employee['role'] == 'administrator' ? 'selected' : '' ?>>Administrator</option>
            <option value="stakeholder" <?= $employee['role'] == 'stakeholder' ? 'selected' : '' ?>>Stakeholder</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
<?= $this->endSection() ?>