<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Obat extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->isAdminLogin();
	}

	public function index(){
		$data['menu_obat'] = true;

		$data['kategori_obat_list'] = $this->db->query('SELECT *, (SELECT COUNT(*) FROM obat WHERE kategori_obat_id=kategori_obat.id) AS total_obat FROM kategori_obat ORDER BY id DESC')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('kategori_obat_list.php', $data);
		$this->load->view('layouts/footer');
	}

	public function add(){
		$data['menu_obat'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('kategori_obat_add.php');
		$this->load->view('layouts/footer');
	}

	public function add_process(){
		$nama_kategori = $this->input->post('nama_kategori');

		//insert
		$this->db->insert('kategori_obat', array(
			'nama_kategori' => $nama_kategori,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Sukses menambahkan kategori obat.');

		redirect(site_url('/kategori_obat'));
	}

	public function edit($id){
		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$id)->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$data['menu_obat'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('kategori_obat_edit.php', $data);
		$this->load->view('layouts/footer');
	}

	public function edit_process($id){
		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$id)->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$nama_kategori = $this->input->post('nama_kategori');

		//insert
		$this->db->where('id', $id);
		$this->db->update('kategori_obat', array(
			'nama_kategori' => $nama_kategori,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5)
		));

		$this->session->set_flashdata('success_msg', 'Sukses mengubah kategori obat: '.$data['kategori_obat']['nama_kategori'].'.');

		redirect(site_url('/kategori_obat'));
	}

	public function delete($id){
		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$id)->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}
		$nama = $data['kategori_obat']['nama_kategori'];

		//get obat
		$obat_list = $this->db->query('SELECT * FROM obat WHERE kategori_obat_id='.$id)->result_array();
		foreach($obat_list as $obat){
			//delete dosis
			$this->db->query('DELETE FROM dosis_obat WHERE obat_id='.$obat['id']);
		}
		$this->db->query('DELETE FROM obat WHERE kategori_obat_id='.$id);
		$this->db->query('DELETE FROM kategori_obat WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Sukses menghapus kategori obat: '.$nama.'.');

		redirect(site_url('/kategori_obat'));
	}
}
