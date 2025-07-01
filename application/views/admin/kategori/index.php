<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Data Kategori</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-sm btn-light">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($kategori as $k): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k->nama_kategori ?></td>
                                    <td><?= $k->deskripsi ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/kategori/edit/' . $k->id_kategori) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/kategori/hapus/' . $k->id_kategori) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ini?')">
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