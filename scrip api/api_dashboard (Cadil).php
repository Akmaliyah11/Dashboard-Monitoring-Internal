<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
{
    $tahun = date("Y");

    $data["total_sppd"] =
        $this->db->query("
            SELECT COUNT(id) AS jml 
            FROM tbsppd
            WHERE YEAR(tgl_brkt)='$tahun'
        ")->row()->jml;

        $grafik_sppd = array_fill(0, 12, 0); 
        
        $query_grafik = $this->db->query("
            SELECT MONTH(tgl_brkt) AS bulan,
                   COUNT(id) AS jml
            FROM tbsppd
            WHERE YEAR(tgl_brkt) = '$tahun'
            GROUP BY MONTH(tgl_brkt)
        ");

        foreach($query_grafik->result() as $r) {
            $grafik_sppd[$r->bulan - 1] = (int)$r->jml;
        }
        $data["grafik_sppd"] = $grafik_sppd;

        $data["tabel_sppd"] = 
            $this->db->query("
                SELECT nama, jabatan, tempat_tujuan, tgl_brkt
                FROM tbsppd
                WHERE YEAR(tgl_brkt) = '$tahun'
                ORDER BY tgl_brkt DESC, id DESC
                LIMIT 10
            ")->result_array();

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}


//     // Grafik SPT
//     $grafik_spt = array_fill(0,12,0);

//     $q = $this->db->query("
//         SELECT MONTH(tglsurat) bulan,
//                COUNT(id) jumlah
//         FROM tbsp
//         WHERE tahun='$tahun'
//         GROUP BY MONTH(tglsurat)
//     ");

//     foreach($q->result() as $r){
//         $grafik_spt[$r->bulan-1] = (int)$r->jumlah;
//     }

//     // Grafik SPPD
//     $grafik_sppd = array_fill(0,12,0);

//     $q = $this->db->query("
//         SELECT MONTH(tgl_surat) bulan,
//                COUNT(id) jumlah
//         FROM tbsppd
//         WHERE YEAR(tgl_surat)='$tahun'
//         GROUP BY MONTH(tgl_surat)
//     ");

//     foreach($q->result() as $r){
//         $grafik_sppd[$r->bulan-1] = (int)$r->jumlah;
//     }

//     $data["grafik_spt"] = $grafik_spt;
//     $data["grafik_sppd"] = $grafik_sppd;


// 	header('Content-Type:application/json');
// 		echo json_encode($data);
// 	}
	
// }

