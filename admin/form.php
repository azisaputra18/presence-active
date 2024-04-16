<?php 
 include("index.php");
 // Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
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
            <h4 class=" text-success">Import Data !!</h4>
            <br>
            <form method="post" action="form.php" enctype="multipart/form-data">
            <!-- <a href="Format.xlsx">Download Format</a> &nbsp;|&nbsp; -->
            <input type="file" class="form-control" name="file">
            <br><br>
            <button type="submit" name="preview" class="btn btn-success" >Preview</button>
        </form>
            </div>
        </div>
        </div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account User Data</div>
                  <div class="card-body">
                    
                  <?php
    // Jika user telah mengklik tombol Preview
    if (isset($_POST['preview'])) {
        $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
        $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

        // Cek apakah terdapat file data.xlsx pada folder tmp
        if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
            unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['file']['tmp_name'];

        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if ($ext == "xlsx") {
            // Upload file yang dipilih ke folder tmp
            // dan rename file tersebut menjadi data{tglsekarang}.xlsx
            // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
            // Contoh nama file setelah di rename : data20210814192500.xlsx
            move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='import.php'>";

            // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
            // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
            echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

            // Buat sebuah div untuk alert validasi kosong
            echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";

            echo " <div class='table-responsive text-nowrap'>
                     <div class='table-responsive'>
                         <table class='table table-striped'>
					<tr>
						<th colspan='8' class='text-center'>Preview Data</th>
					</tr>
					<tr>
                        <th>Nama</th>
						<th>Kls</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Tlpn</th>
						<th>Img</th>
						<th>Password</th>
						<th>Lavel</th>
					</tr>";

            $numrow = 1;
            $kosong = 0;
            foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                $nama    = $row['A']; // Ambil data nama
                $kls     = $row['B']; // Ambil data kls
                $almat   = $row['C']; // Ambil data jenama kelamin
                $email   = $row['D']; // Ambil data jenama kelamin
                $telp    = $row['E']; // Ambil data telepon
                $img     = $row['F']; // Ambil data img
                $pass    = $row['G']; // Ambil data password
                $lavel   = $row['H']; // Ambil data lavel

                // Cek jika semua data tidak diisi
                if ($nama == "" && $kls == "" && $almat == "" && $email == "" && $telp == "" && $img == "" && $pass == "" && $lavel == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah kls-kls kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                    $nama_td     = (!empty($nama)) ?     "" : " style='background: #E07171;'"; // Jika nama kosong, beri warna merah
                    $kls_td      = (!empty($kls)) ?      "" : " style='background: #E07171;'"; // Jika kls kosong, beri warna merah
                    $al_td       = (!empty($almat)) ?    "" : " style='background: #E07171;'"; // Jika Jenama Kelamin kosong, beri warna merah
                    $email_td    = (!empty($email)) ?    "" : " style='background: #E07171;'"; // Jika Jenama Kelamin kosong, beri warna merah
                    $telp_td     = (!empty($telp)) ?     "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                    $img_td      = (!empty($img)) ?      "" : " style='background: #E07171;'"; // Jika img kosong, beri warna merah
                    $pass_td     = (!empty($pass)) ?     "" : " style='background: #E07171;'"; // Jika img kosong, beri warna merah
                    $lavel_td    = (!empty($lavel)) ?    "" : " style='background: #E07171;'"; // Jika img kosong, beri warna merah

                    // Jika salah satu data ada yang kosong
                    if ($nama == "" or $kls == "" or $almat == "" or $email == "" or $telp == "" or $img == "" or $pass == "" or $lavel == "") {
                        $kosong++; // Tambah 1 variabel $kosong
                    }

                    echo "<tr>";
                    echo "<td" . $nama_td    . ">" . $nama  . "</td>";
                    echo "<td" . $kls_td     . ">" . $kls   . "</td>";
                    echo "<td" . $al_td      . ">" . $almat . "</td>";
                    echo "<td" . $email_td   . ">" . $email . "</td>";
                    echo "<td" . $telp_td    . ">" . $telp  . "</td>";
                    echo "<td" . $img_td     . ">" . $img   . "</td>";
                    echo "<td" . $pass_td    . ">" . $pass  . "</td>";
                    echo "<td" . $lavel_td   . ">" . $lavel . "</td>";
                    echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
            }

            echo "</table>";

            // Cek apakah variabel kosong lebih dari 0
            // Jika lebih dari 0, berarti ada data yang masih kosong
            if ($kosong > 0) {
    ?>
                <script>
                    $(document).ready(function() {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
    <?php
            } else { // Jika semua data sudah diisi
                echo "<hr>";

                // Buat sebuah tombol untuk mengimport data ke database
                echo " <br><button type='submit' name='import' class='btn btn-success'>Import</button> <br>";
            }

            echo "</form>";
        } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
            // Munculkan pesan validasi
            echo "<div style='color: red;margin-bottom: 10px;'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                </div>";
        }
    }
    ?>
                
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
    </script>

  
</body>

</html>