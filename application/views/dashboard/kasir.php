<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_kasir'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kasir</title>
</head>
<body>
    <h1>Selamat Datang Kasir, <?= $this->session->userdata('nama_user'); ?>!</h1>
    <p>Ini adalah halaman dashboard khusus kasir.</p>
</body>
</html>
