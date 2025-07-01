<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Data Produk</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-sm btn-light">
                            <i class="fas fa-plus"></i> Tambah Produk
                        </a>
                    </div>
                </div>

                <div class="card-body">
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
                                        <a href="<?= base_url('produk/hapus/' . $p->id_produk) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">
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
