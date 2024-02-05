<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_penjualan = $_POST['id_penjualan'];
   $tanggal = $_POST['tanggal'];
   $pelanggan_id = $_POST['pelanggan_edit'];
   $pulsa_id = $_POST['pulsa_edit'];
   $harga_jual = $_POST['harga'];

   var_dump($pelanggan_id);

   //    $query = $conn->query("UPDATE penjualan SET tanggal = '$tanggal', pelanggan_id = '$pelanggan_id', pulsa_id = '$pulsa_id', harga_jual = '$harga_jual' WHERE id_penjualan = '$id_penjualan'");

   //    if ($query) {
   //       session_start();
   //       $_SESSION['alert'] = 'Merubah data penjualan.';
   //       header('location:../../index.php?module=penjualan');
   //    } else {
   //       session_start();
   //       $_SESSION['alert'] = 'Merubah data penjualan.';
   //       header('location:../../index.php?module=penjualan');
   //    }
   //    header('location:../../index.php?module=penjualan');
   // } else {
   //    header('location:../../index.php?module=penjualan');
}
