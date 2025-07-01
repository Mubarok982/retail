<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Laporan Penjualan</h3>
                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Kasir</th>
                                    <th>Total</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($laporan as $l): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l->tanggal ?></td>
                                    <td><?= $l->nama_pelanggan ?></td>
                                    <td><?= $l->nama_user ?></td>
                                    <td>Rp <?= number_format($l->total) ?></td>
                                    <td><a href="<?= base_url('admin/laporan/detail/' . $l->id_transaksi) ?>">Detail</a></td>
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