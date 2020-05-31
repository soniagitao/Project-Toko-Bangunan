<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation','recaptcha'));
	}

	public function index()
	{
        $data['title'] = 'login';
        $data = array (
			'action' => site_url('login'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'captcha' => $this->recaptcha->getWidget(),
			'script_captcha' => $this->recaptcha->getScriptTag(),
		);

       // load view admin/overview.php
        $this->load->view("template/header_login", $data, FALSE);
        $this->load->view("login/index", $data, FALSE);
        $this->load->view("template/footer_login", $data, FALSE);
    }
    
    public function proses_login(){
        $username=$this->input->post('uname1');
        $password=$this->input->post('pwd1');
        $recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);

        $ceklogin=$this->login_model->login($username, $password);

        if($ceklogin){
            foreach($ceklogin as $row);
            $this->session->set_userdata('user', $row->username);
            $this->session->set_userdata('level', $row->level);

            if($this->session->userdata('level')=="penjual"){
                redirect('penjual');
            }
            elseif($this->session->userdata('level')=="owner"){
                redirect('owner');
            }
        }elseif ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true){
            $this->index();
        }
        else{
            $data['pesan']="username dan password anda salah";
            $this->load->view('template/header_login',$data);
            $this->load->view('login/index');
            $this->load->view('template/footer_login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        
        redirect('login','refresh');
      }
}