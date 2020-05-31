<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sup_model');
        $this->load->model('Masuk_model');
        $this->load->model('Keluar_model');

         //validasi level
         if($this->session->userdata('level')!="penjual"){
            redirect('login','refresh');
        }
	}

    public function index()
    {
        $this->load->view("template/header_penjual");
        $this->load->view("penjual/index");
        $this->load->view("template/footer_penjual");
    }

    public function tabelsup()
    {
        $data['sup'] = $this->Sup_model->getAlldatasup();
        if($this->input->post('keyword')){
            $data['sup']=$this->Sup_model->cariDataSup();
        }

        $this->load->view("template/header_penjual");
        $this->load->view("penjual/tabel_sup",$data);
        $this->load->view("template/footer_penjual");
    }

    public function hapusSup($id_sup){
        $this->Sup_model->hapusdatasup($id_sup);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('penjual/tabelsup','refresh');
    }

    public function inputSup(){
        $data['user'] = $this->Sup_model->getAlldatanamauser();
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('nama_sup','nama_sup','required');
        $this->form_validation->set_rules('no_telp','no_telp','required');
        $this->form_validation->set_rules('alamat','alamat','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('template/header_penjual');
            $this->load->view('penjual/input_sup', $data);
            $this->load->view('template/footer_penjual');
        } else{
            $this->Sup_model->tambahdatasup();
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('penjual/tabelsup','refresh');
        }
    }

    public function editSup($id_sup){
        $data['sup']=$this->Sup_model->getsupByID($id_sup);
        $this->form_validation->set_rules('nama_sup','nama_sup','required');
        $this->form_validation->set_rules('no_telp','no_telp','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header_penjual');
            $this->load->view('penjual/input_editSup', $data);
            $this->load->view('template/footer_penjual');
        } else {
            $this->Sup_model->ubahdatasup($id_sup);
            $this->session->set_flashdata('flash-data','diedit');
            redirect('penjual/tabelsup','refresh');
        }
    }

    public function tabelmasuk()
    {
        $data['masuk'] = $this->Masuk_model->getAlldatamasuk();
        if($this->input->post('keyword')){
            $data['masuk']=$this->Masuk_model->cariDataMasuk();
        }

        $this->load->view("template/header_penjual");
        $this->load->view("penjual/tabel_masuk", $data);
        $this->load->view("template/footer_penjual");
    }
    
    public function tabeltotal()
    {
        $data['masuk'] = $this->Masuk_model->hitungTotalBarang();
        if($this->input->post('keyword')){
            $data['masuk']=$this->Masuk_model->cariDataMasuk();
        }

        $this->load->view("template/header_penjual");
        $this->load->view("penjual/tabel_total_masuk", $data);
        $this->load->view("template/footer_penjual");
    }

    public function tabeldetailmasuk($id_nota)
    {
        $data['detailmasuk'] = $this->Masuk_model->getdatadetailmasukByID($id_nota);
        if($this->input->post('keyword')){
            $data['detailmasuk']=$this->Masuk_model->cariDataDetailMasuk($id_nota);
        }
        
        $this->load->view("template/header_penjual");
        $this->load->view("penjual/tabel_detail_masuk", $data);
        $this->load->view("template/footer_penjual");
    }

    public function hapusMasuk($id_nota){
        $this->Masuk_model->hapusdatamasuk($id_nota);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('penjual/tabelmasuk','refresh');
    }
    
    public function inputMasuk(){
        $data['sup'] = $this->Sup_model->getAlldatanamasup();
        $data['user'] = $this->Sup_model->getAlldatanamauser();
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('id_sup','id_sup','required');
        $this->form_validation->set_rules('tanggal','tanggal','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('template/header_penjual');
            $this->load->view('penjual/input_masuk', $data);
            $this->load->view('template/footer_penjual');
        } else{
            $this->Masuk_model->tambahdatamasuk();
            $this->Masuk_model->tambahdatadetailmasuk();
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('penjual/tabelmasuk','refresh');
        }
    }

    public function tabelkeluar()
    {
        $data['keluar'] = $this->Keluar_model->getAlldatakeluar();
        if($this->input->post('keyword')){
            $data['keluar']=$this->Keluar_model->cariDatakeluar();
        }
        $this->load->view("template/header_penjual");
        $this->load->view("penjual/tabel_keluar", $data);
        $this->load->view("template/footer_penjual");
    }

    public function detailKeluar($tanggal_penjualan){
        $data['title']='Detail';
        $data['detailkeluar']=$this->Keluar_model->getAlldatadetail($tanggal_penjualan);
        if($this->input->post('keyword')){
            $data['detailkeluar']=$this->Keluar_model->cariDataDetailKeluar($id_penjualan);
        }

        $this->load->view('template/header_penjual');
        $this->load->view('penjual/tabel_detail_keluar',$data);
        $this->load->view('template/footer_penjual');
    }

    public function inputKeluar(){
        $data['barang'] = $this->Keluar_model->getAlldatabarang();
        $data['user'] = $this->Sup_model->getAlldatanamauser();
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('tanggal_penjualan','tanggal_penjualan','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('template/header_penjual');
            $this->load->view('penjual/input_keluar', $data);
            $this->load->view('template/footer_keluar');
        }else{
            $this->Keluar_model->tambahdatakeluar();
            $this->Keluar_model->tambahdatadetailkeluar();
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('penjual/tabelkeluar','refresh');
        }
    }
    
    // public function formLoop(){

    //         $this->load->view("template/header_penjual");
    //         $this->load->view("penjual/form_loop");
    //         $this->load->view("template/footer_form");
    // }

    // public function save()
    // {
    //     $brg = $_POST['jenis_barang'];
    //     $jml = $_POST['jumlah'];
    //     $data = array();
    //     $index = 0;
    //     foreach ($brg as $jenisbarang) {
    //         array_push($data, array(
    //             'jenis_barang'=>$jenisbarang,
    //             'jumlah'=>$jml[$index],
    //         ));
    //         $index++;
    //     }
    //     $sql = $this->masuk_model->save_batch($data);

    //     if($sql){
    //         echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('penjual/tabeldetailmasuk')."';</script>";    
    //     }else{
    //         echo "<script>alert('Data gagal disimpan');window.location = '".base_url('penjual/formLoop')."';</script>";    
    //     }
    // }

}
