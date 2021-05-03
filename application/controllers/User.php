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

		$pasien_list = $this->db->query('SELECT * FROM pasien')->result_array();

		//total pasien
		$data['total_pasien'] = 0;

		//jenis kelamin
		$data['pasien_laki_laki'] = 0;
		$data['pasien_perempuan'] = 0;

		//umur
		$umur_list = array();

		foreach($pasien_list as $pasien){
			//total
			$data['total_pasien']++;

			//get jenis kelamin
			if($pasien['jenis_kelamin']==LAKI_LAKI){
				$data['pasien_laki_laki']++;
			}else{
				$data['pasien_perempuan']++;
			}

			//get umur pasien
			$age = $this->getAge($pasien['tanggal_lahir']);
			if (!array_key_exists($age,$umur_list)){
				//insert new into array
				$umur_list[$age] = 1;
			}else{
				//append
				$umur_list[$age] = $umur_list[$age] +  1;
			}
		}
		$data['umur_list'] = $umur_list;

		$data['riwayat_pasien_list'] = $this->db->query('SELECT * FROM pasien_riwayat pr LEFT JOIN pasien p ON p.id=pr.pasien_id ORDER BY pr.id DESC LIMIT 5')->result_array();
		$data['total_cad'] = $this->db->query('SELECT *, (SELECT COUNT(*) FROM pasien_cad WHERE faktor_resiko_cad=pa.faktor_resiko_cad) AS total FROM pasien_cad pa GROUP BY faktor_resiko_cad')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('dashboard_page.php');
		$this->load->view('layouts/footer');
	}

	public function logout(){
		$this->session->unset_userdata('id_user_apt');
		$this->session->unset_userdata('nama_user_apt');
		redirect(site_url('/user/login'));
	}

	public function getAge($birthDate){
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2]));

		return $age;
	}
}
