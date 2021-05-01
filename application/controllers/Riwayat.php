<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function add_process($pasien_id){
		//validasi pasien
		$pasien = $this->db->query('SELECT * FROM pasien WHERE id='.$pasien_id)->row_array();
		if($pasien==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$tanggal_masuk = $this->input->post('tanggal_masuk');
		$alasan_dirawat = $this->input->post('alasan_dirawat');

		$this->db->insert('pasien_riwayat', array(
			'pasien_id' => $pasien_id,
			'tanggal_masuk' => $tanggal_masuk,
			'alasan_dirawat' => $alasan_dirawat,
		));

		$this->session->set_flashdata('success_msg', 'Berhasil menambahkan riwayat pasien');

		redirect(site_url('/pasien/history/'.$pasien_id));
	}

	public function edit_process($id){
		//validasi
		$pasien_riwayat = $this->db->query('SELECT * FROM pasien_riwayat WHERE id='.$id)->row_array();
		if($pasien_riwayat==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$tanggal_masuk = $this->input->post('tanggal_masuk');
		$alasan_dirawat = $this->input->post('alasan_dirawat');

		$this->db->where('id', $id);
		$this->db->update('pasien_riwayat', array(
			'tanggal_masuk' => $tanggal_masuk,
			'alasan_dirawat' => $alasan_dirawat,
		));

		$this->session->set_flashdata('success_msg', 'Berhasil mengubah riwayat pasien');

		redirect(site_url('/pasien/history/'.$pasien_riwayat['pasien_id']));
	}

	public function delete($id){
		//validasi
		$pasien_riwayat = $this->db->query('SELECT * FROM pasien_riwayat WHERE id='.$id)->row_array();
		if($pasien_riwayat==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$this->db->query('DELETE FROM pasien_riwayat WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Berhasil menghapus riwayat pasien');

		redirect(site_url('/pasien/history/'.$pasien_riwayat['pasien_id']));
	}

	public function add_lab_process($pasien_id){
		//validasi pasien
		$pasien = $this->db->query('SELECT * FROM pasien WHERE id='.$pasien_id)->row_array();
		if($pasien==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$laboratorium_id = $this->input->post('laboratorium_id');
		$tanggal_lab = $this->input->post('tanggal_lab');
		$hasil_lab = $this->input->post('hasil_lab');

		$this->db->insert('pasien_laboratorium', array(
			'pasien_id' => $pasien_id,
			'laboratorium_id' => $laboratorium_id,
			'tanggal_lab' => $tanggal_lab,
			'hasil_lab' => $hasil_lab,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Berhasil menambahkan riwayat laboratorium pasien');

		redirect(site_url('/pasien/history/'.$pasien_id));
	}

	public function edit_lab_process($id){
		//validasi
		$pasien_laboratorium = $this->db->query('SELECT * FROM pasien_laboratorium WHERE id='.$id)->row_array();
		if($pasien_laboratorium==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$laboratorium_id = $this->input->post('laboratorium_id');
		$tanggal_lab = $this->input->post('tanggal_lab');
		$hasil_lab = $this->input->post('hasil_lab');

		$this->db->where('id', $id);
		$this->db->update('pasien_laboratorium', array(
			'laboratorium_id' => $laboratorium_id,
			'tanggal_lab' => $tanggal_lab,
			'hasil_lab' => $hasil_lab,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Berhasil mengubah riwayat laboratorium pasien');

		redirect(site_url('/pasien/history/'.$pasien_laboratorium['pasien_id']));
	}

	public function delete_lab($id){
		//validasi
		$pasien_laboratorium = $this->db->query('SELECT * FROM pasien_laboratorium WHERE id='.$id)->row_array();
		if($pasien_laboratorium==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$this->db->query('DELETE FROM pasien_laboratorium WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Berhasil menghapus riwayat laboratorium pasien');

		redirect(site_url('/pasien/history/'.$pasien_laboratorium['pasien_id']));
	}

	public function add_echo_process($pasien_id){
		//validasi pasien
		$pasien = $this->db->query('SELECT * FROM pasien WHERE id='.$pasien_id)->row_array();
		if($pasien==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$tanggal_echo = $this->input->post('tanggal_echo');
		$EF = $this->input->post('EF');
		$EA = $this->input->post('EA');
		$TAPSE = $this->input->post('TAPSE');
		$masalah_katup = $this->input->post('masalah_katup');
		$hipertensi_plumonal = $this->input->post('hipertensi_plumonal');

		$this->db->insert('pasien_echo', array(
			'pasien_id' => $pasien_id,
			'tanggal_echo' => $tanggal_echo,
			'EF' => $EF,
			'EA' => $EA,
			'TAPSE' => $TAPSE,
			'masalah_katup' => $masalah_katup,
			'hipertensi_plumonal' => $hipertensi_plumonal,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Berhasil menambahkan riwayat echo pasien');

		redirect(site_url('/pasien/history/'.$pasien_id));
	}

	public function edit_echo_process($id){
		//validasi
		$pasien_echo = $this->db->query('SELECT * FROM pasien_echo WHERE id='.$id)->row_array();
		if($pasien_echo==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$tanggal_echo = $this->input->post('tanggal_echo');
		$EF = $this->input->post('EF');
		$EA = $this->input->post('EA');
		$TAPSE = $this->input->post('TAPSE');
		$masalah_katup = $this->input->post('masalah_katup');
		$hipertensi_plumonal = $this->input->post('hipertensi_plumonal');

		$this->db->where('id', $id);
		$this->db->update('pasien_echo', array(
			'tanggal_echo' => $tanggal_echo,
			'EF' => $EF,
			'EA' => $EA,
			'TAPSE' => $TAPSE,
			'masalah_katup' => $masalah_katup,
			'hipertensi_plumonal' => $hipertensi_plumonal,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Berhasil mengubah riwayat echo pasien');

		redirect(site_url('/pasien/history/'.$pasien_echo['pasien_id']));
	}

	public function delete_echo($id){
		//validasi
		$pasien_echo = $this->db->query('SELECT * FROM pasien_echo WHERE id='.$id)->row_array();
		if($pasien_echo==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$this->db->query('DELETE FROM pasien_echo WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Berhasil menghapus riwayat echo pasien');

		redirect(site_url('/pasien/history/'.$pasien_echo['pasien_id']));
	}
}
