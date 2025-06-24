<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    public function get_all()
    {
        return $this->db->get('kategori')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('kategori', $data, ['id_kategori' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('kategori', ['id_kategori' => $id]);
    }
}
