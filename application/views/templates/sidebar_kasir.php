<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>RetailApp - Dashboard</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
    }

    .main-sidebar {
      background-color: #ffffff;
      color: #333;
      border-right: 1px solid #ddd;
    }

    .brand-link {
      background-color: #f0f0f0;
      font-weight: bold;
      color: #007bff !important;
      border-bottom: 1px solid #ddd;
    }

    .nav-sidebar > .nav-item > .nav-link {
      color: #333;
      transition: all 0.3s ease;
    }

    .nav-sidebar > .nav-item > .nav-link:hover {
      background-color: #e6f0ff;
      color: #0056b3;
    }

    .nav-sidebar .nav-icon {
      color: #888;
    }

    .nav-sidebar > .nav-item > .nav-link.active {
      background-color: #d6e4ff;
      color: #0056b3;
    }

    .brand-text {
      font-size: 1.3rem;
      font-weight: 600;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar -->
  <aside class="main-sidebar elevation-3">
    <!-- Brand -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-center">
      <span class="brand-text">Retail<span style="color:#007bff">App</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Dropdown Kelola Produk -->
          <li class="nav-item has-treeview">
            <a href="<?= base_url('kasir/transaksi/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Transaksi Penjualan
              </p>
            </a>
          </li>

          <!-- Dropdown Kelola Kategori -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Pelanggan
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('kasir/pelanggan/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('kasir/pelanggan/tambah') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pelanggan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Dropdown Kelola User -->
          <li class="nav-item has-treeview">
            <a href="<?= base_url('kasir/riwayat/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Riwayat Transaksi
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>