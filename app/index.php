<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!$_SESSION['nama']) {
  header('location:../index.php?session=expired');
} 
include('header.php');
include('../conf/config.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Preloader -->
    <?php include('preloader.php'); ?>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include('logo.php'); ?>

      <!-- Sidebar -->
      <?php include('sidebar.php'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      if (isset($_GET['page'])) {
        if ($_GET['page'] == 'pasien') {
          include('pasien.php');         
        } 
        else if ($_GET['page'] == 'master') {
          include('master.php');
        } 
        else if ($_GET['page'] == 'riwayat-pemeriksaan') {
          include('riwayat.php');
        }
        else if ($_GET['page'] == 'detail-riwayat') {
          include('detail_riwayat.php');
        }
        else if ($_GET['page'] == 'spesimen-lab') {
          include('spesimen_lab.php'); 
        } 
        else if ($_GET['page'] == 'spesimen-faskes-dinkes') {
          include('spesimen_fasdinkes.php');
        }  
        else if ($_GET['page'] == 'pencarian-nik') {
          include('pencarian_nik.php');
        }
        else if ($_GET['page'] == 'pencarian-nik2') {
          include('pencarian_nik2.php');
        }
        else if ($_GET['page'] == 'laporan') {
          include('laporan.php');
        }
        else if ($_GET['page'] == 'detail-laporan') {
          include('detail_laporan.php');
        }
         else if ($_GET['page'] == 'pemeriksaan') {
          include('pemeriksaan.php');
        }
        else {
          include('404.php');
        }
      }
      ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('footer.php'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

</body>

</html>