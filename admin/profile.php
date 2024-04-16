<?php 
 include("index.php");
 include("../config/koneksi.php");
    $email= $_SESSION['email'];
    $hasil = mysqli_query($koneksi,"select * from tb_user where email='$email'");
    $tampil = mysqli_fetch_assoc($hasil);

?>
<title>Profile</title>
<link rel="stylesheet" href="assets/css/profile.css">
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="profile.php" target="__blank">Admin Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="assets/img/<?= $tampil["img"];?>">
                    <div class="small font-italic mb-4 text-danger">JPG or PNG images cannot be larger than 5 MB</div>
                    <div class="input-group mb-3">

                     <form action="pro_profile.php" method="post" enctype="multipart/form-data">
                         <input class="form-control" id="inputUsername" name="id_user" type="hidden" value="<?= $tampil["id_user"];?>"">
                        <input type="file" class="form-control" id="inputGroupFile01" name="img">
                    </div>
                    <br>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="submit" name="update">Upload new image</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">

                    <form action="pro_profile.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username student</label>
                            <input class="form-control" id="inputUsername" name="id_user" type="hidden" value="<?= $tampil["id_user"];?>">
                        </div>
                          
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username student</label>
                            <input class="form-control" id="inputUsername" name="nama" type="text" value="<?= $tampil["nama"];?>" placeholder="Enter your username">
                        </div>
                        
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Kelas</label>
                                <input class="form-control" id="inputFirstName" name="kls" type="text" value="<?= $tampil["kls"];?>" placeholder="Enter your Class">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Email</label>
                                <input class="form-control" id="inputLastName" name="email" type="text" value="<?= $tampil["email"];?>" placeholder="Enter your last name">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">cell phone number</label>
                                <input class="form-control" id="inputOrgName" name="tlpn" type="text" value="<?= $tampil["tlpn"];?>" placeholder="Enter your organization name">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">address</label>
                                <input class="form-control" id="inputLocation" name="alamat" type="text" value="<?= $tampil["alamat"];?>" placeholder="Enter your location">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Status </label>
                                <input class="form-control" id="inputOrgName" name="level" type="text" required readonly="readonly" value="<?= $tampil["level"];?>" placeholder="Enter your organization name">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Password</label>
                                <input class="form-control" id="inputLocation" name="password" type="text" value="<?= $tampil["password"];?>" placeholder="Enter your location">
                            </div>
                        </div>
                      
                        <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>