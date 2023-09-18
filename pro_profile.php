<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php");
}

    //koneksi databases
    include("config/koneksi.php");

 if(isset($_POST['submit'])){
      
        $id = $_POST['id_user'];
        $nama = $_POST['nama'];
        $kls = $_POST['kls'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $tlpn = $_POST['tlpn'];

        //sql
        $sql = "UPDATE tb_user SET 
        nama ='$nama', 
        kls = '$kls',
        alamat = '$alamat',
        email = '$email',
        tlpn = '$tlpn'
        WHERE id_user = '$id' ";

        //query masukan data ke databases
            mysqli_query($koneksi,$sql);

    if(mysqli_affected_rows($koneksi)){
        echo "
        <script>
           alert('data berhasil di ubah!!');
           document.location.href='profile.php';
        </script> 
        ";
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id_user'];

//tampung img
    $nm_img= $_FILES['img']['name'];
    $ukuran = $_FILES['img']['size'];
    $tmpt = $_FILES['img']['tmp_name'];
    $eror = $_FILES['img']['error'];

//ketika gambar tidak di upload
if($eror === 4 ){
        echo "
    <script>
    alert('pilih gambar terlebih dahulu!');
    </script> ";
    return false;
    }


//gambar yg di upload
    $ektensiimgvalid = ['jpg','jpeg','png'];
    $ektensi_img = explode('.',$nm_img);
    $ektensi_img = strtolower(end($ektensi_img));

if(!in_array($ektensi_img,$ektensiimgvalid)){
echo "
     <script>
     alert('anda hanya bisa mengupload file jpg , jpeg dan png !!');
     </script> ";
return false;
}

//lolos pengecekan ,lanjut upload
move_uploaded_file( $tmpt,'/assets/img/user/'. $nm_img);

//mendefinisikan folder
define('UPLOAD_DIR', 'assets/img/user/');

//menangkap variabel
// $name       = $_POST['name'];
// $img        = $_POST['img'];
// $email       = $_POST['email'];
// $kls         = $_POST['kls'];

$nm_img        = str_replace('data:image/jpeg;base64,', '', $nm_img);
$nm_img        = str_replace(' ', '+', $nm_img);

//resource gambar diubah dari encode
$data       = base64_decode($nm_img);

//menamai file, file dinamai secara random dengan unik
$file       = uniqid() . '.png';

//memindahkan file ke folder upload
file_put_contents(UPLOAD_DIR.$file, $data);
//sql
    $sql ="UPDATE tb_user SET img='$file' WHERE id_user = '$id' ";
    mysqli_query($koneksi,$sql);
//query masukan data ke databases
if(mysqli_affected_rows($koneksi)){
    header("location:profile.php");
}
else{
    mysqli_error($koneksi);
    }
}

?>