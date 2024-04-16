<?php
 //koneksi databases
 include("../config/koneksi.php");

//menangkap id
$id = $_GET['id'];

//query ke tabel admin
if(mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user = $id")>0) {
    echo "
 <script>
    alert('data berhasil di hapus !!');
    document.location.href='user.php';
 </script> 
 ";
}
?>