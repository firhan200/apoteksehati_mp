<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->isAdminLogin();
	}

	public function index(){
		$data['menu_pasien'] = true;

		$data['pasien_list'] = $this->db->query('SELECT * FROM pasien ORDER BY id DESC')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('pasien_list.php');
		$this->load->view('layouts/footer');
	}

	public function history($id){
		//validasi
		$data['pasien'] = $this->db->query('SELECT * FROM pasien WHERE id='.$id)->row_array();
		if($data['pasien'] == null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan.');
			redirect(site_url('/pasien'));
		}

		$data['menu_pasien'] = true;

		//get riwayat
		$data['riwayat_list'] = $this->db->query('SELECT * FROM pasien_riwayat WHERE pasien_id='.$id.' ORDER BY id DESC')->result_array();
		$data['lab_list'] = $this->db->query('SELECT pasien_laboratorium.*, laboratorium.jenis_lab FROM pasien_laboratorium LEFT JOIN laboratorium ON laboratorium.id=pasien_laboratorium.laboratorium_id WHERE pasien_id='.$id.' ORDER BY laboratorium.id DESC')->result_array();
		$data['echo_list'] = $this->db->query('SELECT * FROM pasien_echo WHERE pasien_id='.$id.' ORDER BY id DESC')->result_array();
		$data['obat_list'] = $this->db->query('SELECT *, po.id AS main_id FROM pasien_obat po
		LEFT JOIN dosis_obat do ON po.dosis_obat_id=do.id 
		LEFT JOIN obat o ON do.obat_id=o.id
		LEFT JOIN kategori_obat ko ON o.kategori_obat_id=ko.id
		WHERE po.pasien_id='.$id.'')->result_array();

		//lab data
		$data['master_lab'] = $this->db->query('SELECT * FROM laboratorium ORDER BY jenis_lab ASC')->result_array();
		//obat data
		$data['master_kategori_obat'] = $this->db->query('SELECT * FROM kategori_obat ORDER BY nama_kategori ASC')->result_array();
		$data['master_obat'] = $this->db->query('SELECT * FROM obat ORDER BY nama_obat ASC')->result_array();
		$data['master_dosis_obat'] = $this->db->query('SELECT * FROM dosis_obat ORDER BY dosis ASC')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('pasien_history.php');
		$this->load->view('layouts/footer');
	}

	public function add(){
		$data['menu_pasien'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('pasien_add.php');
		$this->load->view('layouts/footer');
	}

	public function add_process(){
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$faktor_resiko_cad = $this->input->post('faktor_resiko_cad');
		$ekg = $this->input->post('ekg');

		//generate no RM
		$last_pasien = $this->db->query('SELECT id FROM pasien ORDER BY id DESC LIMIT 1')->row_array();
		$rm_num = str_pad(1, 4, '0', STR_PAD_LEFT);
		if($last_pasien != null){
			$rm_num = str_pad($last_pasien['id'], 4, '0', STR_PAD_LEFT);
		}
		$no_rm = 'RM-'.$rm_num;

		//insert
		$this->db->insert('pasien', array(
			'nama' => $nama,
			'no_rm' => $no_rm,
			'jenis_kelamin' => $jenis_kelamin,
			'tanggal_lahir' => $tanggal_lahir,
			'alamat' => $alamat,
			'faktor_resiko_cad' => $faktor_resiko_cad,
			'ekg' => $ekg
		));

		$this->session->set_flashdata('success_msg', 'Sukses menambahkan data pasien.');

		redirect(site_url('/pasien'));
	}

	public function edit($id){
		//validasi
		$data['pasien'] = $this->db->query('SELECT * FROM pasien WHERE id='.$id)->row_array();
		if($data['pasien'] == null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan.');
			redirect(site_url('/pasien'));
		}

		$data['menu_pasien'] = true;

		$this->load->view('layouts/header', $data);
		$this->load->view('pasien_edit.php', $data);
		$this->load->view('layouts/footer');
	}

	public function edit_process($id){
		//validasi
		$data['pasien'] = $this->db->query('SELECT * FROM pasien WHERE id='.$id)->row_array();
		if($data['pasien'] == null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan.');
			redirect(site_url('/pasien'));
		}

		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$faktor_resiko_cad = $this->input->post('faktor_resiko_cad');
		$ekg = $this->input->post('ekg');

		//insert
		$this->db->where('id', $id);
		$this->db->update('pasien', array(
			'nama' => $nama,
			'jenis_kelamin' => $jenis_kelamin,
			'tanggal_lahir' => $tanggal_lahir,
			'alamat' => $alamat,
			'faktor_resiko_cad' => $faktor_resiko_cad,
			'ekg' => $ekg
		));

		$this->session->set_flashdata('success_msg', 'Sukses mengubah data pasien: '.$data['pasien']['nama'].'.');

		redirect(site_url('/pasien'));
	}

	public function delete($id){
		//validasi
		$data['pasien'] = $this->db->query('SELECT * FROM pasien WHERE id='.$id)->row_array();
		if($data['pasien'] == null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan.');
			redirect(site_url('/pasien'));
		}
		$nama = $data['pasien']['nama'];

		$this->db->query('DELETE FROM pasien_riwayat WHERE pasien_id='.$id);
		$this->db->query('DELETE FROM pasien_laboratorium WHERE pasien_id='.$id);
		$this->db->query('DELETE FROM pasien_echo WHERE pasien_id='.$id);
		$this->db->query('DELETE FROM pasien_obat WHERE pasien_id='.$id);
		$this->db->query('DELETE FROM pasien WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Sukses menghapus data pasien: '.$nama.'.');

		redirect(site_url('/pasien'));
	}
}
