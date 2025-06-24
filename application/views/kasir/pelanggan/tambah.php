<h3>Tambah Pelanggan</h3>
<form method="post" action="<?= base_url('kasir/pelanggan/simpan') ?>">
    Nama: <input type="text" name="nama_pelanggan" required><br>
    Email: <input type="email" name="email" required><br>
    No HP: <input type="text" name="no_hp" required><br>
    Alamat: <textarea name="alamat" required></textarea><br>
    <button type="submit">Simpan</button>
</form>
