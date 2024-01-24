<?php
// set timezone (WIB)
date_default_timezone_set("ASIA/JAKARTA");
// koneksi database
require_once "koneksi.php";

// pelanggan
$pelanggan = $conn->query("SELECT COUNT(id_pelanggan) as plg FROM pelanggan");
$data_pelanggan = mysqli_fetch_assoc($pelanggan);
$get_pelanggan = $data_pelanggan['plg'];

// pulsa
$pulsa = $conn->query("SELECT COUNT(id_pulsa) as pls FROM pulsa");
$data_pulsa = mysqli_fetch_assoc($pulsa);
$get_pulsa = $data_pulsa['pls'];

// penjualan
// $penjualan = $conn->query("SELECT COUNT(id_penjualan) as pjl FROM penjualan");
// $data_penjualan = mysqli_fetch_assoc($penjualan);
// $get_penjualan = $data_penjualan['pjl'];
