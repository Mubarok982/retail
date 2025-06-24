<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db
                    ->where('username', $username)
                    ->where('password', $password) 
                    ->get('users')
                    ->row();
    }
}
