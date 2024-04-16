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

if(isset($_FILES['img'])){
    // Mendapatkan ID user dari POST
    $id = $_POST['id_user'];

    // Mendapatkan informasi file gambar yang diupload
    $nm_img = $_FILES['img']['name'];
    $ukuran = $_FILES['img']['size'];
    $tmpt = $_FILES['img']['tmp_name'];
    $eror = $_FILES['img']['error'];

    // Jika tidak ada gambar yang diupload
    if($eror === 4 ){
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // Periksa ekstensi gambar yang diupload
    $extensi_img_valid = ['jpg','jpeg','png'];
    $extensi_img = pathinfo($nm_img, PATHINFO_EXTENSION);
    $extensi_img = strtolower($extensi_img);

    if(!in_array($extensi_img, $extensi_img_valid)){
        echo "<script>alert('Anda hanya bisa mengupload file jpg, jpeg, dan png!');</script>";
        return false;
    }

    // Pindahkan file gambar yang diupload ke direktori tujuan
    $tujuan = 'assets/upload/'.$nm_img;
    if(!move_uploaded_file($tmpt, $tujuan)){
        echo "<script>alert('Gagal mengupload gambar!');</script>";
        return false;
    }

    // Update nama gambar ke dalam database
    $sql ="UPDATE tb_user SET img='$nm_img' WHERE id_user = '$id' ";
    mysqli_query($koneksi, $sql);

    // Periksa apakah update berhasil
    if(mysqli_affected_rows($koneksi)){
        header("location: profile.php");
    } else {
        echo "Gagal mengupdate gambar.";
    }
}

?>