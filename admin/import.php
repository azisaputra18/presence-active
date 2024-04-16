<?php
// Load file koneksi.php
include "koneksi.php";

// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = $_POST['namafile'];
    $path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$nama    = $row['A']; // Ambil data nama
		$kls     = $row['B']; // Ambil data kls
		$almat   = $row['C']; // Ambil data jenama kelamin
		$email   = $row['D']; // Ambil data jenama kelamin
		$telp    = $row['E']; // Ambil data telepon
		$img     = $row['F']; // Ambil data img
		$pass    = $row['G']; // Ambil data password
		$lavel   = $row['H']; // Ambil data lavel

		// Cek jika semua data tidak diisi
		if ($nama == "" && $kls == "" && $almat == "" && $email == "" && $telp == "" && $img == "" && $pass == "" && $lavel == "")
		continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Buat query Insert
			$query = "INSERT INTO tb_user VALUES('','" . $nama . "','" . $kls . "','" . $almat . "','" .$email . "','" . $telp . "','" . $img . "','" . $pass . "','" . $lavel . "')";

			// Eksekusi $query
			mysqli_query($connect, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}

header('location: excel.php'); // Redirect ke halaman awal
