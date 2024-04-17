<?php
$no = 1;
$nama = "Azi saputra";
$nim = "005556789";
$kk = "BELAJAR33";
$potongnm = substr($nama, -11,-8); 
$potongnim = substr($nim, 1,5); 
$potongkk = substr($kk, 3,4); 

echo "No        :  $no <br>";
echo "Nim       :  $potongnim <br>";
echo "Nama      :  $potongnm <br>";
echo "karakter  :  $potongkk <br>";



?>