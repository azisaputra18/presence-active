<?php 
include("index.php");
include("../config/koneksi.php");

$a = mysqli_query($koneksi, "select * from tb_user");
$b = mysqli_query($koneksi, "select * from tb_absen");
$c = mysqli_query($koneksi, "select * from tb_user where level='siswa'");

$user = mysqli_num_rows($a);
$absen = mysqli_num_rows($b);
$siswa = mysqli_num_rows($c);
?>

<style>
    .grey-bg {  
    background-color: #F5F7FA;
}
</style>
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<div style="margin-top:50px">
<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase fw-bold">Statistics Dashboard</h4>
        <p class="text-success">Green Maps Persensi </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class='bx bx-line-chart success font-large-2 float-left'></i>
                </div>
                <div class="media-body text-right">
                  <h3><?=$absen?></h3>
                  <span>Percentage Students</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class='bx bxs-school danger font-large-2 float-left'></i>
                </div>
                <div class="media-body text-right">
                  <h3>3</h3>
                  <span>All Classes</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success"><?=$siswa?></h3>
                  <span>All Students</span>
                </div>
                <div class="align-self-center">
                <i class='bx bx-user warning font-large-2 float-right' ></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning"><?=$user?></h3>
                  <span>User Acount</span>
                </div>
                <div class="align-self-center">
                <i class='bx bxs-user-account primary font-large-2 float-right'></i>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
    <div class="row" style="margin-top:300px">
   <p>Copyright @ Azi saputra 2023</p>
  </div>
  </section>
</div>
<body>