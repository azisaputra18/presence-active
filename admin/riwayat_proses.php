<?php 
// session_start();

// if(!isset($_SESSION["login"])){
//     header("location:login.php");
//     exit;

// };

include("../config/koneksi.php");
include("index.php");
$email= $_SESSION['email'];

//koneksi database
$hasil = mysqli_query($koneksi,"select * from tb_absen WHERE status='proses'  ORDER BY jam && tgl ASC");
$assoc = mysqli_fetch_assoc($hasil);
$row = mysqli_num_rows($hasil);
?>
<style>
.img-t{
  width: 80px;
  aspect-ratio: 1/1;
  object-fit: cover;
  border-radius: 1px;
}

.form-control{
  width: 25%;
}
input[type=search]
{
  float: right;
  border:1px solid #0af;
  margin-bottom: 10px;
}

.form-control{
  width: 25%;
}
input[type=search]
{
  float: right;
  border:1px solid #0af;
  margin-bottom: 10px;
}
.img-t {
  width: 100px;
  height: 100px;
  object-fit: cover;
  cursor: pointer;
  transition: transform .2s;
}

.img-t:hover {
  transform: scale(1.1);
}

.img-fullscreen {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: rgba(0, 0, 0, 0.8);
  text-align: center;
  padding-top: 50px;
  transition: transform .5s;
}

.img-fullscreen img {
  max-width: 100%;
  max-height: 100%;
}
</style>

<div class="row" style="margin-top:100px">
<nav class="nav nav-borders">
        <a class="nav-link text-primary" href="riwayat.php" target="__blank">attendance history</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="card">
        <br>
    <div style="display:flex;justify-content: space-between;">
    <h5 style="text-left fw-bold">Total : <?=$row?></h5>
  <div>
   <p class="fw-bold" style="display: flex; float: left; margin: 10px;">Search : </p>
   <input type="search" class="form-control light-table-filter" style="width:200px" data-table="table-striped" placeholder="Mencari..." />
   </div>
    </div>
    <br>
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
            <th scope="row">
              
            <div class="img-t" id="img1">
              <img class="img-t" src="upload/<?= $tampil["img"];?>">
            </div>
            <div class="img-fullscreen" id="imgFullscreen">
              <img src="" id="fullscreenImg" alt="SIswa Fullscreen">
            </th>

            <th scope="row"><?= $tampil["name"];?></th>
            <th scope="row"><?= $tampil["kls"];?></th>
            <th scope="row"><?= $tampil['email'];?></th>
            <th scope="row"><?= $tampil["jam"];?></th>
            <th scope="row"><?= $tampil["tgl"];?></th>
            <th scope="row">

              <a href="pro_selesai.php?id=<?=$tampil['id_absen']?>">
                 <button type="button" class="btn btn-success text-dark fw-bold">✔</button>
              </a>
              <a href="pro_ditolak.php?id=<?=$tampil['id_absen']?>">
                 <button type="button" class="btn btn-danger text-dark fw-bold">✖</button>
              </a>
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
      
        <script>
         
              document.getElementById('img1').addEventListener('click', function() {
              document.getElementById('fullscreenImg').src = this.getElementsByTagName('img')[0].src;
              document.getElementById('imgFullscreen').style.transform = 'translate(-50%, -50%) scale(1)';
            });

            document.getElementById('imgFullscreen').addEventListener('click', function() {
              this.style.transform = 'translate(-50%, -50%) scale(0)';
            });

        //     (function(document) {
        //     'use strict';
            
        //     var LightTableFilter = (function(Arr) {
            
        //     var _input;
            
        //     function _onInputEvent(e) {
        //     _input = e.target;
        //     var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        //     Arr.forEach.call(tables, function(table) {
        //         Arr.forEach.call(table.tBodies, function(tbody) {
        //         Arr.forEach.call(tbody.rows, _filter);
        //         });
        //     });
        //     }
            
        //     function _filter(row) {
        //     var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        //     row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        //     }
            
        //     return {
        //     init: function() {
        //         var inputs = document.getElementsByClassName('light-table-filter');
        //         Arr.forEach.call(inputs, function(input) {
        //         input.oninput = _onInputEvent;
        //         });
        //     }
        //     };
        //     })(Array.prototype);
            
        //     document.addEventListener('readystatechange', function() {
        //     if (document.readyState === 'complete') {
        //     LightTableFilter.init();
        //     }
        //     });
 
        // })(document);
        </script>
    