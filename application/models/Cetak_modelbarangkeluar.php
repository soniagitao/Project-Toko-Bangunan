<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_modelbarangkeluar extends CI_Model{

    public function datatabelsbarangkeluar(){
        $this->db->select('nama_sup ,tanggal_penjualan,jenis_barang, jumlah_jual');
		$this->db->from('detail_penjualan, barang_masuk');
        $this->db->join('detail_barang_masuk','detail_barang_masuk.id_barang = detail_penjualan.id_barang');
        $this->db->join('data_penjualan','detail_penjualan.id_penjualan = data_penjualan.id_penjualan');
        $this->db->join('data_supplier','data_supplier.id_sup = barang_masuk.id_sup');
 		$query = $this->db->get();
		return $query->result_array();
	}
    
    
    public function viewbarangkeluar()
    { 
        $this->db->select('nama_sup ,tanggal_penjualan,jenis_barang, jumlah_jual');
		$this->db->from('detail_penjualan, barang_masuk');
        $this->db->join('detail_barang_masuk','detail_barang_masuk.id_barang = detail_penjualan.id_barang');
        $this->db->join('data_penjualan','detail_penjualan.id_penjualan = data_penjualan.id_penjualan');
        $this->db->join('data_supplier','data_supplier.id_sup = barang_masuk.id_sup');
 		$query = $this->db->get();
		return $query->result_array();
    }



}

/* End of file cetak_model.php */

?>