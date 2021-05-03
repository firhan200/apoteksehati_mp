<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Riwayat extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function meninggal($pasien_id){
		//validasi pasien
		$pasien = $this->db->query('SELECT * FROM pasien WHERE id='.$pasien_id)->row_array();
		if($pasien==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$tanggal_meninggal = $this->input->post('tanggal_meninggal');

		$this->db->where('id', $pasien_id);
		$this->db->update('pasien', array(
			'tanggal_meninggal' => $tanggal_meninggal,
		));

		$this->session->set_flashdata('success_msg', 'Pasien di identifikasikan meninggal');

		redirect(site_url('/pasien/history/'.$pasien_id));
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

	public function add_obat_process($pasien_id){
		//validasi pasien
		$pasien = $this->db->query('SELECT * FROM pasien WHERE id='.$pasien_id)->row_array();
		if($pasien==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$dosis_obat_id = $this->input->post('dosis_obat_id');
		$tanggal_diberikan = $this->input->post('tanggal_diberikan');

		$this->db->insert('pasien_obat', array(
			'pasien_id' => $pasien_id,
			'dosis_obat_id' => $dosis_obat_id,
			'tanggal_diberikan' => $tanggal_diberikan,
			'created_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Berhasil menambahkan riwayat obat pasien');

		redirect(site_url('/pasien/history/'.$pasien_id));
	}

	public function edit_obat_process($id){
		//validasi
		$pasien_obat = $this->db->query('SELECT * FROM pasien_obat WHERE id='.$id)->row_array();
		if($pasien_obat==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$tanggal_diberikan = $this->input->post('tanggal_diberikan');
		$dosis_obat_id = $this->input->post('dosis_obat_id');

		$this->db->where('id', $id);
		$this->db->update('pasien_obat', array(
			'tanggal_diberikan' => $tanggal_diberikan,
			'dosis_obat_id' => $dosis_obat_id,
			'updated_at' => date('Y-m-d H:i:s', time() + 3600 * 5),
		));

		$this->session->set_flashdata('success_msg', 'Berhasil mengubah riwayat obat pasien');

		redirect(site_url('/pasien/history/'.$pasien_obat['pasien_id']));
	}

	public function delete_obat($id){
		//validasi
		$pasien_obat = $this->db->query('SELECT * FROM pasien_obat WHERE id='.$id)->row_array();
		if($pasien_obat==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$this->db->query('DELETE FROM pasien_obat WHERE id='.$id);

		$this->session->set_flashdata('success_msg', 'Berhasil menghapus riwayat obat pasien');

		redirect(site_url('/pasien/history/'.$pasien_obat['pasien_id']));
	}

	public function unduh($pasien_id){
		//validasi
		$pasien = $this->db->query('SELECT * FROM pasien WHERE id='.$pasien_id)->row_array();
		if($pasien==null){
			$this->session->set_flashdata('error_msg', 'Pasien tidak ditemukan');
			redirect(site_url('/pasien'));
		}

		$filename = 'riwayat-pasien-'.$pasien['no_rm'].'.xlsx';

		$styleArray = array(
			'font' => [
				'bold' => true
			]
		);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A2', 'NO. RM');
		$sheet->setCellValue('B2', $pasien['no_rm']);

		$sheet->setCellValue('A3', 'NAMA PASIEN');
		$sheet->setCellValue('B3', $pasien['nama']);

		$sheet->setCellValue('A4', 'JENIS KELAMIN');
		$sheet->setCellValue('B4', $pasien['jenis_kelamin']==LAKI_LAKI ? 'Laki-laki' : 'Perempuan');

		$sheet->setCellValue('A5', 'TANGGAL LAHIR');
		$sheet->setCellValue('B5', $pasien['tanggal_lahir']);

		$sheet->setCellValue('A6', 'UMUR');
		$sheet->setCellValue('B6', $this->getAge($pasien['tanggal_lahir']).' Th');

		$sheet->setCellValue('A7', 'ALAMAT');
		$sheet->setCellValue('B7', $pasien['alamat']);

		$sheet->setCellValue('A9', 'FAKTOR RESIKO CAD');
		$cads = $this->db->query('SELECT * FROM pasien_cad WHERE pasien_id='.$pasien_id)->result_array();
		foreach($cads as $index => $cad){
			$cadCol = chr(substr("000".(($index + 1)+65),-3));
			$sheet->setCellValue($cadCol.'9', $cad['faktor_resiko_cad']);
		}

		$sheet->setCellValue('A11', 'EKG');
		$sheet->setCellValue('B11', $pasien['ekg']);

		//get riwayat
		$data['riwayat_list'] = $this->db->query('SELECT * FROM pasien_riwayat WHERE pasien_id='.$pasien_id.' ORDER BY id DESC')->result_array();
		$data['lab_list'] = $this->db->query('SELECT pasien_laboratorium.*, laboratorium.jenis_lab FROM pasien_laboratorium LEFT JOIN laboratorium ON laboratorium.id=pasien_laboratorium.laboratorium_id WHERE pasien_id='.$pasien_id.' ORDER BY laboratorium.id DESC')->result_array();
		$data['echo_list'] = $this->db->query('SELECT * FROM pasien_echo WHERE pasien_id='.$pasien_id.' ORDER BY id DESC')->result_array();
		$data['obat_list'] = $this->db->query('SELECT *, po.id AS main_id FROM pasien_obat po
		LEFT JOIN dosis_obat do ON po.dosis_obat_id=do.id 
		LEFT JOIN obat o ON do.obat_id=o.id
		LEFT JOIN kategori_obat ko ON o.kategori_obat_id=ko.id
		WHERE po.pasien_id='.$pasien_id.'')->result_array();

		/* RIWAYAT */
		$sheet->setCellValue('A13', 'RIWAYAT');
		$sheet->setCellValue('A14', 'Tanggal Masuk');
		$sheet->setCellValue('B14', 'Alasan Dirawat');

		$riwayatCounter = 15;
		foreach($data['riwayat_list'] as $riwayat){
			$sheet->setCellValue('A'.$riwayatCounter, $riwayat['tanggal_masuk']);
			$sheet->setCellValue('B'.$riwayatCounter, $riwayat['alasan_dirawat']);

			$riwayatCounter++;
		}
		/* RIWAYAT */

		/* LAB */
		$labCounter = $riwayatCounter;
		$labCounter++;
		$sheet->setCellValue('A'.$labCounter, 'LABORATORIUM');
		$labCounter++;
		$sheet->setCellValue('A'.$labCounter, 'Tanggal Lab');
		$sheet->setCellValue('B'.$labCounter, 'Jenis Lab');
		$sheet->setCellValue('C'.$labCounter, 'Hasil Lab');
		$spreadsheet->getActiveSheet()->getStyle('A'.$labCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('B'.$labCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('C'.$labCounter)->applyFromArray($styleArray);

		$labCounter++;
		foreach($data['lab_list'] as $lab){
			$sheet->setCellValue('A'.$labCounter, $lab['tanggal_lab']);
			$sheet->setCellValue('B'.$labCounter, $lab['jenis_lab']);
			$sheet->setCellValue('C'.$labCounter, $lab['hasil_lab']);

			$labCounter++;
		}
		/* LAB */

		/* ECHO */
		$echoCounter = $labCounter;
		$echoCounter++;
		$sheet->setCellValue('A'.$echoCounter, 'ECHO');
		$echoCounter++;
		$sheet->setCellValue('A'.$echoCounter, 'Tanggal Echo');
		$sheet->setCellValue('B'.$echoCounter, 'EF');
		$sheet->setCellValue('C'.$echoCounter, 'EA');
		$sheet->setCellValue('D'.$echoCounter, 'TAPSE');
		$sheet->setCellValue('E'.$echoCounter, 'Masalah Katup');
		$sheet->setCellValue('F'.$echoCounter, 'Hipertensi Plumonal Katup');
		$spreadsheet->getActiveSheet()->getStyle('A'.$echoCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('B'.$echoCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('C'.$echoCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('D'.$echoCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('E'.$echoCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('F'.$echoCounter)->applyFromArray($styleArray);

		$echoCounter++;
		foreach($data['echo_list'] as $echo){
			$sheet->setCellValue('A'.$echoCounter, $echo['tanggal_echo']);
			$sheet->setCellValue('B'.$echoCounter, $echo['EF']);
			$sheet->setCellValue('C'.$echoCounter, $echo['EA']);
			$sheet->setCellValue('D'.$echoCounter, $echo['TAPSE']);
			$sheet->setCellValue('E'.$echoCounter, $echo['masalah_katup']);
			$sheet->setCellValue('F'.$echoCounter, $echo['hipertensi_plumonal']);

			$echoCounter++;
		}
		/* ECHO */

		/* OBAT */
		$obatCounter = $echoCounter;
		$obatCounter++;
		$sheet->setCellValue('A'.$obatCounter, 'RIWAYAT OBAT');
		$obatCounter++;
		$sheet->setCellValue('A'.$obatCounter, 'Tanggal Diberikan');
		$sheet->setCellValue('B'.$obatCounter, 'Kategori Obat');
		$sheet->setCellValue('C'.$obatCounter, 'Nama Obat');
		$sheet->setCellValue('D'.$obatCounter, 'Dosis');
		$spreadsheet->getActiveSheet()->getStyle('A'.$obatCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('B'.$obatCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('C'.$obatCounter)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('D'.$obatCounter)->applyFromArray($styleArray);

		$obatCounter++;
		foreach($data['obat_list'] as $obat){
			$sheet->setCellValue('A'.$obatCounter, $obat['tanggal_diberikan']);
			$sheet->setCellValue('B'.$obatCounter, $obat['nama_kategori']);
			$sheet->setCellValue('C'.$obatCounter, $obat['nama_obat']);
			$sheet->setCellValue('D'.$obatCounter, $obat['dosis']);

			$obatCounter++;
		}
		/* OBAT */

		$obatCounter++;

		$sheet->setCellValue('A'.$obatCounter, 'Meninggal');
		$sheet->setCellValue('B'.$obatCounter, $pasien['tanggal_meninggal']);
		$spreadsheet->getActiveSheet()->getStyle('A'.$obatCounter)->applyFromArray($styleArray);

		$spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A6')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A7')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A9')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A11')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A14')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('B14')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output'); // download file 
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
