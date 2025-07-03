<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_transaksi');
        $this->load->model('M_user');
        $this->load->model('M_pelanggan');

        // Pastikan hanya kasir yang bisa mengakses
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('auth');
        }
    }

    public function index() {
        $data['riwayat'] = $this->M_transaksi->get_all_with_detail();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/riwayat/index', $data);
    }

    public function detail($id) {
        $data['detail'] = $this->M_transaksi->get_detail($id);
        $data['transaksi'] = $this->M_transaksi->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/transaksi/detail', $data);
    }
}
