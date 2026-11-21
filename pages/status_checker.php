<?php
/**
 * File: status_checker.php
 * Deskripsi: Endpoint untuk memeriksa status koneksi ke server aplikasi eksternal.
 *            Menggunakan fsockopen untuk pengecekan yang cepat dan non-blocking.
 */

header('Content-Type: application/json');

$service = $_GET['service'] ?? '';

// Daftar host dan port untuk setiap layanan
// Penting: Ambil host dan port dari URL API yang ada di backend_handler.php
$services = [
    'satukan_jiwa' => ['host' => '192.168.34.169', 'port' => 80],
    'dbes_ikm'     => ['host' => '192.168.34.169', 'port' => 80],
    // Jika elenopeda punya server/port berbeda, bisa ditambahkan
    'elenopeda'    => ['host' => '192.168.34.169', 'port' => 8080],
    'cakar' => ['host' => 'lapursijaja.tegalkota.go.id', 'port' => 80],
    
];

if (empty($service) || !array_key_exists($service, $services)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Layanan tidak valid.']);
    exit;
}

$host = $services[$service]['host'];
$port = $services[$service]['port'];
$timeout = 2; // Timeout 2 detik, cukup untuk cek koneksi LAN

// Gunakan @fsockopen untuk menekan warning jika koneksi gagal
$socket = @fsockopen($host, $port, $errno, $errstr, $timeout);

if ($socket) {
    // Jika koneksi berhasil, tutup socket dan kirim status online
    fclose($socket);
    echo json_encode(['status' => 'online']);
} else {
    // Jika koneksi gagal
    echo json_encode(['status' => 'offline']);
}