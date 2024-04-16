<?php 
// session_start();

// if(!isset($_SESSION["login"])){
//     header("location:index.php");
//     exit;

// };

// include sidelbar dari tabel index
include("../config/koneksi.php");
include("index.php");
$email= $_SESSION['email'];

//koneksi database
$hasil = mysqli_query($koneksi,"select * from tb_user");
$assoc = mysqli_fetch_assoc($hasil);
$row = mysqli_num_rows($hasil);
?>
<style>
.img-t{
  width: 50px;
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
</style>

<div class="row" style="margin-top:100px">
<nav style="display:flex;justify-content: space-between;">
        <a class="nav-link text-primary" href="riwayat.php" target="__blank"><h5>User Accontn</h5></a>
        
        <div class="btn">
        <a href="adduser.php"><button type="submit" class="btn btn-primary">Add User</button></a>
        <a href="excel.php"><button type="submit" class="btn btn-success">import from excel</button></a>
        </div>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="card">
        <br>
        <div style="display:flex;justify-content: space-between;">
        <p style="text-left fw-bold" >Total : <?=$row?></p>
        <div>
      <p class="fw-bold" style="display: flex; float: left; margin: 10px;">Search : </p>
      <input type="search" class="form-control light-table-filter" style="width:200px" data-table="table-striped" placeholder="Mencari..." />
      </div> </div>
        <br>
        <div class="table-responsive text-nowrap">
         <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Adress</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Password</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
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
              <img class="img-t" src="assets/img/<?= $tampil["img"];?>" alt="">
            </th>
            <th scope="row"><?= $tampil["nama"];?></th>
            <th scope="row"><?= $tampil["kls"];?></th>
            <th scope="row"><?= $tampil["alamat"];?></th>
            <th scope="row"><?= $tampil["email"];?></th>
            <th scope="row"><?= $tampil["tlpn"];?></th>
            <th scope="row"><?= $tampil['password'];?></th>
            <th scope="row"><?= $tampil['level'];?></th>
            <th scope="row">
            <a href="deletuser.php?id=<?=$tampil['id_user']?>"><button type="submit" class="btn btn-danger">Delet</button></a>
                
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
            (function(document) {
            'use strict';
            
            var LightTableFilter = (function(Arr) {
            
            var _input;
            
            function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                Arr.forEach.call(tbody.rows, _filter);
                });
            });
            }
            
            function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
            }
            
            return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                input.oninput = _onInputEvent;
                });
            }
            };
            })(Array.prototype);
            
            document.addEventListener('readystatechange', function() {
            if (document.readyState === 'complete') {
            LightTableFilter.init();
            }
            });
 
        })(document);
        </script>
    