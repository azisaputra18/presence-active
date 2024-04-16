<?php include("index.php");
 include("config/koneksi.php");
 $email= $_SESSION['email'];
 $hasil = mysqli_query($koneksi,"select * from tb_user where email='$email'");
 $tampil = mysqli_fetch_assoc($hasil);
?>

<div class="card text-center">
  <div class="card-header">
    <img src="assets/img/user/user.png" width="100px">
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=$tampil['nama']; ?></h5>
   
    <a href="persensi.php" class="btn btn-primary">Persensi</a>
  </div>
  <div class="card-footer text-muted">
    
   <h5>Waktu saat ini</h5>
    <p id="timestamp"></p>
 
 <script>

 // Function ini dijalankan ketika Halaman ini dibuka pada browser
 $(function(){
 setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
 });
  
 //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax.php
 function timestamp() {
 $.ajax({
 url: 'ajax.php',
 success: function(data) {
 $('#timestamp').html(data);
 },
 });
 }
 </script>
  </div>
</div>
</body>
</html>