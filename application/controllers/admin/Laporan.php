<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');
    }

    public function index()
    {
        $data['laporan'] = $this->M_laporan->get_all();

        $this->load->view('templates/header');
        $this->load->view('admin/laporan/index', $data);
    }

    public function detail($id)
{
    $this->load->model('M_transaksi');
    $data['kasir'] = $this->M_transaksi->get_transaksi_by_id($id);
    $data['detail'] = $this->M_transaksi->get_detail_by_transaksi($id);

    $this->load->view('admin/laporan/detail', $data);
}

public function hapus($id)
{
    $this->load->model('M_transaksi');
    $this->M_transaksi->hapus_transaksi($id);
    $this->session->set_flashdata('success', 'Laporan berhasil dihapus.');
    redirect('admin/laporan');
}

public function export_excel()
{
    $this->load->model('M_transaksi');
    $laporan = $this->M_transaksi->get_all_with_detail();

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

    echo "No\tTanggal\tPelanggan\tKasir\tTotal\n";

    $no = 1;
    foreach ($laporan as $row) {
        echo $no++ . "\t" .
             date('d-m-Y H:i', strtotime($row->tanggal)) . "\t" . 
             $row->nama_pelanggan . "\t" .
             $row->nama_user . "\t" .
             $row->total . "\n";
    }
}
}
