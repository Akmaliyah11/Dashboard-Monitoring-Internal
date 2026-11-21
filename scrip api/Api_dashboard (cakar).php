<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $tahun = date("Y");
        $data = array();

        // 1. Mengambil total keseluruhan data pengajuan
        $data["total_pengajuan"] = $this->db->query("
            SELECT COUNT(id_tb_pengajuan_ak2) AS jml_data
            FROM cakar_tb_pengajuan_ak2
            WHERE YEAR(cdate) = '$tahun'
        ")->row()->jml_data;

      $data['menunggu'] =
            $this->db->query("
                SELECT COUNT(id_tb_pengajuan_ak2) AS jml_data
            FROM cakar_tb_pengajuan_ak2
            WHERE YEAR(cdate) = '$tahun' and (status_pengajuan='MENUNGGU' or status_pengajuan='MENUNGGU TTE') 
                
            ")->row()->jml_data;
            
     $data['selesai'] =
            $this->db->query("
                SELECT COUNT(id_tb_pengajuan_ak2) AS jml_data
            FROM cakar_tb_pengajuan_ak2
            WHERE YEAR(cdate) = '$tahun' and (status_pengajuan='SELESAI TTE' or status_pengajuan='SELESAI')
                
            ")->row()->jml_data;
    
    $data['terkonfirmasi'] =
            $this->db->query("
                SELECT COUNT(id_tb_pengajuan_ak2) AS jml_data
            FROM cakar_tb_pengajuan_ak2
            WHERE YEAR(cdate) = '$tahun' and status_pengajuan='TERKONFIRMASI'
                
            ")->row()->jml_data;
            
     $data['ditolak'] =
            $this->db->query("
                SELECT COUNT(id_tb_pengajuan_ak2) AS jml_data
            FROM cakar_tb_pengajuan_ak2
            WHERE YEAR(cdate) = '$tahun' and (status_pengajuan='DITOLAK' or status_pengajuan='DIBATALKAN')
                
            ")->row()->jml_data;


        // 4. Mengembalikan HTTP Response dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}