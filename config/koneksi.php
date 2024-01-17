<?php
$conn = mysqli_connect("localhost", "root", "", "db_penjualan_pulsa_mik1");

// check connection
if (mysqli_connect_errno()) {
   echo "Gagal koneksi ke Database:" . mysqli_connect_error();
   exit();
}
