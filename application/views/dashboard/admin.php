<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_admin'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <div style="display:flex;min-height:100vh;">
        <!-- Main Content -->
        <div style="flex:1;padding:40px;">
            <h1>Selamat Datang Admin, <?= $this->session->userdata('nama_user'); ?>!</h1>
            <p>Ini adalah halaman dashboard khusus admin.</p>
        </div>
    </div>
</body>
</html>