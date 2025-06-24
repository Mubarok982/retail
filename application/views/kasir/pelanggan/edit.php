<h3>Edit Pelanggan</h3>
<form method="post" action="<?= base_url('kasir/pelanggan/update') ?>">
    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan ?>">
    Nama: <input type="text" name="nama_pelanggan" value="<?= $pelanggan->nama_pelanggan ?>" required><br>
    Email: <input type="email" name="email" value="<?= $pelanggan->email ?>" required><br>
    No HP: <input type="text" name="no_hp" value="<?= $pelanggan->no_hp ?>" required><br>
    Alamat: <textarea name="alamat" required><?= $pelanggan->alamat ?></textarea><br>
    <button type="submit">Update</button>
</form>
