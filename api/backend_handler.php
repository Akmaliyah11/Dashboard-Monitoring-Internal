<?php
/**
 * File: backend_handler.php
 * Deskripsi: Endpoint terpusat untuk menangani semua logika pengambilan data backend.
 *            File ini mengambil data dari API eksternal dengan mekanisme cache
 *            dan mengembalikannya sebagai respons JSON.
 */

// Set header untuk memastikan output adalah JSON 
header('Content-Type: application/json');

// Memuat file konfigurasi dan fungsi-fungsi helper
require_once '../config/koneksi.php';

// Mendapatkan tipe data yang diminta dari parameter URL
$type = $_GET['type'] ?? '';

// Daftar API endpoint yang tersedia
$api_endpoints = [
    'cadil' => "http://192.168.34.169/satukan.jiwa/cadil/index.php/api_dashboard",
    'laporan_industri' => "http://192.168.34.169/dbes-ikm/index.php/api_dashboard",
    'sesuk' => "http://192.168.34.169/satukan.jiwa/sesuk/index.php/api_dashboard",
    'elenopeda' => "http://192.168.34.169:8080/npd/index.php/api_dashboard",
    'cakar' => "https://lapursijaja.tegalkota.go.id/v3/index.php/Api_dashboard"
];

// Validasi tipe yang diminta
if (empty($type) || !array_key_exists($type, $api_endpoints)) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Tipe data tidak valid atau tidak tersedia.']);
    exit;
}

// Ambil data menggunakan fungsi caching
$api_url = $api_endpoints[$type];
$result = get_data_with_cache(
    $koneksi_utama, 
    $api_url, 
    "{$type}_data"
);

// Kembalikan hasil sebagai JSON
echo json_encode($result);