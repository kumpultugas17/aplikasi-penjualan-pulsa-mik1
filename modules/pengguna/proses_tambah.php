<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $nama_pengguna = htmlspecialchars($_POST['nama_pengguna']);
   $username = htmlspecialchars($_POST['username']);
   $password = $_POST['password'];
   $konfirmasi = $_POST['konfirmasi'];

   // cek username
   $cek_username = $conn->query("SELECT username FROM pengguna WHERE username = '$username'");
   $data = mysqli_num_rows($cek_username);
   if ($data > 0) {
      session_start();
      $_SESSION['alert_konfirmasi'] = 'Username sudah ada, silahkan gunakan username yang lain!';
      header('location:../../index.php?module=pengguna');
      exit();
   }

   // cek password dan konfirmasi
   if ($password != $konfirmasi) {
      session_start();
      $_SESSION['alert_konfirmasi'] = 'Password yang anda masukkan berbeda.';
      header('location:../../index.php?module=pengguna');
      exit();
   }

   // enkripsi md5
   $pwd = md5($password);

   $query = $conn->query("INSERT INTO pengguna (nama_pengguna, username, password) VALUES ('$nama_pengguna', '$username', '$pwd')");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menambahkan pengguna baru.';
      header('location:../../index.php?module=pengguna');
   } else {
      session_start();
      $_SESSION['alert'] = 'Menambahkan pengguna baru.';
      header('location:../../index.php?module=pengguna');
   }
} else {
   header('location:../../index.php?module=pengguna');
}
