<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function isAdminLogin(){
		if($this->session->userdata('id_user_apt')==null){
			redirect(site_url('/user/login'));
		}
	}

	public function isAdminLogout(){
		if($this->session->userdata('id_user_apt')!=null){
			redirect(site_url('/user/dashboard'));
		}
	}
}
?>