<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Data Produk</h3>
                </div>

                <div class="card-body">
                    <!-- Filter Kategori -->
                    <form method="get" class="mb-3">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <select name="kategori" class="form-control" onchange="this.form.submit()">
                                    <option value="">-- Semua Kategori --</option>
                                    <?php foreach($kategori_list as $kat): ?>
                                        <option value="<?= $kat->id_kategori ?>" <?= (isset($selected_kategori) && $selected_kategori == $kat->id_kategori) ? 'selected' : '' ?>>
                                            <?= $kat->nama_kategori ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <input type="number" name="min_harga" class="form-control" placeholder="Harga Min" value="<?= isset($min_harga) ? $min_harga : '' ?>">
                            </div>
                            <div class="col-md-3 mb-2">
                                <input type="number" name="max_harga" class="form-control" placeholder="Harga Max" value="<?= isset($max_harga) ? $max_harga : '' ?>">
                            </div>
                            <div class="col-md-2 mb-2">
                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Filter Kategori -->

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($produk as $p): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->nama_produk ?></td>
                                    <td><?= $p->nama_kategori ?></td>
                                    <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                                    <td><?= $p->stok ?></td>
                                    <td>
                                        <?php if ($p->gambar): ?>
                                            <img src="<?= base_url('uploads/' . $p->gambar) ?>" width="60" class="img-thumbnail">
                                        <?php else: ?>
                                            <em>Tidak ada</em>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/produk/edit/' . $p->id_produk) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/produk/hapus/' . $p->id_produk) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>