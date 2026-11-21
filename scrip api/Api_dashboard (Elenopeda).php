<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
	}
	public function index()
{
    $tahun = date("Y");


// ======================
// ELENOPEDA (NPD)
// ======================

	// Total NPD
	$data['total_npd'] =
		$this->db->query("
		    SELECT COUNT(id_pengajuan_npd) AS jml 
			FROM tb_pengajuan
			WHERE YEAR(tgl_pengajuan)='$tahun'
		")->row()->jml;

	// NPD Terverifikasi
	$data['npd_verifikasi'] =
		$this->db->query("
			SELECT COUNT(id_pengajuan_npd) AS jml			
			FROM tb_pengajuan
			WHERE status='2'
			and YEAR(tgl_pengajuan)='$tahun'
		")->row()->jml;

	// NPD Belum Verifikasi
	$data['npd_belum'] =
		$this->db->query("
			SELECT COUNT(id_pengajuan_npd) AS jml			
			FROM tb_pengajuan
			WHERE status='0'
			and YEAR(tgl_pengajuan)='$tahun'
		")->row()->jml;

	// Jumlah Program
	$data['jml_program'] =
		$this->db->query("
			SELECT COUNT(id_program) AS jml			
			FROM tb_program
			WHERE tahun_anggaran='$tahun'
		")->row()->jml;

	// Jumlah Kegiatan
	$data['jml_kegiatan'] =
		$this->db->query("
			SELECT COUNT(id_kegiatan) AS jml			
			FROM tb_kegiatan
		")->row()->jml;

	// Jumlah Sub Kegiatan
	$data['jml_sub_kegiatan'] =
		$this->db->query("
			SELECT COUNT(id_sub) AS jml			
			FROM tb_sub_kegiatan
		")->row()->jml;


	// Jumlah Total Dana
	$data['total_dana'] =
		$this->db->query("
			SELECT SUM(nominal_pencairan) AS jml			
			FROM tb_pengajuan_dt
		")->row()->jml;
 

	// // Data grafik struktur
	// $data['struktur_kegiatan'] = [
	// 	(int)$data['jml_program'],
	// 	(int)$data['jml_kegiatan'],
	// 	(int)$data['jml_sub_kegiatan']
	// ];


	header('Content-Type:application/json');
		echo json_encode($data);
	}
	
}

