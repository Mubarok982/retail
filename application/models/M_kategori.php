<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    public function get_all()
    {
        return $this->db->get('kategori')->result();
    }
}
