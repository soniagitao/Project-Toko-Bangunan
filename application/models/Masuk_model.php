<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_model extends CI_Model {

    public function getAlldatamasuk(){
		$this->db->select('*');
 		$this->db->from('data_supplier');
 		$this->db->join('barang_masuk','barang_masuk.id_sup = data_supplier.id_sup');
 		$query = $this->db->get();
		return $query->result_array();
	}

	public function getIdnota(){
		$query = $this->db->query("SELECT MAX(id_nota) as idnota from barang_masuk");
		$hasil = $query->row();
		return $hasil->idnota;
	}

	public function tambahdatamasuk()
	{
			$data= 
			[	
				'id_user' => $this->input->post('id_user',true),
				'id_sup' => $this->input->post('id_sup',true),
				'tanggal' => $this->input->post('tanggal',true),
			];
			$this->db->insert('barang_masuk',$data);
	
	}

	// public function save_batch($data){
	// 	return $this->db->insert_batch('detail_barang_masuk', $data);
	// }

	public function tambahdatadetailmasuk()
	{
		$i = 0;
        $a = $this->input->post('jenis_barang');
        $b = $this->input->post('jumlah');
        if ($a[0] !== null) {
            foreach ($a as $row) {
				$data = 
				[
					'id_nota' => $this->getIdnota(),
                    'jenis_barang'=>$row,
                    'jumlah'=>$b[$i],
                ];

                $insert =$this->db->insert('detail_barang_masuk', $data);
                if ($insert) {
                    $i++;
                }
            }
		}
		$arr['success']=true;
		$arr['notif']= '<div class="alert alert-success">
			<i class="fa fa-check"></i> Data Berhasil Disimpan
			</div>';
			return $this->output->set_output(json_encode($arr));

		// $data= 
		// [	
		// 	'id_nota' => $this->getIdnota(),
		// 	'jenis_barang' => $this->input->post('jenis_barang',true),
		// 	'jumlah' => $this->input->post('jumlah',true),
		// ];
		// $this->db->insert('detail_barang_masuk',$data);
	}

	public function hapusdatamasuk($id_nota)
	{
		$this->db->where('id_nota',$id_nota);
		$this->db->delete('barang_masuk');
	}
	
	public function getdatadetailmasukByID($id_nota){
		$this->db->select('*');
		$this->db->from('detail_barang_masuk');
		$this->db->join('barang_masuk', 'barang_masuk.id_nota = detail_barang_masuk.id_nota', 'left');
		$this->db->where('barang_masuk.id_nota', $id_nota);
		return $this->db->get()->result();
	}
	
	public function cariDataMasuk()
	{
		$keyword = $this->input->post('keyword');
		$this->db->select('*');
		$this->db->from("data_supplier");
		$this->db->join('barang_masuk','barang_masuk.id_sup = data_supplier.id_sup');
		$this->db->like('nama_sup', $keyword);
		$this->db->or_like('tanggal', $keyword);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cariDataDetailMasuk($id_nota)
	{
		$keyword = $this->input->post('keyword');
		$this->db->select('*');
		$this->db->from('detail_barang_masuk');
		$this->db->join('barang_masuk', 'barang_masuk.id_nota = detail_barang_masuk.id_nota');
		$this->db->where('barang_masuk.id_nota', $id_nota);
		$this->db->like('jenis_barang', $keyword);
		$this->db->or_like('jumlah', $keyword);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function hitungTotalBarang()
	{
		$this->db->select('jenis_barang, SUM(jumlah) as total');
		$this->db->group_by('jenis_barang');
		$this->db->order_by('total', 'desc');
		$hasil = $this->db->get('detail_barang_masuk');
		return $hasil;
	}
	
}