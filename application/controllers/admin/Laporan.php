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

}
