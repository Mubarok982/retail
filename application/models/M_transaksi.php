<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function simpan($id_pelanggan, $id_user, $keranjang, $total)
    {
        // Simpan ke tabel transaksi
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'id_user' => $id_user,
            'tanggal' => date('Y-m-d H:i:s'),
            'total' => $total
        ];

        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();

        // Simpan detail
        foreach ($keranjang as $item) {
            $detail = [
                'id_transaksi' => $id_transaksi,
                'id_produk' => $item['id_produk'],
                'jumlah' => $item['jumlah'],
                'subtotal' => $item['subtotal']
            ];

            $this->db->insert('transaksi_detail', $detail);

            // Update stok produk
            $this->db->set('stok', 'stok - ' . $item['jumlah'], false);
            $this->db->where('id_produk', $item['id_produk']);
            $this->db->update('produk');
        }
    }

    public function get_riwayat_by_user($id_user)
    {
       return $this->db->select('transaksi.*, pelanggan.nama_pelanggan')
    ->from('transaksi')
    ->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left')
    ->where('transaksi.id_user', $id_user)
    ->order_by('transaksi.tanggal', 'DESC')
    ->get()
    ->result();
    }


    public function get_detail($id)
    {
        $this->db->select('td.*, pr.nama_produk');
        $this->db->from('transaksi_detail td');
        $this->db->join('produk pr', 'pr.id_produk = td.id_produk');
        $this->db->where('td.id_transaksi', $id);
        return $this->db->get()->result();
    }

    public function get_transaksi_by_id($id)
    {
        return $this->db->select('t.*, u.nama_user, p.nama_pelanggan')
            ->from('transaksi t')
            ->join('users u', 'u.id_user = t.id_user')
            ->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan')
            ->where('t.id_transaksi', $id)
            ->get()
            ->row();
    }

    public function get_detail_by_transaksi($id)
    {
        return $this->db->select('d.*, pr.nama_produk')
            ->from('transaksi_detail d')
            ->join('produk pr', 'pr.id_produk = d.id_produk')
            ->where('d.id_transaksi', $id)
            ->get()
            ->result();
    }

    public function get_all_with_detail()
    {
        $this->db->select('t.id_transaksi, t.tanggal, t.total, p.nama_pelanggan, u.nama_user');
        $this->db->from('transaksi t');
        $this->db->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan', 'left');
        $this->db->join('users u', 'u.id_user = t.id_user', 'left');
        $this->db->order_by('t.tanggal', 'DESC');
        return $this->db->get()->result();
    }



    public function get_by_id($id)
    {
        $this->db->select('t.*, p.nama_pelanggan, u.nama_user');
        $this->db->from('transaksi t');
        $this->db->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan', 'left');
        $this->db->join('users u', 'u.id_user = t.id_user', 'left');
        $this->db->where('t.id_transaksi', $id);
        return $this->db->get()->row();
    }


}
