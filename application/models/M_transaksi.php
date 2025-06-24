<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function simpan($id_pelanggan, $id_user, $keranjang, $total)
    {
        // Simpan ke tabel transaksi
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'id_user'      => $id_user,
            'tanggal'      => date('Y-m-d H:i:s'),
            'total'        => $total
        ];

        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();

        // Simpan detail
        foreach ($keranjang as $item) {
            $detail = [
                'id_transaksi' => $id_transaksi,
                'id_produk'    => $item['id_produk'],
                'jumlah'       => $item['jumlah'],
                'subtotal'     => $item['subtotal']
            ];

            $this->db->insert('transaksi_detail', $detail);

            // Update stok produk
            $this->db->set('stok', 'stok - '.$item['jumlah'], false);
            $this->db->where('id_produk', $item['id_produk']);
            $this->db->update('produk');
        }
    }

    public function get_riwayat_by_user($id_user)
    {
        return $this->db->select('t.*, p.nama_pelanggan')
                        ->from('transaksi t')
                        ->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan')
                        ->where('t.id_user', $id_user)
                        ->order_by('t.tanggal', 'DESC')
                        ->get()
                        ->result();
    }

    public function get_detail($id_transaksi)
    {
        return $this->db->select('d.*, pr.nama_produk')
                        ->from('transaksi_detail d')
                        ->join('produk pr', 'pr.id_produk = d.id_produk')
                        ->where('d.id_transaksi', $id_transaksi)
                        ->get()
                        ->result();
    }

    

    
}
