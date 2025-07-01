<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <!-- Judul -->
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h4><i class="fas fa-user-friends me-2"></i>Data Pelanggan</h4>
                <a href="<?= base_url('kasir/pelanggan/tambah') ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah Pelanggan
                </a>
            </div>

            <!-- Tabel Pelanggan -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($pelanggan as $p): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->nama_pelanggan ?></td>
                                    <td><?= $p->email ?></td>
                                    <td><?= $p->no_hp ?></td>
                                    <td><?= $p->alamat ?></td>
                                    <td>
                                        <a href="<?= base_url('kasir/pelanggan/edit/'.$p->id_pelanggan) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('kasir/pelanggan/hapus/'.$p->id_pelanggan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
