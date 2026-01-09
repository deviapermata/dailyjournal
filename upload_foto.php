<?php 
/**
 * Fungsi untuk menangani upload foto ke direktori img/
 * Nama File: upload_photo.php
 * @param array $File $_FILES['input_name'] dari form
 * @return array Berisi status (bool) dan message (string nama file baru atau pesan error)
 */
function upload_foto($File){    
	$uploadOk = 1;
	$hasil = array();
	$message = '';
 
	// Properti File:
	$FileName = $File['name'];
	$TmpLocation = $File['tmp_name'];
	$FileSize = $File['size'];

	// Mendapatkan ekstensi file:
	$FileExt = explode('.', $FileName);
	$FileExt = strtolower(end($FileExt));

	// Format file yang diizinkan:
	$Allowed = array('jpg', 'png', 'gif', 'jpeg');  

	// 1. Cek apakah ada file yang diunggah
	if ($FileSize == 0) {
		$message .= "Pilih file terlebih dahulu. ";
		$uploadOk = 0;
	}

	// 2. Cek ukuran file (Maksimal 500KB)
	if ($FileSize > 500000) {
		$message .= "Maaf, ukuran file terlalu besar, maksimal 500KB. ";
		$uploadOk = 0;
	}

	// 3. Cek format file
	if(!in_array($FileExt, $Allowed)){
		$message .= "Maaf, hanya format JPG, JPEG, PNG & GIF yang diizinkan. ";
		$uploadOk = 0; 
	}

	// 4. Cek/Buat folder tujuan jika belum ada
	if (!is_dir("img")) {
		mkdir("img", 0777, true);
	}

	// Jika ada error pada pengecekan di atas
	if ($uploadOk == 0) {
		$message .= "File gagal diunggah. ";
		$hasil['status'] = false; 
	} else {
		// Jika semua OK, buat nama file baru berdasarkan timestamp agar unik:
        $NewName = date("YmdHis"). '.' . $FileExt;
        $UploadDestination = "img/". $NewName; 

		if (move_uploaded_file($TmpLocation, $UploadDestination)) {
			$message = $NewName;
			$hasil['status'] = true; 
		} else {
			$message = "Maaf, terjadi kesalahan saat memindahkan file ke folder tujuan. Pastikan folder 'img' memiliki izin tulis (write permission).";
			$hasil['status'] = false; 
		}
	}
	
	$hasil['message'] = $message; 
	return $hasil;
}
?>