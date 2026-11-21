<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SATUPINTU | Dashboard - <?= htmlspecialchars($title ?? 'Beranda') ?></title>
    <!--begin::Theme Init-->
    <script>
      (() => {
        'use strict';
        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try { stored = localStorage.getItem(STORAGE_KEY); } catch {}
        const prefersDark = globalThis.matchMedia('(prefers-color-scheme: dark)').matches;
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (prefersDark) {
          resolved = 'dark';
        }
        document.documentElement.setAttribute('data-bs-theme', resolved);
        document.documentElement.style.colorScheme = resolved;
      })();
    </script>
    <!--end::Theme Init-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/adminlte.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />

   <style>
    .app-main, .app-content {
        overflow-x: hidden !important;
        width: 100% !important;
        max-width: 100% !important;}
    .table {
        table-layout: fixed !important;
        width: 100% !important;}
    .table td, .table th {
        white-space: normal !important; 
        word-wrap: break-word !important;}
        
    /* ==========================================================================
       SIDEBAR CUSTOM STYLES
       ========================================================================== */
    .sidebar-wrapper {
        position: relative !important;
        height: calc(100vh - 60px) !important;
        padding-bottom: 70px !important;
        overflow-y: auto !important;
    }
    .sidebar-wrapper div.p-3.border-top {
        position: absolute !important;
        bottom: 0 !important;
        left: 0 !important;
        width: 100% !important;
        margin-top: 0 !important;
        background-color: var(--bs-secondary-bg) !important;
        z-index: 10;
    }
    
    /* 1. Efek Hover (Sorotan Kursor): Latar belakang putih abu-abu & TEKS otomatis HITAM */
    .sidebar-wrapper .nav-treeview .nav-item .nav-link:hover,
    .sidebar-wrapper .nav-treeview .nav-item .nav-link.active:hover,
    .sidebar-wrapper .nav-sidebar > .nav-item > .nav-link:hover,
    .sidebar-wrapper .nav-sidebar > .nav-item > .nav-link.active:hover {
        background-color: rgba(255, 255, 255, 0.1) !important; /* Sorotan latar belakang putih abu-abu */
        color: #ffffff !important;            /* Teks utama otomatis hitam */
        border-radius: 8px !important; 
        transition: none !important;  
    }
    /* 1. Mencegah menu aktif berubah warna menjadi abu-abu saat disorot kursor */
    .sidebar-wrapper a.nav-link.active:hover,
    .sidebar-wrapper .nav-item a.nav-link.active:hover,
    .sidebar-wrapper .nav-sidebar .nav-item a.nav-link.active:hover,
    .sidebar-wrapper .nav-treeview .nav-item a.nav-link.active:hover {
        background-color: #f4f6f9 !important; 
        color: #000000 !important;           
    }

    /* Keadaan Default (Saat Menu Tidak Aktif & Tidak Di-hover) tetap teks putih */
    .sidebar-wrapper .nav-link i,
    .sidebar-wrapper .nav-link p {
        color: #ffffff !important;
    }

    /* 2. Mengatur Ukuran Lebar Menu */
    .sidebar-wrapper .nav-treeview .nav-item .nav-link {
        width: 100% !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        border-radius: 8px !important; 
        padding-left: 2.5rem !important; 
    }

    /* 3. Aturan Warna Kotak Saat Menu Aktif (Terpilih) */
    .sidebar-wrapper .nav-link.active,
    .sidebar-wrapper .nav-item .nav-link.active,
    .sidebar-wrapper .nav-sidebar .nav-item .nav-link.active {
        background-color: #f4f6f9 !important; 
        color: #000000 !important;             
        border-left: 5px solid #0d6efd !important; 
        border-top-left-radius: 0 !important;      
        border-bottom-left-radius: 0 !important;   
        border-radius: 8px !important; 
        transition: none !important;
    }
    
    /* Memaksa ikon dan teks di dalam menu aktif tetap berwarna hitam */
    .sidebar-wrapper .nav-link.active i,
    .sidebar-wrapper .nav-link.active p {
        color: #000000 !important;
    }
    
    /* ==================== KUSTOMISASI MINIMALIS GLOBAL MODERN ==================== */
    .info-box, .small-box {
        background-color: #ffffff !important;
        color: #2d3748 !important; 
        border: 1px solid #e2e8f0 !important; 
        border-radius: 12px !important; 
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03) !important;
        padding: 20px !important;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        min-height: 100px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .info-box:hover, .small-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05) !important;
    }
    .info-box-content, .small-box .inner {
        display: flex;
        flex-direction: column;
        padding: 0 !important;
        margin: 0 !important;
        flex-grow: 1;
    }
    .info-box-text, .small-box .inner p {
        font-size: 0.85rem !important;
        color: #718096 !important; 
        font-weight: 500 !important;
        margin-bottom: 4px !important;
        order: -1; 
        text-transform: none !important;
    }
    .info-box-number, .small-box .inner h3 {
        font-size: 1.75rem !important;
        font-weight: 700 !important;
        color: #1a202c !important;
        margin: 0 !important;
    }
    .info-box-icon, .small-box .small-box-icon, .small-box-icon i {
        font-size: 1.25rem !important;
        opacity: 1 !important;
        position: absolute !important;
        top: 20px !important;
        right: 20px !important;
        transform: none !important;
        width: 42px !important;
        height: 42px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 50% !important;
    }
    .info-box.text-bg-primary, .small-box.text-bg-primary { border-left: 4px solid #3182ce !important; }
    .info-box.text-bg-primary .info-box-icon, .small-box.text-bg-primary .small-box-icon { background-color: #ebf8ff !important; color: #3182ce !important; }

    .info-box.text-bg-success, .small-box.text-bg-success { border-left: 4px solid #38a169 !important; }
    .info-box.text-bg-success .info-box-icon, .small-box.text-bg-success .small-box-icon { background-color: #f0fff4 !important; color: #38a169 !important; }

    .info-box.text-bg-warning, .small-box.text-bg-warning { border-left: 4px solid #dd6b20 !important; }
    .info-box.text-bg-warning .info-box-icon, .small-box.text-bg-warning .small-box-icon { background-color: #fffaf0 !important; color: #dd6b20 !important; }

    .info-box.text-bg-danger, .small-box.text-bg-danger { border-left: 4px solid #e53e3e !important; }
    .info-box.text-bg-danger .info-box-icon, .small-box.text-bg-danger .small-box-icon { background-color: #fff5f5 !important; color: #e53e3e !important; }

    .small-box .small-box-footer { display: none !important; }
    /* Saat dropdown terbuka, putar segitiga bawaan 180 derajat ke bawah */
    .dropdown.show .dropdown-toggle::after, 
    .dropup .dropdown-toggle[aria-expanded="true"]::after {
        transform: rotate(180deg);
        transition: transform 0.2s ease-in-out; /* Efek transisi putar halus */
    }

    /* Mengatur transisi default agar kembali ke atas dengan halus saat ditutup */
    .dropdown-toggle::after {
        transition: transform 0.2s ease-in-out;
        display: inline-block;
    }
    /* Efek menggelap khusus untuk menu navigasi AdminLTE */
    .nav-sidebar-redup {
        filter: brightness(0.30) grayscale(0.3) !important; /* Menurunkan kecerahan menjadi 25% */
        pointer-events: none !important; /* Mengunci menu atas agar tidak bisa diklik saat gelap */
        transition: filter 0.1s ease-in-out !important; /* Animasi menggelap yang halus */
    }

    /* Memastikan transisi awal pada nav bawaan AdminLTE berjalan mulus */
    .sidebar-menu {
        transition: filter 0.3s ease-in-out;
    }
    /* Taruh ini tepat di bawah baris 205 (.sidebar-menu) */

    .sidebar-wrapper div.p-3.border-top {
        position: absolute !important;
        bottom: 0 !important;
        left: 0 !important;
        width: 100% !important;
        z-index: 20 !important;
    }

    /* Memaksa kotak dropdown sejajar lurus dengan tombol */
    .sidebar-wrapper div.p-3.border-top .dropdown-menu {
        width: calc(100% - 32px) !important; /* Menyesuaikan lebar tombol dikurangi padding p-3 */
        min-width: calc(100% - 32px) !important;
        left: 16px !important;               /* Menggeser ke kanan sejajar margin tombol */
        transform: none !important;          /* Mematikan setelan otomatis Bootstrap */
        top: auto !important;
        bottom: 100% !important;             /* Mengambang tepat di atas tombol */
        margin-bottom: 8px !important;       /* Jarak halus antara kotak & tombol */
        border-radius: 0.375rem !important;  /* Sudut kotak dibuat melengkung halus */
        padding: 2px 0 !important;
    }

    /* Merapikan teks link di dalam kotak agar presisi */
    .sidebar-wrapper div.p-3.border-top .dropdown-item {
        padding: 4px 16px !important;
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">