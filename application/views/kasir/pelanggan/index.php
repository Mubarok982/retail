<h3>Data Pelanggan</h3>
<a href="<?= base_url('kasir/pelanggan/tambah') ?>">+ Tambah Pelanggan</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th><th>Nama</th><th>Email</th><th>No HP</th><th>Alamat</th><th>Aksi</th>
    </tr>
    <?php $no=1; foreach($pelanggan as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_pelanggan ?></td>
        <td><?= $p->email ?></td>
        <td><?= $p->no_hp ?></td>
        <td><?= $p->alamat ?></td>
        <td>
            <a href="<?= base_url('kasir/pelanggan/edit/'.$p->id_pelanggan) ?>">Edit</a> |
            <a href="<?= base_url('kasir/pelanggan/hapus/'.$p->id_pelanggan) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
