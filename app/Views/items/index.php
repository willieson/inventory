<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Daftar Barang</h1>


<a href="/" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
<a href="/items/create" class="btn btn-primary mb-3">Tambah Barang</a>

<!-- Tabel Stok Rendah -->
<?php if (!empty($lowStockItems)): ?>
    <div class="alert alert-warning mb-3">
        <h4>Perhatian: Stok Hampir Habis!</h4>
        <ul>
            <?php foreach ($lowStockItems as $lowItem): ?>
                <li><?= $lowItem['name'] ?> (Stok: <?= $lowItem['quantity'] ?>)</li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Form Pencarian -->
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Cari barang berdasarkan nama...">
</div>



<!-- Tabel Utama -->
<table class="table" id="itemTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>
                    <a href="/items/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/items/delete/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- JavaScript untuk Pencarian -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#itemTable tbody tr');

        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            if (name.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
<?= $this->endSection() ?>