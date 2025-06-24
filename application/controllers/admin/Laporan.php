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
}
