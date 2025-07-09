<?php $this->load->view('templates/sidebar_kasir'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat Transaksi</h1>
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
                    <h3 class="card-title"><i class="fas fa-history mr-2"></i>Daftar Semua Transaksi</h3>
                </div>
                <div class="card-body">
                    <!-- Filter Section -->
                  <div class="filter-container p-3 mb-4 bg-light rounded border">
    <form method="get" action="<?= base_url('kasir/riwayat') ?>">
        <div class="row">
            <!-- Tanggal Awal -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="start_date">Dari Tanggal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control form-control-sm"
                        value="<?= htmlspecialchars($filter['start_date'] ?? '') ?>">
                </div>
            </div>

            <!-- Tanggal Akhir -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="end_date">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="end_date" class="form-control form-control-sm"
                        value="<?= htmlspecialchars($filter['end_date'] ?? '') ?>">
                </div>
            </div>

            <!-- Pelanggan -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id_pelanggan">Pelanggan</label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control form-control-sm">
                        <option value="">-- Semua --</option>
                        <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= $p->id_pelanggan ?>"
                                <?= ($filter['id_pelanggan'] ?? '') == $p->id_pelanggan ? 'selected' : '' ?>>
                                <?= htmlspecialchars($p->nama_pelanggan, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Kasir -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id_user">Kasir</label>
                    <select name="id_user" id="id_user" class="form-control form-control-sm">
                        <option value="">-- Semua --</option>
                        <?php foreach ($kasir as $k): ?>
                            <option value="<?= $k->id_user ?>"
                                <?= ($filter['id_user'] ?? '') == $k->id_user ? 'selected' : '' ?>>
                                <?= htmlspecialchars($k->nama_user, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Min Total -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="min_total">Total Min (Rp)</label>
                    <input type="number" name="min_total" id="min_total" class="form-control form-control-sm"
                        value="<?= htmlspecialchars($filter['min_total'] ?? '') ?>">
                </div>
            </div>

            <!-- Max Total -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="max_total">Total Max (Rp)</label>
                    <input type="number" name="max_total" id="max_total" class="form-control form-control-sm"
                        value="<?= htmlspecialchars($filter['max_total'] ?? '') ?>">
                </div>
            </div>

            <!-- Tombol Filter -->
            <div class="col-md-2 d-flex align-items-end">
                <div class="form-group w-100">
                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <a href="<?= base_url('kasir/riwayat') ?>" class="btn btn-secondary btn-sm btn-block mt-1">
                        <i class="fas fa-sync-alt"></i> Reset
                    </a>
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
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Kasir</th>
                                    <th>Total</th>
                                    <th style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($riwayat)): ?>
                                    <?php $no = 1; foreach ($riwayat as $r): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= date('d F Y, H:i', strtotime($r->tanggal)) ?></td>
                                        <td><?= htmlspecialchars($r->nama_pelanggan, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($r->nama_user, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="text-right">Rp <?= number_format($r->total, 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('kasir/riwayat/detail/' . $r->id_transaksi) ?>" class="btn btn-info btn-sm" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">Tidak ada riwayat transaksi yang ditemukan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination (Placeholder) -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer'); ?>
