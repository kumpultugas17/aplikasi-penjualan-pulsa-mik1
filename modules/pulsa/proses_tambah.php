<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $operator = htmlspecialchars($_POST['operator']);
   $nominal = htmlspecialchars($_POST['nominal']);
   $harga = htmlspecialchars($_POST['harga']);

   $query = $conn->query("INSERT INTO pulsa (operator, nominal, harga) VALUES ('$operator', '$nominal', '$harga')");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Menambahkan operator baru.';
      header('location:../../index.php?module=pulsa');
   } else {
      session_start();
      $_SESSION['alert'] = 'Menambahkan operator baru.';
      header('location:../../index.php?module=pulsa');
   }
} else {
   header('location:../../index.php?module=pulsa');
}
