<?php
// TAHAP 3: Membuat Halaman Utama Admin (admin.php)

// memulai session atau melanjutkan session yang sudah ada
session_start();

// include file koneksi ke database
include "koneksi.php"; // Pastikan file koneksi.php ada dan berfungsi

// check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Daily Journal | Admin</title>
    <link rel="icon" href="img/logo.png" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    />
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin-bottom: 100px; /* Margin bottom by footer height */
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px; /* Set the fixed height of the footer here */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top bg-danger-subtle">
    <div class="container">
        <a class="navbar-brand" target="_blank" href=".">My Daily Journal</a>
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=article">Article</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['username']?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <section id="content" class="pt-4 pb-5">
        <div class="container">
            <?php
            // Mengambil nilai 'page' dari URL, default ke 'dashboard'
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; 

            // Menentukan konten berdasarkan nilai $page
            if ($page == 'dashboard') {
                echo '<h2 class="pb-2 border-bottom mb-4">Dashboard</h2>'; 
                include 'dashboard.php'; 

            } elseif ($page == 'article') {
                // Judul ditangani di dalam article.php atau tambahkan di sini jika perlu
                echo '<h2 class="pb-2 border-bottom mb-4">Article</h2>';
                include 'article.php'; 

            } elseif ($page == 'article_add') {
                echo '<h2 class="pb-2 border-bottom mb-4">Tambah Artikel</h2>';
                // include 'article_add.php'; 

            } elseif ($page == 'article_edit') {
                echo '<h2 class="pb-2 border-bottom mb-4">Ubah Artikel</h2>';
                // include 'article_edit.php'; 

            } elseif ($page == 'article_delete') {
                echo '<h2 class="pb-2 border-bottom mb-4">Hapus Artikel</h2>';
                // include 'article_delete.php'; 

            } else {
                echo '<div class="alert alert-danger"><h4>Halaman Tidak Ditemukan (404)</h4></div>';
            }
            ?>
        </div>
    </section>

   <footer class="text-center p-4 bg-danger-subtle border-top">
        <div class="mb-2">
            <a href="https://www.instagram.com/defiyepr?igsh=aGtxNzBwZDM5Y3Uw&utm_source=qr" target="_blank" class="text-dark mx-2 text-decoration-none">
                <i class="bi bi-instagram h3"></i>
            </a>
            <a href="https://wa.me/6282137815566" target="_blank" class="text-dark mx-2 text-decoration-none">
                <i class="bi bi-whatsapp h3"></i>
            </a>
        </div>
        <div class="small">Devia Permata Adie &copy; 2025</div>
    </footer>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
    ></script>
</body>
</html>