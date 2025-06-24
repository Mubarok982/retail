<h3>Data Kategori</h3>
<a href="<?= base_url('admin/kategori/tambah') ?>">+ Tambah Kategori</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php $no=1; foreach($kategori as $k): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $k->nama_kategori ?></td>
        <td><?= $k->deskripsi ?></td>
        <td>
            <a href="<?= base_url('admin/kategori/edit/'.$k->id_kategori) ?>">Edit</a> |
            <a href="<?= base_url('admin/kategori/hapus/'.$k->id_kategori) ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
