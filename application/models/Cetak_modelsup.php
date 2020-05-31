<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_modelsup extends CI_Model{
     public function datatabels(){
        $query= $this->db->order_by('id_sup','DESC')->get('data_supplier');
        return $query->result();
    }

    public function viewsup()
    {
        $this->db->select('nama_sup,no_telp,alamat');
        $query= $this->db->get('data_supplier');
        return $query->result();
    }


}

/* End of file cetak_model.php */

?>