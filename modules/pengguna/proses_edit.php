<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $id_pengguna = $_POST['id_pengguna'];
   $nama_pengguna = htmlspecialchars($_POST['nama_pengguna']);
   $username = htmlspecialchars($_POST['username']);
   $password = $_POST['password'];
   $konfirmasi = $_POST['konfirmasi'];

   if (empty($password)) {
      $query = $conn->query("UPDATE pengguna SET nama_pengguna = '$nama_pengguna' WHERE id_pengguna = '$id_pengguna'");
   } else {
      // cek password dan konfirmasi
      if ($password != $konfirmasi) {
         session_start();
         $_SESSION['alert_konfirmasi'] = 'Password yang anda masukkan berbeda.';
         header('location:../../index.php?module=pengguna');
         exit();
      }

      // enkripsi md5
      $pwd = md5($password);
      $query = $conn->query("UPDATE pengguna SET nama_pengguna = '$nama_pengguna', password = '$pwd' WHERE id_pengguna = '$id_pengguna'");
   }

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Merubah data pengguna.';
      header('location:../../index.php?module=pengguna');
   } else {
      session_start();
      $_SESSION['alert'] = 'Merubah data pengguna.';
      header('location:../../index.php?module=pengguna');
   }
} else {
   header('location:../../index.php?module=pengguna');
}
