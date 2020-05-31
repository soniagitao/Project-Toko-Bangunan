<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Progress extends CI_Controller {

    public function index()
    {
        $this->load->view("template/header_penjual");
        $this->load->view("penjual/progress");
        $this->load->view("template/footer_penjual");
    }

}

/* End of file progress.php */


?>