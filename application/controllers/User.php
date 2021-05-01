<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function login()
	{
		$this->isAdminLogout();

		$this->load->view('login_page');
	}

	public function login_process(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		//cek db
		$user = $this->db->query('SELECT * FROM user WHERE email="'.$email.'"')->row_array();
		if($user == null){
			$this->session->set_flashdata('err', 'Akun tidak ditemukan');
			redirect(site_url('/user/login?error=1'));
			return;
		}

		if($user['password'] != sha1($password)){
			$this->session->set_flashdata('err', 'Kata Sandi tidak cocok');
			redirect(site_url('/user/login?error=2'));
			return;
		}

		//set session
		$this->session->set_userdata('id_user_apt', $user['id']);
		$this->session->set_userdata('nama_user_apt', $user['nama']);

		redirect(site_url('/user/dashboard'));
	}

	public function dashboard(){
		$this->isAdminLogin();
		$data['menu_home'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('dashboard_page.php');
		$this->load->view('layouts/footer');
	}

	public function logout(){
		$this->session->unset_userdata('id_user_apt');
		$this->session->unset_userdata('nama_user_apt');
		redirect(site_url('/user/login'));
	}
}
