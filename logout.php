<?php
if (!isset($_SESSION['login'])) {
   header('location:login.php');
}
session_start();
session_unset();
session_destroy();
