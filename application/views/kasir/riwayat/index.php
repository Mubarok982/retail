<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_kasir'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Transaksi - RetailApp</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap & AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .content-wrapper {
      padding: 20px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Sidebar Kasir -->
  <?php $this->load->view('templates/sidebar_kasir'); ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
      <div class="container-fluid">
        <h4><i class="fas fa-history mr-2"></i>Riwayat Transaksi</h4>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card shadow-sm">
          <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
              <thead class="bg-primary text-white">
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
                <?php $no = 1; foreach ($riwayat as $r): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r->tanggal ?></td>
                    <td><?= $r->nama_pelanggan ?></td>
                    <td><?= $r->nama_user ?></td>
                    <td>Rp <?= number_format($r->total, 0, ',', '.') ?></td>
                    <td>
                      <a href="<?= base_url('kasir/riwayat/detail/' . $r->id_transaksi) ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-search"></i> Detail
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

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
