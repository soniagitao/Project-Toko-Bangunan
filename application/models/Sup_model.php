<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sup_model extends CI_Model {

    public function getAlldatasup(){
		$query=$this->db->get('data_supplier');
		return $query->result_array();
	}

	public function getsupByID($id_sup){
        return $this->db->get_where('data_supplier',['id_sup'=> $id_sup])->row_array();
    }
	
	public function getAlldatanamasup(){
		$query=$this->db->get('data_supplier');
		return $query->result();
	}

	public function getAlldatanamauser(){
		$query=$this->db->get('login');
		return $query->result();
	}
	
	public function tambahdatasup()
	{
		$data= 
		[	
			'id_user' => $this->input->post('id_user',true),
			'nama_sup' => $this->input->post('nama_sup',true),
			'no_telp' => $this->input->post('no_telp',true),
			'alamat' => $this->input->post('alamat',true),
		];
		$this->db->insert('data_supplier',$data);
	}

	public function hapusdatasup($id_sup)
	{
		$this->db->where('id_sup',$id_sup);
		$this->db->delete('data_supplier');
	}
	
	public function cariDataSup()
    {
        $keyword=$this->input->post('keyword');
        $this->db->like('nama_sup', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('data_supplier')->result_array();
	}
	
	public function ubahdatasup($id_sup)
    {
        $data=
        [ 
            'nama_sup' => $this->input->post('nama_sup',true),
			'no_telp' => $this->input->post('no_telp',true),
			'alamat' => $this->input->post('alamat',true),              
        ];
        $this->db->where('id_sup', $this->input->post('id_sup'));
        $this->db->update('data_supplier',$data);
    }

}