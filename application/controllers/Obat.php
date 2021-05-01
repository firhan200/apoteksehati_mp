<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->isAdminLogin();
	}

	public function index($kategori_obat_id){
		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$kategori_obat_id)->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$data['menu_obat'] = true;

		$data['obat_list'] = $this->db->query('SELECT *, (SELECT COUNT(*) FROM dosis_obat WHERE obat_id=obat.id) as total_dosis FROM obat WHERE kategori_obat_id='.$kategori_obat_id.' ORDER BY id DESC')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('obat_list.php', $data);
		$this->load->view('layouts/footer');
	}

	public function add($kategori_obat_id){
		//validasi
		$data['kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat WHERE id='.$kategori_obat_id)->row_array();
		if($data['kategori_obat'] == null){
			$this->session->set_flashdata('error_msg', 'Kategori obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$data['menu_obat'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('obat_add.php');
		$this->load->view('layouts/footer');
	}

	public function add_process($kategori_obat_id){
		$nama_obat = $this->input->post('nama_obat');

		//insert
		$this->db->insert('obat', array(
			'nama_obat' => $nama_obat,
			'kategori_obat_id' => $kategori_obat_id,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Sukses menambahkan obat.');

		redirect(site_url('/obat/index/'.$kategori_obat_id));
	}

	public function edit($id){
		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$id)->row_array();
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
		$this->load->view('obat_edit.php', $data);
		$this->load->view('layouts/footer');
	}

	public function edit_process($id){
		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$id)->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}

		$nama_obat = $this->input->post('nama_obat');

		//insert
		$this->db->where('id', $id);
		$this->db->update('obat', array(
			'nama_obat' => $nama_obat,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5)
		));

		$this->session->set_flashdata('success_msg', 'Sukses mengubah obat: '.$data['obat']['nama_obat'].'.');

		redirect(site_url('/obat/index/'.$data['obat']['kategori_obat_id']));
	}

	public function delete($id){
		//validasi
		$data['obat'] = $this->db->query('SELECT * FROM obat WHERE id='.$id)->row_array();
		if($data['obat'] == null){
			$this->session->set_flashdata('error_msg', 'Obat tidak ditemukan.');
			redirect(site_url('/kategori_obat'));
		}
		$nama = $data['obat']['nama_obat'];
		$kategori_obat_id = $data['obat']['kategori_obat_id'];

		$this->db->query('DELETE FROM dosis_obat WHERE obat_id='.$id);
		$this->db->query('DELETE FROM obat WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Sukses menghapus obat: '.$nama.'.');

		redirect(site_url('/obat/index/'.$kategori_obat_id));
	}
}
