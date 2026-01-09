<?php
include "upload_foto.php"; 

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES['gambar']);
        if ($cek_upload['status']) {
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>alert('" . $cek_upload['message'] . "'); document.location='admin.php?page=article';</script>";
            die;
        }
    }

    $stmt = $conn->prepare("INSERT INTO article (judul, isi, gambar, tanggal, username) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $judul, $isi, $gambar, $tanggal, $username);
    $simpan = $stmt->execute();

    if ($simpan) {
        echo "<script>alert('Simpan data sukses'); document.location='admin.php?page=article';</script>";
    } else {
        echo "<script>alert('Simpan data gagal'); document.location='admin.php?page=article';</script>";
    }
    $stmt->close();
}

// 2. Aksi Update Data (Edit)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = $_POST['gambar_lama'];
    $nama_gambar = $_FILES['gambar']['name'];

    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES['gambar']);
        if ($cek_upload['status']) {
            if ($gambar != "" && file_exists("img/" . $gambar)) {
                unlink("img/" . $gambar); 
            }
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>alert('" . $cek_upload['message'] . "'); document.location='admin.php?page=article';</script>";
            die;
        }
    }

    $stmt = $conn->prepare("UPDATE article SET judul = ?, isi = ?, gambar = ? WHERE id = ?");
    $stmt->bind_param("sssi", $judul, $isi, $gambar, $id);
    $update = $stmt->execute();

    if ($update) {
        echo "<script>alert('Update data sukses'); document.location='admin.php?page=article';</script>";
    } else {
        echo "<script>alert('Update data gagal'); document.location='admin.php?page=article';</script>";
    }
    $stmt->close();
}

// 3. Aksi Hapus Data
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != "" && file_exists("img/" . $gambar)) {
        unlink("img/" . $gambar); 
    }

    $stmt = $conn->prepare("DELETE FROM article WHERE id = ?");
    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>alert('Hapus data sukses'); document.location='admin.php?page=article';</script>";
    } else {
        echo "<script>alert('Hapus data gagal'); document.location='admin.php?page=article';</script>";
    }
    $stmt->close();
}
?>

<div class="container pt-0">
    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Article
    </button>


    <div class="row">
        <div class="col-12">
            <div class="table-responsive" id="article_data">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul Artikel" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi</label>
                            <textarea class="form-control" name="isi" placeholder="Isi Artikel" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    load_data();
    function load_data(hlm){
        $.ajax({
            url : "article_data.php",
            method : "POST",
            data : {
                hlm: hlm
            },
            success : function(data){
                $('#article_data').html(data);
            }
        })
    } 
    
    // Klik halaman pagination
    $(document).on('click', '.halaman', function(){
        var hlm = $(this).attr("id");
        load_data(hlm);
    });
});
</script>