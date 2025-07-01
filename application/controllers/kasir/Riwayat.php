<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_transaksi');
        $this->load->model('M_user');
        $this->load->model('M_pelanggan');
        // pastikan kasir login
        if ($this->session->userdata('role') != 'kasir') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Riwayat Transaksi';
        $data['riwayat'] = $this->M_transaksi->get_all_with_detail();
        $this->load->view('kasir/template/header', $data);
        $this->load->view('kasir/transaksi/riwayat', $data);
        $this->load->view('kasir/template/footer');
    }

    public function detail($id) {
        $data['title'] = 'Detail Transaksi';
        $data['detail'] = $this->M_transaksi->get_detail($id);
        $data['transaksi'] = $this->M_transaksi->get_by_id($id);
        $this->load->view('kasir/template/header', $data);
        $this->load->view('kasir/transaksi/detail', $data);
        $this->load->view('kasir/template/footer');
    }
}
