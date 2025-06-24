<h3>Data User</h3>
<a href="<?= base_url('admin/user/tambah') ?>">+ Tambah User</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    <?php $no=1; foreach($users as $u): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $u->nama_user ?></td>
        <td><?= $u->username ?></td>
        <td><?= $u->role ?></td>
        <td>
            <a href="<?= base_url('admin/user/edit/'.$u->id_user) ?>">Edit</a> |
            <a href="<?= base_url('admin/user/hapus/'.$u->id_user) ?>" onclick="return confirm('Hapus user ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
