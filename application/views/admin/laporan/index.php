<?php $this->load->view('templates/sidebar_admin'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title m-0">
                        <i class="fas fa-file-alt mr-2"></i>Laporan Penjualan
                    </h3>
                </div>
                
                <div class="card-body">
                    <a href="<?= base_url('admin/laporan/export_excel') ?>" class="btn btn-success btn-sm mb-3">
                        <i class="fas fa-file-excel mr-1"></i> Export Excel
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Kasir</th>
                                    <th>Total</th>
                                    <th style="width: 130px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($laporan as $l): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= date('d-m-Y H:i', strtotime($l->tanggal)) ?></td>
                                        <td><?= $l->nama_pelanggan ?></td>
                                        <td><?= $l->nama_user ?></td>
                                        <td>Rp <?= number_format($l->total, 0, ',', '.') ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= base_url('admin/laporan/detail/' . $l->id_transaksi) ?>"
                                                class="btn btn-sm btn-info mb-1">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <a href="<?= base_url('admin/laporan/hapus/' . $l->id_transaksi) ?>"
                                                class="btn btn-sm btn-danger mb-1"
                                                onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($laporan)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data laporan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>