<?php
// WAJIB ADA karena terlihat di gambar Anda
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Daily Journal - Devia Permata Adie</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --bs-primary: #FFC0CB; 
            --bs-primary-rgb: 255, 192, 203;
            --bs-secondary-bg: #FFEFF3; 
        }
        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: #FF85A2;
            --bs-btn-hover-border-color: #FF85A2;
        }
        .bg-custom-hero {
            background-color: var(--bs-secondary-bg);
        }
        
        .carousel-item img {
            width: 100%;
            height: 450px; 
            object-fit: cover; 
        }
        .carousel-caption {
            background-color: rgba(255, 255, 255, 0.7); 
            border-radius: 8px;
            color: #333; 
        }

        .rounded-image-home {
            width: 100%;
            max-width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 50%; 
            border: 5px solid var(--bs-primary); 
        }

        .card-img-top-article {
            height: 200px; 
            object-fit: cover;
        }

        /* Styling Dark Mode */
        @media (max-width: 767.98px) {
            .carousel-caption {
                position: static; 
                width: auto;
                padding: 1rem;
                margin-top: 1rem;
            }
            .carousel-item img {
                height: 300px; 
            }

            .profile-data-wrapper {
                text-align: left; 
            }
        }

        [data-bs-theme="dark"] {
            --bs-body-color: #f1f1f1;
            --bs-body-bg: #1c1c1c;
            --bs-secondary-bg: #2d2d2d;

            .navbar {
                --bs-navbar-color: #f1f1f1;
                --bs-navbar-hover-color: var(--bs-primary);
                --bs-navbar-brand-color: var(--bs-body-color);
                --bs-navbar-brand-hover-color: var(--bs-primary);
                background-color: #333 !important;
                color: var(--bs-body-color) !important;
            }
            .nav-link {
                color: #f1f1f1 !important;
            }

            .card {
                background-color: #333;
                border-color: var(--bs-primary) !important;
            }
            .list-group-item {
                background-color: #333;
                color: #f1f1f1;
            }
            .bg-light {
                background-color: #2d2d2d !important;
                color: var(--bs-body-color);
            }
            .text-dark {
                color: #f1f1f1 !important;
            }
            .text-primary {
                color: var(--bs-primary) !important;
            }
            .bg-custom-hero {
                background-color: #2d2d2d !important;
            }
            footer {
                background-color: #d17887 !important;
            }
            .carousel-caption {
                background-color: rgba(0, 0, 0, 0.7); 
                color: #f1f1f1; 
            }
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand text-dark fw-bold" href="#">My Daily Journal</a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
             <ul class="navbar-nav me-3"> 
                <li class="nav-item"><a class="nav-link" href="#profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#schedule">Schedule</a></li> 
                <li class="nav-item"><a class="nav-link" href="#article">Article</a></li> 
                <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li> 
            </ul>
    
            <div class="d-flex ms-2">
                <button id="dark-mode-toggle" class="btn btn-outline-dark me-2" title="Dark Mode" aria-label="Dark Mode">
                    <i class="bi bi-moon-fill"></i> </button>
                <button id="light-mode-toggle" class="btn btn-outline-secondary" title="Light Mode" aria-label="Light Mode">
                    <i class="bi bi-sun-fill"></i> </button>
            </div>
        </div>
        </div>
    </nav>
    
    <main>
        <section id="carousel-section">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cdn.rri.co.id/berita/Semarang/o/1731470874775-IMG-20241113-WA0011/wdu02gilppopcfj.jpeg" class="d-block w-100" alt="Hii, saya Devia Permata Adie">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Selamat Datang di Portofolio Saya! 👋</h5>
                            <p>Mahasiswa Informatika Angkatan 2024</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://kediri.dinus.ac.id/wp-content/uploads/sites/66/2022/12/042A9985-ALIF-FATHURRAHMAN-1.jpg" class="d-block w-100" alt="Dokumentasi Kampus">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lihat Dokumentasi Kampus Udinus! 🏛️</h5>
                            <p>Beberapa sudut dari Universitas Dian Nuswantoro.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cloud.jpnn.com/photo/jatim/news/normal/2025/01/16/universitas-dian-nuswantoro-udinus-kembali-mencetak-sejarah-6fvz.jpg" class="d-block w-100" alt="Kontak">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Yuk, Ngobrol Santai! 💬</h5>
                            <p>Jangan ragu untuk menghubungi saya.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section id="profile" class="py-5 bg-custom-hero">
            <div class="container">
                <h1 class="text-center mb-5 text-primary fw-bold">Tentang Saya</h1>
                <div class="row align-items-center mb-5">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <p class="h2 text-primary">Hii, saya Devia Permata Adie 👋</p>
                        <h1 class="display-6 fw-bold">Mahasiswa <span class="text-dark">Informatika</span></h1>
                        <p class="lead text-secondary">Saya adalah mahasiswa angkatan 2024 dari Teknik Informatika di Universitas Dian Nuswantoro (UDINUS). Memiliki ketertarikan kuat pada logika dan sistematis, saya termotivasi untuk menciptakan solusi digital yang efisien.</p>
                        <a href="#contact" class="btn btn-primary btn-lg mt-3">Hubungi Saya</a>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="profil.png" class="rounded-image-home shadow-lg" alt="Foto Devia Permata Adie">
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow border-primary h-100">
                            <div class="card-body">
                                <h2 class="card-title text-primary"><i class="bi bi-book-fill"></i> Riwayat Pendidikan</h2>
                                <ul class="list-group list-group-flush mt-3">
                                    <li class="list-group-item"><strong>2024 - Sekarang:</strong> Universitas Dian Nuswantoro (UDINUS) - Teknik Informatika</li>
                                    <li class="list-group-item"><strong>2021 - 2024:</strong> SMAN Lima Belas Semarang</li>
                                    <li class="list-group-item"><strong>2018 - 2021:</strong> SMP NASIMA</li>
                                    <li class="list-group-item"><strong>2012 - 2018:</strong> SDN Sendang Mulyo 01</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                         <div class="card shadow border-primary h-100">
                            <div class="card-body">
                                <h2 class="card-title text-primary"><i class="bi bi-person-fill"></i> About Me</h2>
                                <p class="card-text"><strong>Devia Permata Adie</strong> adalah Mahasiswa angkatan 2024 dari Program Studi Teknik Informatika di Universitas Dian Nuswantoro (UDINUS). Saya memilih bidang ini karena keyakinan bahwa teknologi adalah sektor yang dinamis dan penuh peluang.</p>
                                <h5 class="mt-3">Semangat Logika & Sistematis</h5>
                                <p class="small">Fokus yang kuat pada pembelajaran mandiri telah melatih saya menjadi pribadi yang disiplin, teliti, dan memiliki manajemen waktu yang baik. Saya meyakini bahwa dengan kemauan keras untuk belajar, saya akan mampu menguasai berbagai bahasa pemrograman.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="schedule" class="py-5 bg-light">
            <div class="container">
                <h1 class="text-center mb-5 text-dark fw-bold">Jadwal Kuliah & Kegiatan Mahasiswa</h1>
                <div class="row g-4 justify-content-center">
                    <div class="col-12 col-md-3">
                        <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Senin</div>
                            <div class="card-body text-center d-flex align-items-center justify-content-center h-100">
                                <p class="m-0 text-muted fst-italic">Tidak ada kegiatan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Selasa</div>
                            <div class="card-body">
                                <p class="mb-2"><strong>07:00 - 08:40</strong></p>
                                <p class="small m-0">Basis Data</p>
                                <p class="small m-0 text-muted">Ruang D.2.K</p>
                                <hr class="my-2">
                                <p class="mb-2"><strong>10:20 - 12:00</strong></p>
                                <p class="small m-0">Pendidikan Kewarganegaraan</p>
                                <p class="small m-0 text-muted">Kulino</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Rabu</div>
                            <div class="card-body">
                                <p class="mb-2"><strong>08:40 - 10:20</strong></p>
                                <p class="small m-0">Basis Data</p>
                                <p class="small m-0 text-muted">Ruang H.5.6</p>
                                <hr class="my-2">
                                <p class="mb-2"><strong>12:30 - 15:00</strong></p>
                                <p class="small m-0">Logika Informatika</p>
                                <p class="small m-0 text-muted">Ruang H.5.12</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Kamis</div>
                            <div class="card-body">
                                <p class="mb-2"><strong>08:40 - 10:20</strong></p>
                                <p class="small m-0">Pemrograman Berbasis Web</p>
                                <p class="small m-0 text-muted">Ruang D.2.J</p>
                                <hr class="my-2">
                                <p class="mb-2"><strong>15:30 - 18:00</strong></p>
                                <p class="small m-0">Rekayasa Perangkat Lunak</p>
                                <p class="small m-0 text-muted">Ruang H.4.12</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Jumat</div>
                            <div class="card-body">
                                <p class="mb-2"><strong>07:00 - 09:30</strong></p>
                                <p class="small m-0">Probabilitas dan Statistik</p>
                                <p class="small m-0 text-muted">Ruang H.4.10</p>
                                <hr class="my-2">
                                <p class="mb-2"><strong>12:30 - 15:00</strong></p>
                                <p class="small m-0">Sistem Operasi</p>
                                <p class="small m-0 text-muted">Ruang H.5.3</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Sabtu</div>
                            <div class="card-body text-center d-flex align-items-center justify-content-center h-100">
                                <p class="m-0 text-muted fst-italic">Tidak ada kegiatan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                         <div class="card shadow h-100 border-primary">
                            <div class="card-header bg-primary text-white text-center fw-bold">Minggu</div>
                            <div class="card-body text-center d-flex align-items-center justify-content-center">
                                <p class="m-0 text-muted fst-italic">Tidak ada kegiatan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

     <section id="article" class="py-5 bg-custom-hero">
    <div class="container">
        <h1 class="text-center mb-5 fw-bold text-primary">article</h1>
        
        <div class="row g-4 justify-content-center">
        <?php 
        $sql = "SELECT * FROM article ORDER BY tanggal DESC"; 
        $hasil = $conn->query($sql);
        
        $i = 0; 
        if ($hasil->num_rows > 0) {
            while ($row = $hasil->fetch_assoc()) {
                
                $i++; 
                // Logika Layout Dinamis (col-md-6 dan col-md-4)
                if ($i == 1 || $i == 2) {
                    $lebar_kolom = 'col-md-6'; 
                } else {
                    $lebar_kolom = 'col-md-4'; 
                }
                
                if ($i == 5) {
                    $i = 0;
                }
        ?>
            <div class="<?= $lebar_kolom ?>"> 
                <div class="card h-100 shadow-sm border-primary">
                    <img src="img/<?= $row["gambar"] ?>" class="card-img-top card-img-top-article" alt="Gambar Artikel">
                    
                    <div class="card-body">
                        <h5 class="card-title text-dark"><?= $row["judul"] ?></h5>
                        <p class="card-text text-secondary"><?= substr($row["isi"], 0, 80) . '...' ?></p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <small class="text-body-secondary">
                            <?= $row["tanggal"] ?>
                        </small>
                    </div>
                </div>
            </div>
        <?php 
            } // end while
        } else {
            echo "<p class='text-center text-muted'>Tidak ada artikel yang ditemukan.</p>";
        }
        ?>
        </div>
    </div>
</section>
        
        <section id="gallery" class="py-5 bg-light">
            <div class="container">
                 <h1 class="text-center mb-5 text-dark fw-bold">Dokumentasi Kampus Udinus</h1>

                <div class="row g-4 justify-content-center"> 
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://dinus.ac.id/wp-content/uploads/2022/11/Selected-64-1-scaled.jpg" class="card-img-top" alt="Gedung Fakultas Ilmu Komputer (FIK)" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Fakultas Ilmu Komputer (FIK)</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://dinus.ac.id/wp-content/uploads/2022/11/Selected-65-1-scaled.jpg" class="card-img-top" alt="Gedung Fakultas Ekonomi dan Bisnis (FEB)" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Fakultas Ekonomi dan Bisnis (FEB)</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://jatengtoday.com/wp-content/uploads/2023/09/IMG-20230901-WA0019.jpg" class="card-img-top" alt="Gedung Fakultas Kesehatan (FKes)" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Fakultas Kesehatan (FKes)</p></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://www.radioidola.com/wp-content/uploads/2024/03/Becak-Listrik-Kampus-Universitas-Dian-Nuswantoro_2.jpg" class="card-img-top" alt="Gedung Fakultas Teknik (FT)" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Fakultas Teknik</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://dinus.ac.id/wp-content/uploads/2024/09/DNS5341-scaled.jpg" class="card-img-top" alt="Penerimaan Mahasiswa Baru UDINUS" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Penerimaan Maba</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://dinus.ac.id/wp-content/uploads/2022/11/Selected-72-scaled.jpg" class="card-img-top" alt="Gedung Fakultas Ilmu Budaya (FIB)" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Fakultas Ilmu Budaya</p></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5qymLxn-8GJV9sn4jUSz-u6Zf5n6vTHRqAQ&s" class="card-img-top" alt="Gedung Fakultas Kedokteran (FK)" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Fakultas Kedokteran</p></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center">
                            <img src="https://cdn.antaranews.com/cache/800x533/2022/01/11/20220111_134640-0.jpg" class="card-img-top" alt="Pratama Arhan Atlet berprestasi dari UDINUS" style="height: 180px; object-fit: cover;">
                            <div class="card-body"><p class="card-text fw-bold">Atlet Pratama Arhan</p></div>
                        </div>
                    </div>
                    </div>
            </div>
        </section>
        
        <section id="contact" class="py-5 bg-custom-hero">
            <div class="container">
                <h2 class="text-center text-primary mb-4">Yuk, Ngobrol Santai!👋🏻</h2>
                <p class="text-center mb-5">Punya ide seru, pertanyaan, atau sekedar ingin kenalan? Tulis aja di bawah, ya!</p>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow h-100 border-primary">
                            <div class="card-body">
                                <h4 class="card-title text-dark">Kirim Pesan</h4>
                                <form action="#" method="POST">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Anda</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Pesan Anda</label>
                                        <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="card shadow h-100 border-primary">
                            <div class="card-body">
                                <h4 class="card-title text-dark">Informasi Kontak</h4>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="bi bi-envelope-fill text-primary me-2"></i> <strong>Email:</strong> deviiapermata123@gmail.com</li>
                                    <li><i class="bi bi-telephone-fill text-primary me-2"></i> <strong>Telepon:</strong> +62 82137815566</li>
                                    <li><i class="bi bi-geo-alt-fill text-primary me-2"></i> <strong>Lokasi:</strong> Semarang, Jawa Tengah</li>
                                </ul>
                                
                                <h4 class="card-title text-dark mt-4">Media Sosial</h4>
                                <div class="mt-3">
                                 <div class="mt-3">
                                     <a href="https://www.instagram.com/defiyepr?igsh=aGtxNzBwZDM5Y3Uw&utm_source=qr" 
                                      target="_blank" 
                                       class="btn btn-outline-primary shadow-sm rounded-circle p-2" 
                                        style="width: 45px; height: 45px;">
                                           <i class="bi bi-instagram"></i>
                                     </a>

                                     <a href="https://wa.me/6282137815566" 
                                         target="_blank" 
                                          class="btn btn-outline-success shadow-sm rounded-circle p-2 ms-2" 
                                              style="width: 45px; height: 45px;">
                                               <i class="bi bi-whatsapp"></i>
                                                  </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-dark text-white text-center py-3" style="background-color: #d17887 !important;">
        <div class="container">
            <p class="m-0">&copy; 2025 | Devia Permata Adie - Teknik Informatika</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        
        function setTheme(theme) {
            document.documentElement.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);

            const darkModeBtn = document.getElementById('dark-mode-toggle');
            const lightModeBtn = document.getElementById('light-mode-toggle');

            if (theme === 'dark') {
                darkModeBtn.classList.remove('btn-outline-dark');
                darkModeBtn.classList.add('btn-dark');
                lightModeBtn.classList.remove('btn-secondary');
                lightModeBtn.classList.add('btn-outline-secondary');
            } else {
                darkModeBtn.classList.remove('btn-dark');
                darkModeBtn.classList.add('btn-outline-dark');
                lightModeBtn.classList.remove('btn-outline-secondary');
                lightModeBtn.classList.add('btn-secondary');
            }
        }

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            setTheme(savedTheme);
        } else {
            setTheme('light'); 
        }

        document.getElementById('dark-mode-toggle').addEventListener('click', () => {
            setTheme('dark'); 
        });

        document.getElementById('light-mode-toggle').addEventListener('click', () => {
            setTheme('light');
        });
    </script>
</body>
</html>