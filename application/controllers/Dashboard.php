<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Cek apakah user sudah login
        if (!$this->session->userdata('login')) {
            redirect('auth'); // redirect ke login jika belum login
        }
    }

    public function index()
    {
        $role = $this->session->userdata('role');

        if ($role === 'admin') {
            $this->load->view('dashboard/admin');
        } elseif ($role === 'kasir') {
            $this->load->view('dashboard/kasir');
        } else {
            show_error('Role tidak dikenali!');
        }
    }
}
