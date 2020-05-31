<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Cetak_modelbarangmasuk');
        $this->load->model('Cetak_modelbarangkeluar');
        $this->load->model('Cetak_modelsup');
        $this->load->model('Login_model');
        $this->load->model('Sup_model');
        $this->load->model('masuk_model');
        $this->load->model('keluar_model');
//validasi level
        if($this->session->userdata('level')!="owner"){
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data = array(
            'title'=>'data sup',
            'title2'=>'data masuk',
            'title3'=>'detail data masuk',
            'title4'=>'barang keluar',
            'title5'=>'detail data keluar',
            'sup'=>$this->Cetak_modelsup->datatabels(),
            'masuk'=> $this->Cetak_modelbarangmasuk->datatabelsbarangmasuk(),
            'keluar'=> $this->Cetak_modelbarangkeluar->datatabelsbarangkeluar(),
        );
        $this->load->view('template/header_owner',$data);
        $this->load->view('owner/index',$data);
        $this->load->view('template/footer_owner',$data);
    }
    public function exportsup(){
        // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Supplier.xls");
        
        $data['sup'] = $this->Cetak_modelsup->viewsup();
        $this->load->view('owner/exportsup', $data);
    }
    public function laporan_pdfsup(){
        $this->load->library('pdf');

        $this->load->model('Cetak_modelsup');
        $data['sup']= $this->Cetak_modelsup->viewsup();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','landscape');
        $this->pdf->filename="laporansupplier.pdf";
        $this->pdf->load_view('owner/laporansup', $data);
    }
    public function exportbarangmasuk(){
        // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Barang masuk.xls");
        
        $data['masuk'] = $this->Cetak_modelbarangmasuk->viewbarangmasuk();
        $this->load->view('owner/exportbarangmasuk', $data);
    }
    public function laporan_pdfbarangmasuk(){
        $this->load->library('pdf');

        $this->load->model('Cetak_modelbarangmasuk');
        $data['masuk']= $this->Cetak_modelbarangmasuk->viewbarangmasuk();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','landscape');
        $this->pdf->filename="laporanbarangmasuk.pdf";
        $this->pdf->load_view('owner/laporanbarangmasuk', $data);
    }
   public function exportbarangkeluar(){
        // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Barang keluar.xls");
        
        $data['keluar'] = $this->Cetak_modelbarangkeluar->viewbarangkeluar();
        $this->load->view('owner/exportbarangkeluar', $data);
    }
    
    public function laporan_pdfbarangkeluar(){
        $this->load->library('pdf');

        $this->load->model('Cetak_modelbarangkeluar');
        $data['keluar']= $this->Cetak_modelbarangkeluar->viewbarangkeluar();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','landscape');
        $this->pdf->filename="laporanbarangkeluar.pdf";
        $this->pdf->load_view('owner/laporanbarangkeluar', $data);
    }
    
}


/* End of file owner.php */
