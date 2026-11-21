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
        // DBES IKM
        // ======================
        // !! Ada update di tabel ikm, tidak ada kolom tahun, diganti menjadi tahun_nib

        // 1. Ekstraksi Total IKM (Menggunakan referensi tahun_nib sebagai filter temporal)
        $data["total_ikm"] =
            $this->db->query("
                SELECT COUNT(id) AS jml 
                FROM ikm
            ")->row()->jml;

        // 2. Ekstraksi Distribusi Skala Industri
        $data['ikm_kecil'] =
            $this->db->query("
                SELECT COUNT(id) AS jml
                FROM ikm
                WHERE skala_industri = 'Industri Kecil'
                
            ")->row()->jml;

        $data['ikm_menengah'] =
            $this->db->query("
                SELECT COUNT(id) AS jml
                FROM ikm
                WHERE skala_industri = 'Industri Menengah'
               
            ")->row()->jml;

        $data['ikm_besar'] =
            $this->db->query("
                SELECT COUNT(id) AS jml
                FROM ikm
                WHERE skala_industri = 'Industri Besar'
               
            ")->row()->jml;

         $data['kbli'] =
            $this->db->query("
                SELECT kbli.id_kbli,kbli.nama_kbli, COUNT(ikm.jenis_industri_kbli) as jml FROM ikm,kbli WHERE ikm.jenis_industri_kbli=kbli.id_kbli GROUP BY ikm.jenis_industri_kbli
               
            ")->result();

        

        // 4. Mentransmisikan objek struktur data menjadi format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}