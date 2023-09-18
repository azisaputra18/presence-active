<?php 
include("index.php");
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
    <h5 class="card-title"><?= $_SESSION['email'];?></h5>
    <p class="card-text">Lakukan persensi anda sekarang</p>
    <form id="form">
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1 fw-bold">Nama Siswa</label>
            <input class="form-control text-center" id="name" type="text" required readonly="readonly" name="name" value="<?=$tampil['nama']; ?>"required>
        </div>
        <div class="col-md-6">
            <label class="small mb-1 fw-bold ">Kelas</label>
            <input class="form-control text-center" id="kls" type="text" required readonly="readonly" name="kls" value="<?=$tampil['kls']; ?>"required>
        </div>
        <div class="col-md-6">
            <label class="small mb-1 fw-bold ">Waktu</label>
            <input class="form-control text-center" type="text" required readonly="readonly" name="jam" id="jam"  value="" name="tgl" required>
        </div>
        <div class="col-md-6">
            <label class="small mb-1 fw-bold ">Tanggal</label>
            <input class="form-control text-center" type="text" required readonly="readonly" name="tgl" id="tgl"  value="<?= date("j F Y");?>" name="tgl" required>
        </div>
        </div>
        <div class="col-md-6" style="display: unset;">
            <label class="small mb-1 fw-bold">email</label>
            <input class="form-control text-center" id="email" type="text" name="email" required readonly="readonly" value="<?= $_SESSION['email'];?>"required>
        </div>
        </div>
          <div class="card" style="align-items: center;margin-top:20px">
          <div id="my_camera"></div>
		</div>
		</div>
		</div>
        <br>
        <div class="mb-3" style="display:flex; justify-content: space-evenly;">
        <button type="submit" class="tombol-simpan btn btn-primary" style="width: 200px;">persensi</button>
        </div>
    </form>
    <br>
  </div>
  <div class="card-footer text-center text-muted">
   <p> Copyright © 2023. Azi saputra</p>
  </div>
</div>
<div id="name">
 <!-- webcamjs  -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
   <!-- jquery  -->
   <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
     <script language="JavaScript">
        // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        //menampilkan webcam di dalam file html dengan id my_camera
        Webcam.attach('#my_camera');

    </script>

    <script type="text/javascript">
        // saat dokumen selesai dibuat jalankan fungsi update
        $(document).ready(function () {
            update();
        });

        // jalankan aksi saat tombol persensi disubmit
        $(".tombol-simpan").click(function () {
            event.preventDefault();

            // membuat variabel image
            var image = '';

            //mengambil data uername dari form di atas dengan id name
            //var nama = $('#name').val();
            $nama = $('#name').val();

            //mengambil data kls dari form di atas dengan id kls
            var kelas = $('#kls').val();

            //mengambil data kls dari form di atas dengan id jam
            var waktu = $('#jam').val();

            //mengambil data kls dari form di atas dengan id tgl
            var tanggal = $('#tgl').val();

            //mengambil data kls dari form di atas dengan id tgl
            var email = $('#email').val();

            //memasukkan data gambar ke dalam variabel image
            Webcam.snap(function (data_uri) {
                image = data_uri;
            });

            //mengirimkan data ke file action.php dengan teknik ajax
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: {
                    name: $nama,
                    kls: kelas,
                    jam: waktu,
                    tgl: tanggal,
                    email: email,
                    img: image
                },
                success: function () {
                    alert('anda telah berhasil melakukan persensi!');
            document.location.href = 'riwayat_proses.php';
                }
            })
        });

        // Function ini dijalankan ketika Halaman ini dibuka pada browser
 $(function(){
 setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
 });
  
 //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax.php
 function timestamp() {
 $.ajax({
 url: 'ajax.php',
 success: function(data) {
 $('#jam').val(data);
 },
 });
 }
    </script>
</body>
</html>
