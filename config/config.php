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
$penjualan = $conn->query("SELECT COUNT(id_penjualan) as pjl FROM penjualan");
$data_penjualan = mysqli_fetch_assoc($penjualan);
$get_penjualan = $data_penjualan['pjl'];

// pendapatan
$pendapatan = $conn->query("SELECT SUM(harga_jual) as harga FROM penjualan");
$data_pendapatan = mysqli_fetch_assoc($pendapatan);
$get_pendapatan = $data_pendapatan['harga'];

function tgl_indo($tanggal)
{
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   $pecahkan = explode('-', $tanggal);

   // variabel pecahkan 0 = tanggal
   // variabel pecahkan 1 = bulan
   // variabel pecahkan 2 = tahun

   return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
