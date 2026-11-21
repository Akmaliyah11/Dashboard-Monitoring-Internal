<?php
$page = $_GET['page'] ?? '';

// Definisikan grup halaman untuk setiap menu utama.
$satukan_jiwa_pages = ['sesuk', 'cadil', 'elenopeda'];
$dbes_ikm_pages = ['laporan_industri'];
$lapursijaja = ['cakar'];

?>
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="index.php" class="brand-link d-flex align-items-center">
            <div class="brand-image-wrapper">
              <img src="assets/img/Logo-Kota-.jpg" alt="AdminLTE Logo" class="brand-image-circle" />
            </div>
              <span class="brand-text fw-light">SATUPINTU</span>
          </a>
      </div>
<style>
  .brand-image-wrapper {
    width: 40px;          
    height: 40px;         
    overflow: hidden;     
    border-radius: 50%;   
    display: inline-block;
    margin-right: 10px;  
    flex-shrink: 0;   
  }
  .brand-image-circle {
    width: 100%;
    height: 100%;
    object-fit: cover;  
    opacity: 0.75;
  }
</style>

<div class="sidebar-wrapper d-flex flex-column h-100">
    <nav class="mt-2" aria-label="Main navigation">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation">
            
            <!-- Menu BERANDA -->
            <li class="nav-item">
                <a href="index.php?page=dashboard" class="nav-link <?php echo ($page == 'dashboard') ? 'active menu-aktif-custom' : 'menu-tidak-aktif-custom'; ?>">
                    <i class="nav-icon bi bi-house-door-fill"></i>
                    <p>BERANDA</p>
                </a>
            </li>

            <!-- Menu SATUKAN JIWA -->
            <li class="nav-item <?= in_array($page, array_merge($satukan_jiwa_pages, $dbes_ikm_pages, $lapursijaja, ['dashboard'])) ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link bg-transparent">
                    <i class="nav-icon bi bi-shield-shaded"></i>
                    <p>
                        SATUKAN JIWA
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!-- Menu SESUK -->
                    <li class="nav-item">
                        <a href="index.php?page=sesuk" class="nav-link <?php echo ($page == 'sesuk') ? 'active menu-aktif-custom' : 'menu-tidak-aktif-custom'; ?>">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>SESUK</p>
                        </a>
                    </li>
                    <!-- Menu CADIL -->
                    <li class="nav-item">
                        <a href="index.php?page=cadil" class="nav-link <?php echo ($page == 'cadil') ? 'active menu-aktif-custom' : 'menu-tidak-aktif-custom'; ?>">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>CADIL</p>
                        </a>
                    </li>
                    <!-- Menu ELENOPEDA -->
                    <li class="nav-item">
                        <a href="index.php?page=elenopeda" class="nav-link <?php echo ($page == 'elenopeda') ? 'active menu-aktif-custom' : 'menu-tidak-aktif-custom'; ?>">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>ELENOPEDA</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Menu DBES-IKM -->
            <li class="nav-item <?= in_array($page, array_merge($satukan_jiwa_pages, $dbes_ikm_pages, $lapursijaja, ['dashboard'])) ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link bg-transparent">
                    <i class="nav-icon bi bi-collection-fill"></i>
                    <p>
                        DBES-IKM
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!-- Menu Laporan Industri -->
                    <li class="nav-item">
                        <a href="index.php?page=laporan_industri" class="nav-link <?php echo ($page == 'laporan_industri') ? 'active menu-aktif-custom' : 'menu-tidak-aktif-custom'; ?>">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Laporan Industri</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Lapursijaja -->
            <li class="nav-item <?= in_array($page, array_merge($satukan_jiwa_pages, $dbes_ikm_pages, $lapursijaja, ['dashboard'])) ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link bg-transparent">
                  <i class="nav-icon bi bi-people-fill"></i>
                  <p>
                    LAPUR SIJAJA
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?page=cakar" class="nav-link <?= ($page == 'cakar') ? 'active' : '' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>CAKAR</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>

            <div class="p-3 mt-3 border-top border-secondary border-opacity-25 dropup">
              <button class="btn btn-sm btn-outline-light w-100 dropdown-toggle d-flex align-items-center justify-content-center gap-2" 
                      type="button" data-bs-toggle="dropdown" id="tombolTautan" aria-expanded="false">
                      <i class="bi bi-book"></i> Tautan Halaman
              </button>
              <ul class="dropdown-menu dropdown-menu-dark w-100 shadow">
                  <li><a class="dropdown-item" href="http://192.168.34.169/satukan.jiwa/ "><i class="bi bi-shield-shaded"></i> Satukan Jiwa</a></li>
                  <li><a class="dropdown-item" href="http://192.168.34.169/dbes-ikm/"><i class="bi bi-collection-fill"></i> DBES-IKM</a></li>
                  <li><a class="dropdown-item" href="https://lapursijaja.tegalkota.go.id/"><i class="bi bi-people-fill"></i> Lapursijaja</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const tombolTautan = document.getElementById('tombolTautan');
    // Mencari tag <nav class="sidebar-menu"> yang ada di baris 40 gambarmu
    const navMenu = document.querySelector('.sidebar-menu'); 

    if (tombolTautan && navMenu) {
        // Ketika dropdown Tautan Halaman mulai diklik & dibuka oleh user
        tombolTautan.addEventListener('show.bs.dropdown', function () {
            navMenu.classList.add('nav-sidebar-redup');
        });

        // Ketika dropdown Tautan Halaman ditutup kembali
        tombolTautan.addEventListener('hide.bs.dropdown', function () {
            navMenu.classList.remove('nav-sidebar-redup');
        });
    }
});
</script>