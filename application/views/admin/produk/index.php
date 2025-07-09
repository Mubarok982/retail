<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Produk</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-box-open mr-2"></i>Data Produk</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter Section -->
                    <div class="filter-container p-3 mb-4 bg-light rounded border">
                        <form method="get" action="<?= base_url('admin/produk') ?>">
                            <div class="row align-items-end">
                                <div class="col-md-3">
                                    <div class="form-group mb-md-0">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control form-control-sm">
                                            <option value="">-- Semua Kategori --</option>
                                            <?php foreach ($kategori_list as $kat): ?>
                                                <option value="<?= $kat->id_kategori ?>" <?= (isset($selected_kategori) && $selected_kategori == $kat->id_kategori) ? 'selected' : '' ?>>
                                                    <?= $kat->nama_kategori ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <label>Filter Harga</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="min_harga" class="form-control" placeholder="Harga Min" value="<?= isset($min_harga) ? $min_harga : '' ?>">
                                        <input type="number" name="max_harga" class="form-control" placeholder="Harga Max" value="<?= isset($max_harga) ? $max_harga : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                     <label>Filter Stok</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="min_stok" class="form-control" placeholder="Stok Min" value="<?= isset($min_stok) ? $min_stok : '' ?>">
                                        <input type="number" name="max_stok" class="form-control" placeholder="Stok Max" value="<?= isset($max_stok) ? $max_stok : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="btn-group w-100">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-filter"></i> Filter</button>
                                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-sync-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Filter Section -->

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th style="width: 80px;">Gambar</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($produk)): ?>
                                    <?php $no = 1; foreach ($produk as $p): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($p->nama_produk, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($p->nama_kategori, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="text-right">Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                                        <td class="text-center"><?= $p->stok ?></td>
                                        <td class="text-center">
                                            <?php if ($p->gambar): ?>
                                                <img src="<?= base_url('uploads/' . $p->gambar) ?>" width="60" class="img-thumbnail" alt="Gambar Produk">
                                            <?php else: ?>
                                                <span class="badge badge-secondary">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/produk/edit/' . $p->id_produk) ?>" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/produk/hapus/' . $p->id_produk) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus produk ini?')" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Data produk tidak ditemukan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination (Placeholder) -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>