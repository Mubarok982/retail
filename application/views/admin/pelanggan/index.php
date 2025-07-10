<?php $this->load->view('templates/sidebar_admin'); ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">

            <!-- Judul -->
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h4><i class="fas fa-user-friends me-2"></i>Data Pelanggan</h4>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
