<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggan');
    }
     public function index()
    {
        $data['pelanggan'] = $this->M_pelanggan->get_all();
        $this->load->view('templates/header');
        $this->load->view('admin/pelanggan/index', $data);
    }
}
