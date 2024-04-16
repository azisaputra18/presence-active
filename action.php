<?php
//koneksi ke database
include("config/koneksi.php");

//mendefinisikan folder
define('UPLOAD_DIR', 'admin/upload/');

//menangkap variabel
$nama       = $_POST['name'];
$kelas      = $_POST['kls'];
$jam        = $_POST['jam'];
$tgl        = $_POST['tgl'];
$email      = $_POST['email'];
$img        = $_POST['img'];
$status     = "proses";

$img        = str_replace('data:image/jpeg;base64,', '', $img);
$img        = str_replace(' ', '+', $img);

//resource gambar diubah dari encode
$data       = base64_decode($img);

//menamai file, file dinamai secara random dengan unik
$file       = uniqid() . '.png';

//memindahkan file ke folder upload
file_put_contents(UPLOAD_DIR.$file, $data);

//memasukkan data ke dalam tabel biodata
mysqli_query($koneksi, "insert into tb_absen set name='$nama',kls='$kelas',jam='$jam',tgl='$tgl',email='$email',img='$file',status='$status'");
?>