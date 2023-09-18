<?php 
// koneksi database 
include("../config/koneksi.php");

$id = $_GET['id'];

$koneksi->query("UPDATE tb_absen SET status = 'selesai' WHERE id_absen = $id") or die(mysqli_error($koneksi));

	echo "<script>window.location='riwayat_selesai.php';</script>";

?>