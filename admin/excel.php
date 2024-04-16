<?php 
 include("index.php");
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
            <p> Make sure the data you import matches the data in this MYSQL database!!!</p>
                <p class="text-drak">Thank You</p>

                <a href="form.php"><button type="submit" class="btn btn-success">Import Data from Excel</button></a>
            </div>
        </div>
        </div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account User Data</div>
                  <div class="card-body">
                      <div class="table-responsive text-nowrap">
                         <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Img</th>
                            <th>Password</th>
                            <th>Lavel</th>
                        </tr>
                        <?php
                        // Load file koneksi.php
                        include "koneksi.php";

                        // Buat query untuk menampilkan semua data siswa
                        $sql = mysqli_query($connect, "SELECT * FROM tb_user");

                        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $data['nama']     . "</td>";
                            echo "<td>" . $data['kls']      . "</td>";
                            echo "<td>" . $data['alamat']    . "</td>";
                            echo "<td>" . $data['email']    . "</td>";
                            echo "<td>" . $data['tlpn']     . "</td>";
                            echo "<td>" . $data['img']      . "</td>";
                            echo "<td>" . $data['password'] . "</td>";
                            echo "<td>" . $data['level']    . "</td>";
                            echo "</tr>";

                            $no++; // Tambah 1 setiap kali looping
                        }
                        ?>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
