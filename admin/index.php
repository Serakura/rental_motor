<?php 
include'akses.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.php"></a><h3>Rental Motor</h3>
        <a class="navbar-brand brand-logo-mini" href="index.php"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
          </li>
        </ul>
        <button type="button" class="btn btn-danger"><a href="../logout.php" style="color: #fff;" onclick="return confirm('Yakin Akan LogOut ?')">Log Out</a></button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.php -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="images/face.jpg" alt="">
            <p class="name">Owner Rental</p>
            <p class="designation">Admin</p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">
                <img src="images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item ps-3 ">
              <a class="nav-link" href="?page=motor">
                <img src="images/icons/motor.png" alt="">
                <span class="menu-title">Motor</span>
              </a>
            </li>
           
       
          <li class="nav-item">
            <a class="nav-link" href="?page=Pengembalian">
              <img src="images/icons/005-forms.png" alt="">
              <span class="menu-title">Pengembalian</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=peminjaman">
              <img src="images/icons/4.png" alt="">
              <span class="menu-title">History</span>
            </a>
          </li>
          
        </nav>

        <!-- partial -->
        <div class="content-wrapper">
          <?php 
          if (isset($_GET['page'])  > 0) {
           $hal = str_replace(".", "/", $_GET['page']) . ".php";
         }else {
          $hal = "Dasboard.php";
        }
        if (file_exists($hal)) {
          include($hal);
        } 
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'motor':
            include "Data/motor/tampilmotor.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'tambahmotor':
            include "Data/motor/tambahmotor.php";
            break; 
            case 'tambahmerek':
            include "Data/motor/tambahmerek.php";
            break;
            case 'simpanmerek':
            include "Data/motor/simpanmerek.php";
            break;    
            case 'tambahtype':
            include "Data/motor/tambahtype.php";
            break;
            case 'simpantype':
            include "Data/motor/simpantype.php";
            break;   
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'simpanmotor':
            include "Data/motor/simpanmotor.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'editmotor':
            include "Data/motor/editmotor.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'updatemotor':
            include "Data/motor/updatemotor.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'hapusmotor':
            include "Data/motor/hapusmotor.php";
            break;      
          }
        }
        ?>


        <!-- Peminjaman -->
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'peminjaman':
            include "Data/peminjaman/tampilPeminjaman.php";
            break; 
            case 'editPeminjaman':
            include "Data/peminjaman/editPeminjaman.php";
            break;
            case 'updatePeminjaman':
            include "Data/peminjaman/updatePeminjaman.php";
            break;     
          }
        }
        ?>

        <!-- PENGEMBALIAN -->
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'Pengembalian':
            include "Data/Pengembalian/tampilPengembalian.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'tambahPengembalian':
            include "Data/Pengembalian/tambahPengembalian.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'simpanPengembalian':
            include "Data/Pengembalian/simpanPengembalian.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'editPengembalian':
            include "Data/Pengembalian/editPengembalian.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'updatePengembalian':
            include "Data/Pengembalian/updatePengembalian.php";
            break;      
          }
        }
        ?>
        <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];         
          switch ($page) {
            case 'hapusPengembalian':
            include "Data/Pengembalian/hapusPengembalian.php";
            break;      
          }
        }
        ?>
      </div>
    </footer>

    <!-- partial -->
  </div>
</div>

</div>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/chart.js"></script>
<script src="js/maps.js"></script>
</body>

</html>
