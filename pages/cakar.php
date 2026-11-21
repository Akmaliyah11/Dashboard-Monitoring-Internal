<?php
// 1. Panggil endpoint backend internal untuk mendapatkan data CAKAR.
$backend_url = "http://" . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['PHP_SELF']) . "api/backend_handler.php?type=cakar";
$response = @file_get_contents($backend_url);
$result = $response ? json_decode($response, true) : null;

// Memisahkan hasil dengan fallback untuk mencegah error
$data = $result['data'] ?? [];
$is_offline = ($result['source'] ?? 'api') === 'cache';
$last_updated = isset($result['last_updated']) ? date('d M Y, H:i', strtotime($result['last_updated'])) : 'N/A';

// Memberikan nilai default untuk mencegah error
$total_pengajuan = $data['total_pengajuan'] ?? 0;
$pengajuan_menunggu = $data['menunggu'] ?? 0;
$pengajuan_selesai = $data['selesai'] ?? 0;
$pengajuan_terkonfirmasi = $data['terkonfirmasi'] ?? 0;
$pengajuan_ditolak = $data['ditolak'] ?? 0;
?>

<main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 fw-bold">CAKAR</h3>
              </div>
              <div class="col-sm-6 d-flex align-items-center justify-content-end">
                <?php if ($is_offline): ?>
                  <span class="badge text-bg-warning me-2" data-bs-toggle="tooltip" title="Menampilkan data offline yang tersimpan.">
                    <i class="bi bi-wifi-off"></i> OFFLINE
                  </span>
                <?php endif; ?>
                <small class="text-muted">
                  Update Terakhir: <?php echo $last_updated; ?>
                </small>
              </div>
            </div>
          </div> 
        </div>

    <div class="app-content">
    <div class="container-fluid">
      <div class="row d-flex align-items-stretch g-4">
        <div class="col-lg-6 col-12">
          <div class="row g-3 mb-4">
            <!-- Widget 1: Total Pencari Kerja -->
            <!-- <div class="col-6">
              <div class="small-box text-bg-warning h-100 mb-2 shadow-sm border">
                <div class="inner p-3">
                  <h3 class="fw-bold mb-1" style="font-size: 1.8rem;">812</h3>
                  <p class="text-muted small mb-0">Total daftar Pencari Kerja</p>
                </div>
                <i class="small-box-icon bi bi-person-fill text-secondary mt-3" style="opacity: 0.2; font-size: 2.5rem;"></i>
              </div>
            </div> -->
            
            <!-- Widget 2: Total Pengajuan KA-1 -->
            <div class="col-12">
              <div class="small-box text-bg-primary h-100 mb-2 shadow-sm">
                <div class="inner p-3">
                  <h3 class="fw-bold mb-1" style="font-size: 1.8rem;"><?php echo number_format($total_pengajuan, 0, ',', '.'); ?></h3>
                  <p class="small mb-0">Total Pengajuan AK-1</p>
                </div>
                <i class="small-box-icon bi bi-file-earmark-text-fill mt-1" style="opacity: 0.15; font-size: 2.5rem;"></i>
              </div>
            </div>
          </div>

        <!-- Box Statistik Status Pengajuan -->
        <div class="card shadow-sm mb-2 w-100">
          <div class="card-header">
            <h5 class="card-title fw-bold">Statistik Pengajuan Kartu Kuning</h5>
          </div>
          <div class="card-body p-3">
            <div class="row g-3">
              
              <!-- Indikator Menunggu -->
              <div class="col-6">
                <div class="card border shadow-sm" style="background-color: #fbfbfb;">
                  <div class="card-body d-flex align-items-center py-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center text-white bg-warning me-3" style="width: 45px; height: 45px; min-width: 45px;">
                      <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                    <div>
                      <span class="text-muted d-block small text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 0.75rem;">Menunggu</span>
                      <h3 class="fw-bold mb-0 mt-1" style="font-size: 1.4rem;"><?php echo number_format($pengajuan_menunggu, 0, ',', '.'); ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Indikator Selesai TTE -->
              <div class="col-6">
                <div class="card border shadow-sm" style="background-color: #fbfbfb;">
                  <div class="card-body d-flex align-items-center py-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center text-white bg-success me-3" style="width: 45px; height: 45px; min-width: 45px;">
                      <i class="bi bi-check-circle-fill fs-4"></i>
                    </div>
                    <div>
                      <span class="text-muted d-block small text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 0.75rem;">Selesai TTE</span>
                      <h3 class="fw-bold mb-0 mt-1" style="font-size: 1.4rem;"><?php echo number_format($pengajuan_selesai, 0, ',', '.'); ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Indikator Terkonfirmasi -->
              <div class="col-6">
                  <div class="card border shadow-sm" style="background-color: #fbfbfb;">
                      <div class="card-body d-flex align-items-center py-3">
                          <div class="rounded-3 d-flex align-items-center justify-content-center text-white bg-primary me-3" style="width: 45px; height: 45px; min-width: 45px;">
                              <i class="bi bi-check2-all fs-4"></i>
                          </div>
                          <div>
                              <span class="text-muted d-block small text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 0.75rem;">Terkonfirmasi</span>
                              <h3 class="fw-bold mb-0 mt-1" style="font-size: 1.4rem;"><?php echo number_format($pengajuan_terkonfirmasi, 0, ',', '.'); ?></h3>
                          </div>
                      </div>
                  </div>
              </div> 

              <!-- Indikator Ditolak -->
              <div class="col-6">
                  <div class="card border shadow-sm" style="background-color: #fbfbfb;">
                      <div class="card-body d-flex align-items-center py-3">
                          <div class="rounded-3 d-flex align-items-center justify-content-center text-white bg-danger me-3" style="width: 45px; height: 45px; min-width: 45px;">
                              <i class="bi bi-x-circle-fill fs-4"></i>
                          </div>
                          <div>
                              <span class="text-muted d-block small text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 0.75rem;">Ditolak</span>
                              <h3 class="fw-bold mb-0 mt-1" style="font-size: 1.4rem;"><?php echo number_format($pengajuan_ditolak, 0, ',', '.'); ?></h3>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
  </div>

        <div class="col-lg-6 mb-2 col-12">
            <div class="card shadow-sm h-100 w-100" style="margin-bottom: -15px !important; ">
                  <div class="card-header">
                    <h5 class="card-title fw-bold">Grafik Status</h5>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center">
                    <div id="chart-kartu-kuning" style="width: 100%;"></div>
                  </div>
                </div>
              </div> 
          </div> 
        </div>
    </div>
</main>

<?php
// Menyuntikkan script chart (ApexCharts) spesifik hanya untuk file CAKAR ini ke footer
ob_start();
?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const seriesData = [
        <?php echo $pengajuan_menunggu; ?>, 
        <?php echo $pengajuan_selesai; ?>, 
        <?php echo $pengajuan_terkonfirmasi; ?>, 
        <?php echo $pengajuan_ditolak; ?>
    ];
    var options = {
    series: seriesData,
    chart: {width: '100%', height: 270, type: 'pie', sparkline: { enable: true}},
    labels: ['Menunggu', 'Selesai TTE', 'Terkonfirmasi', 'Ditolak'],
    colors: ['#ffc107', '#198754', '#0d6efd', '#dc3545'],
    responsive: [{ breakpoint: 480,
    options: {chart: {width: 200},legend: {position: 'bottom'}}}],
    legend: {position: 'right',offsetY: 40},
    tooltip: { enabled: true, theme: 'light',fillSeriesColor: false,
        y: { formatter: function(val, opts) {
              let total = opts.globals.series.reduce((a, b) => a + b, 0);
              let percent = ((val / total) * 100).toFixed(0);
              return val.toLocaleString('id-ID') + " pengajuan (" + percent + "%)"; },
              title: { formatter: function() {return 'Total:'; } }
            }},
    };
    var chart = new ApexCharts(document.querySelector("#chart-kartu-kuning"), options);
    chart.render();
  });
</script>

<?php
$extra_scripts = ob_get_clean();
?>