<?php 
// session_start();

// if(!isset($_SESSION["login"])){
//     header("location:login.php");
//     exit;

// };

// include sidelbar dari tabel index
include("config/koneksi.php");
include("index.php");
$email= $_SESSION['email'];

//koneksi database
$hasil = mysqli_query($koneksi,"select * from tb_absen where email='$email' AND status='success'  ORDER BY tgl ASC ");
$assoc = mysqli_fetch_assoc($hasil);
?>
<style>
.img-t{
  width: 80px;
  aspect-ratio: 1/1;
  object-fit: cover;
  border-radius: 1px;
}
</style>
<div class="row" style="margin-top:100px">
<nav class="nav nav-borders">
        <a class="nav-link text-primary" href="riwayat.php" target="__blank">successful attendance</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="card">
    <div class="table-responsive text-nowrap">
         <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Gmail</th>
            <th scope="col">Waktu</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
    <?php
    //loop menggunakan foreach
    $z=1;
    foreach  ($hasil as $tampil) :
    ?>
            <tr>
            <th scope="row"><?=$z++?></th>
            <th scope="row"><img class="img-t" src="admin/upload/<?= $tampil["img"];?>"></th>
            <th scope="row"><?= $tampil["name"];?></th>
            <th scope="row"><?= $tampil["kls"];?></th>
            <th scope="row"><?= $tampil['email'];?></th>
            <th scope="row"><?= $tampil["jam"];?></th>
            <th scope="row"><?= $tampil["tgl"];?></th>
            <th scope="row">
                <button type="button" class="btn btn-success text-light fw-bold"><?= $tampil["status"];?></button>
            </th>
            <!-- <td>
                <button class="btn btn-success">Maps</button>
            </td> -->
            </tr>
    <?php endforeach?>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>