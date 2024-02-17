<?php
include 'config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Aplikasi Penjualan Pulsa">
   <meta name="keywords" content="Aplikasi Penjualan">
   <meta name="author" content="M. Iqbal Adenan">
   <!-- favicon -->
   <link rel="shortcut icon" href="assets/img/favicon.png">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="assets/plugins/bootstrap-5.2.3/css/bootstrap.min.css">
   <!-- fontawesome css -->
   <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css">
   <!-- datatable css -->
   <link rel="stylesheet" href="assets/plugins/DataTables/datatables.min.css">
   <!-- jquery -->
   <script src="assets/js/jquery-3.7.0.js"></script>
   <!-- myStyle -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- selectize css -->
   <link rel="stylesheet" href="assets/plugins/selectize.js/css/selectize.bootstrap5.css">
   <!-- datepicker css -->
   <link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.min.css">
   <!-- title -->
   <title>Dashboard - Aplikasi Penjualan Pulsa</title>
</head>

<body class="d-flex flex-column vh-100">
   <?php include 'navigasi.php' ?>

   <main role="main" class="container">
      <?php include 'content.php'; ?>
   </main>

   <footer class="container d-flex flex-wrap justify-content-center align-item-center py-3 my-0 border-top mt-auto">
      <p class="col-md-6 mb-0 text-muted text-center">&#169; 2024 ELTIPONSEL, Inc</p>
   </footer>
   <!-- include javascript -->
   <!-- bootstrap js -->
   <script src="assets/plugins/bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
   <!-- fontawesome js -->
   <script src="assets/plugins/fontawesome-free-5.5.0-web/js/all.min.js"></script>
   <!-- datatable js -->
   <script src="assets/plugins/DataTables/datatables.min.js"></script>
   <!-- selectize js -->
   <script src="assets/plugins/selectize.js/js/selectize.min.js"></script>
   <!-- datepicker js -->
   <script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
   <!-- myScript -->
   <script>
      $(document).ready(function() {
         // DataTable
         let table = $('#dataTable').DataTable({
            pageLength: 5,
            lengthMenu: [
               [5, 10, 20, -1],
               [5, 10, 20, 'Todos']
            ]
         });

         // Selectize
         $(".select").selectize();
      });

      // datepicker
      $('.date-picker').datepicker({
         autoclose: true,
         todayHighlight: true,
         format: 'dd M yyyy'
      });

      // function menampilkan nama pelanggan secara otomatis
      function get_pelanggan() {
         let id_pelanggan = $('#pelanggan').val();
         $.ajax({
            type: "GET",
            url: "modules/penjualan/get_pelanggan.php", // proses get data pelanggan berdasarkan id_pelanggan
            data: {
               id_pelanggan: id_pelanggan
            },
            dataType: "JSON",
            success: function(result) {
               // ketika sukses tampilkan data
               $("#nama_pelanggan").val(result.nama_pelanggan);
            }
         });
      }

      function get_pulsa() {
         let id_pulsa = $('#pulsa').val();
         $.ajax({
            type: "GET",
            url: "modules/penjualan/get_pulsa.php",
            data: {
               id_pulsa: id_pulsa
            },
            dataType: "JSON",
            success: function(result) {
               $("#harga").val(result.harga);
            }
         });
      }

      function get_pelanggan_edit() {
         let id_pelanggan = $('#pelanggan_edit').val();
         $.ajax({
            type: "GET",
            url: "modules/penjualan/get_pelanggan.php", // proses get data pelanggan berdasarkan id_pelanggan
            data: {
               id_pelanggan: id_pelanggan
            },
            dataType: "JSON",
            success: function(result) {
               // ketika sukses tampilkan data
               $("#nama_pelanggan_edit").val(result.nama_pelanggan);
            }
         });
      }

      function get_pulsa_edit() {
         let id_pulsa = $('#pulsa_edit').val();
         $.ajax({
            type: "GET",
            url: "modules/penjualan/get_pulsa.php",
            data: {
               id_pulsa: id_pulsa
            },
            dataType: "JSON",
            success: function(result) {
               $("#harga_edit").val(result.harga);
            }
         });
      }
   </script>
</body>

</html>