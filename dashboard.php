<?php
// Catatan: File ini di-include di dalam admin.php,
// sehingga variabel $conn (koneksi database) sudah tersedia.

// 1. Ambil jumlah Article dari database
$sql1 = "SELECT id FROM article";
// Pastikan $conn tersedia dan query dieksekusi
$hasil1 = isset($conn) ? $conn->query($sql1) : false;
// Hitung jumlah baris yang ditemukan
$jumlah_article = $hasil1 ? $hasil1->num_rows : 0;

// 2. Ambil jumlah Gallery dari database (jika tabel sudah dibuat)
// Jika tabel 'gallery' belum ada, gunakan nilai dummy
// $sql2 = "SELECT id FROM gallery";
// $hasil2 = isset($conn) ? $conn->query($sql2) : false;
// $jumlah_gallery = $hasil2 ? $hasil2->num_rows : 0;
$jumlah_gallery = 4; // Ganti dengan query sebenarnya jika tabel sudah ada
?>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <div class="col">
        <a href="admin.php?page=article" class="text-decoration-none text-dark">
            <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="p-3">
                            <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                        </div>
                        <div class="p-3">
                            <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_article; ?></span>
                        </div> 
                    </div>
                </div>
            </div>
        </a>
    </div> 

    <div class="col">
        <a href="admin.php?page=gallery" class="text-decoration-none text-dark">
            <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="p-3">
                            <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                        </div>
                        <div class="p-3">
                            <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_gallery; ?></span>
                        </div> 
                    </div>
                </div>
            </div>
        </a>
    </div> 
</div>

<p class="lead text-center pt-4">Selamat datang, <strong><?= $_SESSION['username'] ?></strong>! Ini adalah ringkasan konten Anda.</p>