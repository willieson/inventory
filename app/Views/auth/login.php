<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Login</h1>
<form action="/login" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?= $this->endSection() ?>