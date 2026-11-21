<main class="app-main">
<div class="app-content-header py-4 mb-3 border-bottom bg-white">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-8">
                <h2 class="fw-bold text-dark mb-1"> 
                    PORTAL MONITORING SATUPINTU
                </h2>
                <p class="mb-0 text-muted small">Silakan pilih menu pada panel sebelah kiri untuk mengatur konten, memantau sinkronisasi data, atau mengakses sub-aplikasi operasional: SESUK, CADIL, ELENOPEDA, dan Laporan Industri.</p>
            </div>
            <div class="col-sm-4 text-sm-end mt-2 mt-sm-0">
                <div class="bg-white px-3 py-2 shadow-sm rounded-pill d-flex align-items-center border">
                 <i class="bi bi-clock-fill text-primary me-2"></i>
                    <span id="live-clock" class="fw-bold text-dark font-monospace me-2" style="font-size: 14px;">00:00:00</span>
                    <span class="text-muted me-2">|</span>
                    <span id="live-date-sub" class="text-muted small fw-medium">Memuat tanggal...</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Konten Utama Bawaan AdminLTE -->
<div class="app-content">
    <div class="container-fluid">

                <!-- Baris 2: Jalur Pintas & Live Status -->
        <div class="row mt-3 align-items-stretch">
            
            <!-- Sisi Kiri: Informasi Sub Aplikasi (Lebar 8) -->
            <div class="col-lg-8 mb-4 d-flex flex-column">
                <div class="card mb-0 shadow-sm h-100 d-flex flex-column">
                    <div class="card-header bg-transparent border-bottom py-3">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-diagram-3-fill text-primary me-2"></i> Informasi Sub-Aplikasi
                        </h5>
                    </div>
                    
                    <!-- Ditambahkan h-100 dan flex-grow-1 agar latar belakang abu-abu ini ditarik penuh ke bawah -->
                    <div class="card-body bg-light-50 flex-grow-1">
                        <div class="row g-3 h-100">
                            
                            <!-- Box 1: SATUKAN JIWA -->
                            <div class="col-md-4">
                                <div class="card h-100 border shadow-sm">
                                    <div class="card-body d-flex flex-column justify-content-between p-3">
                                        <div>
                                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-shield-shaded me-2"></i>SATUKAN JIWA</h6>
                                            <p class="small text-muted mb-0" style="font-size: 0.82rem; line-height: 1.4;">Sistem manajemen data sosial internal SESUK, CADIL, dan ELENOPEDA.</p>
                                        </div>
                                            <a href="http://192.168.34.169/satukan.jiwa/" class="btn btn-outline-primary btn-sm w-100 mt-3">
                                            Buka Server <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Box 2: DBES-IKM -->
                            <div class="col-md-4">
                                <div class="card h-100 border shadow-sm">
                                    <div class="card-body d-flex flex-column justify-content-between p-3">
                                        <div>
                                            <h6 class="fw-bold text-success mb-2"><i class="bi bi-collection-fill me-2"></i>DBES-IKM</h6>
                                            <p class="small text-muted mb-0" style="font-size: 0.82rem; line-height: 1.4;">Modul pelaporan berkala industri mikro untuk monitoring IKM wilayah.</p>
                                        </div>
                                            <a href="http://192.168.34.169/dbes-ikm/" class="btn btn-outline-success btn-sm w-100 mt-3">
                                            Buka Server <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Box 3: LAPUR SIJAJA -->
                            <div class="col-md-4">
                                <div class="card h-100 border shadow-sm">
                                    <div class="card-body d-flex flex-column justify-content-between p-3">
                                        <div>
                                            <h6 class="fw-bold text-warning mb-2"><i class="bi bi-people-fill me-2"></i>LAPUR SIJAJA</h6>
                                            <p class="small text-muted mb-0" style="font-size: 0.82rem; line-height: 1.4;">Sistem layanan Cari Kartu untuk memudahkan pembuatan Kartu AK-1.</p>
                                        </div>
                                            <a href="https://lapursijaja.tegalkota.go.id/" class="btn btn-outline-warning btn-sm w-100 mt-3">
                                            Buka Server <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Live Status (Lebar 4) -->
            <div class="col-lg-4 mb-4 d-flex flex-column">
                <div class="card mb-0 shadow-sm h-100 d-flex flex-column">
                    <div class="card-header bg-transparent border-bottom py-3">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-activity text-danger me-2"></i> Live Status Aplikasi
                        </h5>
                    </div>
                    <div class="card-body p-0 flex-grow-1">
                        <ul class="list-group list-group-flush small">
                            <!-- Silakan lanjutkan isi list group bawaan Anda di sini -->
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <span class="fw-bold d-block">Server SATUKAN JIWA</span>
                                    <small class="text-muted">Koneksi Database Utama</small>
                                </div>
                                <span id="status-satukan-jiwa" class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Memeriksa...
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <span class="fw-bold d-block">Server DBES-IKM</span>
                                    <small class="text-muted">Penyimpanan Laporan Industri</small>
                                </div>
                                <span id="status-dbes-ikm" class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Memeriksa...
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <span class="fw-bold d-block">Server LAPUR SIJAJA</span>
                                    <small class="text-muted">Web Layanan Cari Kartu</small>
                                </div>
                                <span id="status-cakar" class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Memeriksa...
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
    </div>
</main>
<script>
function initLiveClockGlobal() {
    const clockEl = document.getElementById('live-clock');
    const dateSubEl = document.getElementById('live-date-sub');
    
    function update() {
        const now = new Date();
        
        if (clockEl) {
            clockEl.textContent = now.toLocaleTimeString('id-ID', { 
                hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' 
            });
        }
        
        if (dateSubEl) {
            dateSubEl.textContent = now.toLocaleDateString('id-ID', { 
                weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' 
            });
        }
    }
    
    setInterval(update, 1000);
    update();
}

function checkAppStatus() {
    const services = [
        { name: 'satukan_jiwa', elementId: 'status-satukan-jiwa' },
        { name: 'dbes_ikm', elementId: 'status-dbes-ikm' },
        { name: 'cakar', elementId: 'status-cakar' }
    ];

    const basePath = "<?php echo str_replace('index.php', '', $_SERVER['PHP_SELF']); ?>";

    services.forEach(service => {
        const statusElement = document.getElementById(service.elementId);
        if (!statusElement) return;

        fetch(`${basePath}pages/status_checker.php?service=${service.name}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'online') {
                    statusElement.innerHTML = 'Aktif';
                    statusElement.className = 'badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3';
                } else {
                    statusElement.innerHTML = 'Tidak Aktif';
                    statusElement.className = 'badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3';
                }
            })
            .catch(error => {
                console.error('Error checking status for:', service.name, error);
                statusElement.innerHTML = 'Error';
                statusElement.className = 'badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3';
            });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    initLiveClockGlobal();
    checkAppStatus();
});
</script>