<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosis_Obat extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->isAdminLogin();
	}

	public function index($obat_id){
		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$obat_id)->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$data['obat']['kategori_obat_id'])->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$data['menu_obat'] = true;

		$data['dosis_obat_list'] = $this->db->query('SELECT * FROM dosis_obat WHERE obat_id='.$obat_id.' ORDER BY id DESC')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('dosis_obat_list.php', $data);
		$this->load->view('layouts/footer');
	}

	public function add($obat_id){
		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$obat_id)->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$data['obat']['kategori_obat_id'])->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$data['menu_obat'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('dosis_obat_add.php');
		$this->load->view('layouts/footer');
	}

	public function add_process($obat_id){
		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$obat_id)->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$dosis = $this->input->post('dosis');

		//insert
		$this->db->insert('dosis_obat', array(
			'dosis' => $dosis,
			'obat_id' => $obat_id,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Sukses menambahkan dosis obat: '.$data['obat']['nama_obat']);

		redirect(site_url('/dosis_obat/index/'.$obat_id));
	}

	public function edit($id){
		//validasi
		$data['dosis_obat'] = $this->db->query('SELECT * FROM dosis_obat WHERE id='.$id)->row_array();
		if($data['dosis_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Dosis obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$data['dosis_obat']['obat_id'])->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$data['obat']['kategori_obat_id'])->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$data['menu_obat'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('dosis_obat_edit.php', $data);
		$this->load->view('layouts/footer');
	}

	public function edit_process($id){
		//validasi
		$data['dosis_obat'] = $this->db->query('SELECT * FROM dosis_obat WHERE id='.$id)->row_array();
		if($data['dosis_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Dosis obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$data['dosis_obat']['obat_id'])->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$data['obat']['kategori_obat_id'])->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$dosis = $this->input->post('dosis');

		//insert
		$this->db->where('id', $id);
		$this->db->update('dosis_obat', array(
			'dosis' => $dosis,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5)
		));

		$this->session->set_flashdata('success_msg', 'Sukses mengubah dosis obat: '.$data['dosis_obat']['dosis'].'.');

		redirect(site_url('/dosis_obat/index/'.$data['dosis_obat']['obat_id']));
	}

	public function delete($id){
		//validasi
		$data['dosis_obat'] = $this->db->query('SELECT * FROM dosis_obat WHERE id='.$id)->row_array();
		if($data['dosis_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Dosis tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}
		$nama = $data['dosis_obat']['dosis'];
		$obat_id = $data['dosis_obat']['obat_id'];

		$this->db->query('DELETE FROM dosis_obat WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Sukses menghapus dosis obat: '.$nama.'.');

		redirect(site_url('/dosis_obat/index/'.$obat_id));
	}
}
