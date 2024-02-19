<?php
require_once 'config/config.php';
if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $pws = md5($_POST['pws']);

   $query = $conn->query("SELECT * FROM pengguna WHERE username = '$username' AND password = '$pws'");

   $result = mysqli_num_rows($query);

   if ($result > 0) {
      $data = mysqli_fetch_assoc($query);
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
      header('location:index.php?module=beranda');
   } else {
      session_start();
      $_SESSION['error_login'] = "Silahkan masukkan username dan password yang benar!";
      header('location:login.php');
   }
} else {
   header('location:login.php');
}
