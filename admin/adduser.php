<?php 
 include("index.php");
 include("../config/koneksi.php");

if(isset($_POST['submit'])){
    $un = $_POST['nama'];
    $kls = $_POST['kls'];
    $tlpn = $_POST['tlpn'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $lavel= $_POST['level'];

//enkripsi password
    $pwdh = password_hash($pwd,PASSWORD_DEFAULT);

//proses simpan
    mysqli_query($koneksi,"INSERT INTO tb_user VALUES(NULL,'$un','$kls','$alamat','$email','$tlpn','user.png','$pwd','$lavel')");
    if(mysqli_affected_rows($koneksi)){
        echo "
        <script>
           alert('data tersimpan');
           document.location.href='user.php';
        </script> 
        ";
    }
}
?>

<title>Profile</title>
<link rel="stylesheet" href="assets/css/profile.css">
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="profile.php" target="__blank">Add user</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">

            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">user warning</div>
                <div class="card-body text-center">
                 <h4 class=" text-danger">Warning !!</h4>
                 <p>Make sure the user account input you create is correct,
                     always be careful, 
                     so that there are no errors later on the part of the user who will log in</p>
                     <p class="text-drak">Thank You</p>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Form Add Account User</div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username user</label>
                            <input class="form-control" id="inputUsername" name="nama" type="text" placeholder="Enter username">
                        </div>
                        <!-- Form Group (Email)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Email user</label>
                            <input class="form-control" id="inputUsername" name="email" type="text" placeholder="Enter email">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Class)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Class</label>
                                <input class="form-control" id="inputFirstName" name="kls" type="text" placeholder="Enter class">
                            </div>
                            <!-- Form Group (Number phon)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Number Phone</label>
                                <input class="form-control" id="inputLastName" name="tlpn" type="text"  placeholder="Enter Number Phone">
                            </div>
                        </div>
                            <!-- Form Group (Adress)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputFirstName">Address</label>
                                <input class="form-control" id="inputFirstName" name="alamat" type="text" placeholder="Enter status">
                            </div>
                            <!-- Form Group (photo)-->
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Photo user</label>
                                <input class="form-control" id="inputLastName" name="img" type="text">
                            </div>
                        </div> -->
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Status</label><br>
                            <!-- <button class="btn btn-primary dropdown-toggle" type="button"  name="level" id="basicDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select an Option
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="basicDropdown">
                                <li><a class="dropdown-item"  name="admin" value="admin">Admin</a></li>
                                <li><a class="dropdown-item"  name="siswa" value="siswa">siswa</a></li>
                            </ul> -->
                            <div class="input-group mb-3">
                            <select class="form-select"  name="level" id="inputGroupSelect02" style="height:49px;">
                                <option selected>Select an Option</option>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>  
                            </select>
                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>
                       
                            <!-- Form Group (password)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Password</label>
                                <input class="form-control" id="inputLastName" name="password" type="text"  placeholder="Enter password">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit" name="submit" style="margin-top:30px;">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>