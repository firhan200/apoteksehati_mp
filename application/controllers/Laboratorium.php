<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->isAdminLogin();
	}

	public function index(){
		$data['menu_lab'] = true;

		$data['lab_list'] = $this->db->query('SELECT * FROM laboratorium ORDER BY id DESC')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('laboratorium_list.php', $data);
		$this->load->view('layouts/footer');
	}

	public function add(){
		$data['menu_lab'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('laboratorium_add.php');
		$this->load->view('layouts/footer');
	}

	public function add_process(){
		$jenis_lab = $this->input->post('jenis_lab');

		//insert
		$this->db->insert('laboratorium', array(
			'jenis_lab' => $jenis_lab,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Sukses menambahkan Laboratorium.');

		redirect(site_url('/laboratorium'));
	}

	public function edit($id){
		//validasi
		$data['laboratorium'] = $this->db->query('SELECT * FROM laboratorium WHERE id='.$id)->row_array();
		if($data['laboratorium'] == null){
			$this->session->set_flashdata('error_msg', 'Laboratorium tidak ditemukan.');
			redirect(site_url('/laboratorium'));
		}

		$data['menu_lab'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('laboratorium_edit.php', $data);
		$this->load->view('layouts/footer');
	}

	public function edit_process($id){
		//validasi
		$data['laboratorium'] = $this->db->query('SELECT * FROM laboratorium WHERE id='.$id)->row_array();
		if($data['laboratorium'] == null){
			$this->session->set_flashdata('error_msg', 'Laboratorium tidak ditemukan.');
			redirect(site_url('/laboratorium'));
		}

		$jenis_lab = $this->input->post('jenis_lab');

		//insert
		$this->db->where('id', $id);
		$this->db->update('laboratorium', array(
			'jenis_lab' => $jenis_lab,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5)
		));

		$this->session->set_flashdata('success_msg', 'Sukses mengubah laboratorium: '.$data['laboratorium']['jenis_lab'].'.');

		redirect(site_url('/laboratorium'));
	}

	public function delete($id){
		//validasi
		$data['laboratorium'] = $this->db->query('SELECT * FROM laboratorium WHERE id='.$id)->row_array();
		if($data['laboratorium'] == null){
			$this->session->set_flashdata('error_msg', 'Laboratorium tidak ditemukan.');
			redirect(site_url('/laboratorium'));
		}
		$nama = $data['laboratorium']['jenis_lab'];

		$this->db->query('DELETE FROM laboratorium WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Sukses menghapus laboratorium: '.$nama.'.');

		redirect(site_url('/laboratorium'));
	}
}
