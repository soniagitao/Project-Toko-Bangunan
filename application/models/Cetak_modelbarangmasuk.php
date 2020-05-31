<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_modelbarangmasuk extends CI_Model{

   public function datatabelsbarangmasuk(){
		$this->db->select('id_barang,tanggal,nama_sup,jenis_barang,jumlah');
		$this->db->from('data_supplier');
        $this->db->join('barang_masuk','barang_masuk.id_sup = data_supplier.id_sup');
        $this->db->join('detail_barang_masuk','barang_masuk.id_nota = detail_barang_masuk.id_nota');
 		$query = $this->db->get();
		return $query->result_array();
	}
    public function viewbarangmasuk()
    {
        $this->db->select('id_barang,tanggal,nama_sup,jenis_barang,jumlah');
		$this->db->from('data_supplier');
        $this->db->join('barang_masuk','barang_masuk.id_sup = data_supplier.id_sup');
        $this->db->join('detail_barang_masuk','barang_masuk.id_nota = detail_barang_masuk.id_nota');
 		$query = $this->db->get();
         return $query->result_array();
    }

}

/* End of file cetak_model.php */

?>