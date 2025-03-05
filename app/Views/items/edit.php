<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Edit Barang</h1>
<form action="/items/update/<?= $item['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="name" class="form-control" value="<?= $item['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="quantity" class="form-control" value="<?= $item['quantity'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"><?= $item['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
<?= $this->endSection() ?>