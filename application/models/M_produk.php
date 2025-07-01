<?php
class M_produk extends CI_Model
{

    public function get_all()
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_produk', $id)->update('produk', $data);
    }


    public function delete($id)
    {
        return $this->db->delete('produk', ['id_produk' => $id]);
    }

    public function get_by_kategori($kategori_id)
    {
        $this->db->where('produk.id_kategori', $kategori_id);
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        return $this->db->get('produk')->result();
    }

    public function get_filtered($kategori_id = null, $min_harga = null, $max_harga = null)
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');

        if ($kategori_id) {
            $this->db->where('produk.id_kategori', $kategori_id);
        }
        if ($min_harga !== null && $min_harga !== '') {
            $this->db->where('produk.harga >=', $min_harga);
        }
        if ($max_harga !== null && $max_harga !== '') {
            $this->db->where('produk.harga <=', $max_harga);
        }

        return $this->db->get()->result();
    }
}