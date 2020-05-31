<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url('assetsO/img/favicon.png" type="image/png')?>">
  <title>Toko Bangunan Cahaya Alam</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assetsP/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assetsP/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assetsP/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('assetsP/vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url('assetsP/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')?>" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url('assetsP/vendors/jqvmap/dist/jqvmap.min.css')?>" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('assetsP/vendors/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assetsP/build/css/custom.min.css')?>" rel="stylesheet">
</head>


<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url(); ?>penjual" class="site_title"><i class="fa fa-paw"></i> <span>Toko Bangunan</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_info">
              <h2>Welcome, Seller!</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?= base_url(); ?>penjual"><i class="fa fa-home" ></i> Home </a>
                </li>
                <li><a><i class="fa fa-edit"></i> Input Forms <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?= base_url(); ?>penjual/inputSup">Data Supplier</a></li>
                    <li><a href="<?= base_url(); ?>penjual/inputMasuk">Barang Masuk</a></li>
                    <li><a href="<?= base_url(); ?>penjual/inputKeluar">Barang Keluar</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?= base_url(); ?>penjual/tabelsup">Data Supplier</a></li>
                    <li><a href="<?= base_url(); ?>penjual/tabelmasuk">Data Barang Masuk</a></li>
                    <li><a href="<?= base_url(); ?>penjual/tabelkeluar">Data Barang Keluar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="<?= base_url(); ?>Progress">
                    <i class="fa fa-bullhorn" ></i> Progress
                  </a>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                
                  <a class="dropdown-item" href="<?= base_url(); ?>Login/logout">Log Out</a>
                  
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->