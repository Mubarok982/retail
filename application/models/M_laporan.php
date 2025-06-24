<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function get_all()
    {
        return $this->db->select('t.id_transaksi, t.tanggal, t.total, 
                                  p.nama_pelanggan, u.nama_user')
                        ->from('transaksi t')
                        ->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan')
                        ->join('users u', 'u.id_user = t.id_user')
                        ->order_by('t.tanggal', 'DESC')
                        ->get()
                        ->result();
    }

    public function get_detail($id_transaksi)
    {
        return $this->db->select('pd.*, pr.nama_produk')
                        ->from('transaksi_detail pd')
                        ->join('produk pr', 'pr.id_produk = pd.id_produk')
                        ->where('pd.id_transaksi', $id_transaksi)
                        ->get()
                        ->result();
    }
}
