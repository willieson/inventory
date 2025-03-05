<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Tambah Barang</h1>
<form action="/items/store" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?= $this->endSection() ?>