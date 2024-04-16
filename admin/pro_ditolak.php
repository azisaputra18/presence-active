<?php 
// koneksi database 
include("../config/koneksi.php");

$id = $_GET['id'];

$koneksi->query("UPDATE tb_absen SET status = 'rejected' WHERE id_absen = $id") or die(mysqli_error($koneksi));

	echo "<script>window.location='riwayat_proses.php';</script>";

?>