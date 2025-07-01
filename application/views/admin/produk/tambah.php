<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Produk</h3>
                </div>
                
                <!-- form start -->
                <form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
                        </div>

                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select name="id_kategori" class="form-control" id="id_kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach($kategori as $k): ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control" id="stok" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control-file" id="gambar">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
