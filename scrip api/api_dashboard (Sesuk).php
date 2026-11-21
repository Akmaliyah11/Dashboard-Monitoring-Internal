<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
{
    $tahun = date("Y");

    $data["jml_surat_masuk"] = $this->db->query("
        SELECT COUNT(id_surat) AS jml_data
        FROM surat_masuk
        WHERE tahun='$tahun'
    ")->row()->jml_data;

    $data["jml_surat_keluar"] = $this->db->query("
        SELECT COUNT(id_surat) AS jml_data
        FROM surat_keluar
        WHERE tahun='$tahun'
    ")->row()->jml_data;

    $data["jml_disposisi"] = $this->db->query("
        SELECT COUNT(id_surat) AS jml_data
        FROM surat_masuk
        WHERE tahun='$tahun'
          AND status_disposisi='1'
    ")->row()->jml_data;

    header('Content-Type: application/json');
    echo json_encode($data);
}
	
}

