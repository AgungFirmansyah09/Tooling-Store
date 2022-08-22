<?php 
  session_start();
  // menghubungkan php dengan koneksi database
  require 'fungction.php';
  if (!isset($_SESSION ["login"])) {
    header("Location: ../login.php");
  exit;
  }
 
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tooling-Store | Dashboard</title>
  <link href="../docs/assets/img/Logo-Header2.png"  rel="shortcut icon"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../docs/assets/img/Logo-Header.png" alt="AdminLTE Logo" class="brand-image img-circle" width="60%">
      <span class="brand-text font-weight-light">TOOLING STORE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php 
          $info = mysqli_query($conn,"SELECT * FROM user_otorisasi WHERE username = '".$_SESSION ['username']."' ");
        ?>
        <?php   foreach ($info as $row):?>
        <div class="image">
          <img src="../img_uplaod/<?php echo $row ['gambar']; ?>" class="img-circle elevation-4" alt="User Image">
         <!--  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <?php   endforeach; ?>
        <div class="info">
          <a href="profile.php?id=<?=$row ["id"];?>" class="d-block"><?php echo ($_SESSION ['username']); ?>  | <b><?php echo ($_SESSION ['level']); ?>  </b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barcode-print.php" class="nav-link">
                  <i class="fas fa-qrcode"></i>
                  <p>Print Barcode</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-barcode"></i>
                  <p>Scan Barcode</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data-master.php" class="nav-link">
                  <i class="fas fa-server"></i>
                  <p>Data Master</p>
                </a>
              </li>
            </ul>
          </li>
          
  

          <li class="nav-header">REGISTRATION USER</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-registered"></i>
              <p>
                LOGOUT & REGIS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Regis.php" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>REGIS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Logout.php" class="nav-link" onclick="return confirm ('You are sure you want to exit the Application ?')">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>LOGOUT</p>
                </a>
              </li>
            </ul>
          </li>
     
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Inventory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">

            <script type="text/javascript">
              document.write("<font size=+3 style='color: blue;'>");
              var day = new Date();
              var hr = day.getHours();
              if (hr >= 0 && hr < 12) {
                  document.write("<i class='fas fa-cloud-sun'></i> Good Morning, <?php echo ($_SESSION ['username']); ?>!  ");
              } else if (hr == 12) {
                  document.write("<i class='fas fa-cloud-sun'></i> Good Noon, <?php echo ($_SESSION ['username']); ?>!");
              } else if (hr >= 12 && hr <= 17) {
                  document.write("<i class='fas fa-cloud-sun'></i> Good Afternoon, <?php echo ($_SESSION ['username']); ?>!");
              } else {
                  document.write("<i class='fas fa-cloud-moon'></i> Good Evening, <?php echo ($_SESSION ['username']); ?>!");
              }
              document.write("</font>");
            </script>

            <p>
            <?php
            $tgl=date ('l, d-m-Y');
            echo $tgl;
            ?>
            </p>
          </div>
          
            

        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->

    <!-- INV CUTTING DIES -->
    <section class="content">
      <div class="container">
        <div class="row">          
          <div class="col">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-dice-d6"></i> Cutting Dies Inventory</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn,"SELECT * FROM print_qr_ct_dies WHERE lokasi='NCVS' ");
                    $total3 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?php echo $total3; ?> PCS</h3>

                      <p>IN NCVS</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="data-cutting-dies-ncvs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn, "SELECT * FROM print_qr_ct_dies WHERE lokasi='TOOLING STORE' ");
                    $total2 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-success">
                    <div class="inner">
                     <h3><?php echo $total2; ?> PCS</h3>

                      <p>IN TOOLING STORE</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="data-cutting-dies-toolingstore.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn,"SELECT * FROM print_qr_ct_dies WHERE lokasi='RETURN'");
                    $total1 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?php echo $total1; ?> PCS</h3>

                      <p>RETURN TOOLING</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-sync-alt"></i>
                    </div>
                    <a href="data-cutting-dies-return.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <?php 
                        $info = mysqli_query($conn,"SELECT * FROM print_qr_ct_dies");
                        $total_asset = mysqli_num_rows($info);
                      ?>
                      <h3><?php echo $total_asset ?> PCS</h3>

                      <p>TOTAL ASSET</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="data-cutting-dies-asset.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                  </div>
                </div>  
            </div>
          </div>  
        </div>
      </div>
    </section>
    <!-- INV CUTTING DIES -->

    <!-- INV PAD GAUGE -->
    <section class="content">
      <div class="container">
        <div class="row">          
          <div class="col">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-sign-language"></i> Pad Gauge Inventory</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='NCVS' ");
                    $total3 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?php echo $total3; ?> PCS</h3>

                      <p>IN NCVS</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="data-pad-gauge-ncvs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn, "SELECT * FROM print_qr_pad_gauge WHERE lokasi='TOOLING STORE' ");
                    $total2 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-success">
                    <div class="inner">
                     <h3><?php echo $total2; ?> PCS</h3>

                      <p>IN TOOLING STORE</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="data-pad-gauge-toolingstore.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='RETURN'");
                    $total1 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?php echo $total1; ?> PCS</h3>

                      <p>RETURN TOOLING</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-sync-alt"></i>
                    </div>
                    <a href="data-pad-gauge-return.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <?php 
                        $info = mysqli_query($conn,"SELECT * FROM print_qr_pad_gauge");
                        $total_asset = mysqli_num_rows($info);
                      ?>
                      <h3><?php echo $total_asset ?> PCS</h3>

                      <p>TOTAL ASSET</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="data-pad-gauge-asset.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                  </div>
                </div>  
            </div>
          </div>  
        </div>
      </div>
    </section>
    <!-- INV PAD GAUGE -->

    <!-- INV PAD PRESS -->
    <section class="content">
      <div class="container">
        <div class="row">          
          <div class="col">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-compress-arrows-alt"></i> Pad Press Inventory</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <?php 
                      $info = mysqli_query($conn,"SELECT * FROM print_qr_pad_press WHERE lokasi='NCVS' ");
                      $total3 = mysqli_num_rows($info);
                    ?>
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $total3; ?> PCS</h3>

                        <p>IN NCVS</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="data-pad-press-ncvs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn, "SELECT * FROM print_qr_pad_press WHERE lokasi='TOOLING STORE' ");
                    $total2 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-success">
                    <div class="inner">
                     <h3><?php echo $total2; ?> PCS</h3>

                      <p>IN TOOLING STORE</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="data-pad-press-toolingstore.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn,"SELECT * FROM print_qr_pad_press WHERE lokasi='RETURN'");
                    $total1 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?php echo $total1; ?> PCS</h3>

                      <p>RETURN TOOLING</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-sync-alt"></i>
                    </div>
                    <a href="data-pad-press-return.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <?php 
                        $info = mysqli_query($conn,"SELECT * FROM print_qr_pad_press");
                        $total_asset = mysqli_num_rows($info);
                      ?>
                      <h3><?php echo $total_asset ?> PCS</h3>

                      <p>TOTAL ASSET</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="data-pad-press-asset.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                  </div>
                </div>  
            </div>
          </div>  
        </div>
      </div>
    </section>
    <!-- INV PAD PRESS -->

     <!-- INV MOLD BPM -->
    <section class="content">
      <div class="container">
        <div class="row">          
          <div class="col">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title"><i class="fab fa-modx nav-icon"></i> Mold BPM Inventory</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <?php 
                      $info = mysqli_query($conn,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='NCVS' ");
                      $total3 = mysqli_num_rows($info);
                    ?>
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $total3; ?> PCS</h3>

                        <p>IN NCVS</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="data-mold-bpm-ncvs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn, "SELECT * FROM print_qr_mold_bpm WHERE lokasi='TOOLING STORE' ");
                    $total2 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-success">
                    <div class="inner">
                     <h3><?php echo $total2; ?> PCS</h3>

                      <p>IN TOOLING STORE</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="data-mold-bpm-toolingstore.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <?php 
                    $info = mysqli_query($conn,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='RETURN'");
                    $total1 = mysqli_num_rows($info);
                  ?>
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?php echo $total1; ?> PCS</h3>

                      <p>RETURN TOOLING</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-sync-alt"></i>
                    </div>
                    <a href="data-mold-bpm-return.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <?php 
                        $info = mysqli_query($conn,"SELECT * FROM print_qr_mold_bpm");
                        $total_asset = mysqli_num_rows($info);
                      ?>
                      <h3><?php echo $total_asset ?> PCS</h3>

                      <p>TOTAL ASSET</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="data-mold-bpm-asset.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                  </div>
                </div>  
            </div>
          </div>  
        </div>
      </div>
    </section>
    <!-- INV MOLD BPM -->


  </div>
  
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- Footer End -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>