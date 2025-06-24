<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function get_all()
    {
        return $this->db->get('users')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('users', $data, ['id_user' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('users', ['id_user' => $id]);
    }
}
