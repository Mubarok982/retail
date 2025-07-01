<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Produk</h3>
                </div>

                <!-- form start -->
                <form action="<?= base_url('admin/produk/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
                        <input type="hidden" name="gambar_lama" value="<?= $produk->gambar ?>">

                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" value="<?= $produk->nama_produk ?>" class="form-control" id="nama_produk" required>
                        </div>

                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select name="id_kategori" class="form-control" id="id_kategori" required>
                                <?php foreach($kategori as $k): ?>
                                    <option value="<?= $k->id_kategori ?>" <?= ($k->id_kategori == $produk->id_kategori) ? 'selected' : '' ?>>
                                        <?= $k->nama_kategori ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" value="<?= $produk->harga ?>" class="form-control" id="harga" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" value="<?= $produk->stok ?>" class="form-control" id="stok" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"><?= $produk->deskripsi ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar Saat Ini</label><br>
                            <?php if ($produk->gambar): ?>
                                <img src="<?= base_url('uploads/' . $produk->gambar) ?>" width="100" class="img-thumbnail">
                            <?php else: ?>
                                <p><em>Tidak ada gambar</em></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Ganti Gambar (opsional)</label>
                            <input type="file" name="gambar" class="form-control-file" id="gambar">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
