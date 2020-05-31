<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar_model extends CI_Model {
    public function getAlldatakeluar(){
		$this->db->select('*');
		$this->db->from('data_penjualan');
		$this->db->group_by('tanggal_penjualan');
		$query=$this->db->get();
		return $query->result();
	}

	public function getAlldatadetail($tanggal_penjualan)
	{
		$this->db->select('*');
		$this->db->from('data_penjualan');
		$this->db->join('detail_penjualan', 'data_penjualan.id_penjualan = detail_penjualan.id_penjualan');
		$this->db->join('detail_barang_masuk','detail_penjualan.id_barang = detail_barang_masuk.id_barang');
		$this->db->where('data_penjualan.tanggal_penjualan', $tanggal_penjualan);
		return $this->db->get()->result();
	}

	public function getAlldatabarang(){
		$query=$this->db->get('detail_barang_masuk');
		return $query->result();
	}

	public function getIdpenjualan(){
		$query = $this->db->query("SELECT MAX(id_penjualan) as idpenjualan from data_penjualan");
		$hasil = $query->row();
		return $hasil->idpenjualan;
	}
	
	public function tambahdatakeluar()
	{
		$data=
		[	
			'id_user' => $this->input->post('id_user',true),
			'tanggal_penjualan' => $this->input->post('tanggal_penjualan',true),
		];
		$this->db->insert('data_penjualan',$data);
	}

	public function tambahdatadetailkeluar()
	{
		$i = 0;
        $a = $this->input->post('id_barang');
        $b = $this->input->post('jumlah_jual');
        if ($a[0] !== null) {
            foreach ($a as $row1) {
				$data = 
				[
					'id_penjualan' => $this->getIdPenjualan(),
                    'id_barang'=>$row1,
                    'jumlah_jual'=>$b[$i],
                ];

				$insert =$this->db->insert('detail_penjualan', $data);
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
		// 	'id_penjualan' => $this->getIdpenjualan(),
		// 	'id_barang' => $this->input->post('id_barang',true),
		// 	'jumlah_jual' => $this->input->post('jumlah_jual',true),
		// ];
		// $this->db->insert('detail_penjualan',$data);
	}
	
	public function cariDataKeluar()
    {
        $keyword=$this->input->post('keyword');
        $this->db->like('tanggal_penjualan', $keyword);
        return $this->db->get('data_penjualan')->result_array();
    }
    
    public function cariDataDetailKeluar($id_penjualan)
	{
		$keyword = $this->input->post('keyword');
		$this->db->select('*');
		$this->db->from('data_penjualan');
		$this->db->join('detail_penjualan', 'data_penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
		$this->db->join('detail_barang_masuk','detail_penjualan.id_barang = detail_barang_masuk.id_barang');
		$this->db->where('data_penjualan.id_penjualan', $id_penjualan);
		$this->db->like('jenis_barang', $keyword);
		$this->db->or_like('jumlah_jual', $keyword);
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file keluar_model.php */


?>