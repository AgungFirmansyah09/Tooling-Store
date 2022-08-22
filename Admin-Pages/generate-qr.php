<?php 
  session_start();
  
  // menghubungkan php dengan koneksi database
  require 'fungction.php';

  if (!isset($_SESSION ["login"])) {
    header("Location: ../login.php");
  exit;
  }
  
  $id = $_GET ["id"];
  //Query data berdasarkan id
  $edit = query ("SELECT * FROM print_qr_ct_dies WHERE id = $id")[0];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tooling-Store | Data-Master-Cutting-Dies</title>
  <link href="../docs/assets/img/Logo-Header2.png"  rel="shortcut icon"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.php" class="nav-link">Home</a>
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
      <img src="../docs/assets/img/Logo-Header.png" alt="AdminLTE Logo" class="brand-image img-circle " width="60%">
      <span class="brand-text font-weight-light">TOOLING STORE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

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
                <a href="index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barcode-print.php" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GENERATE QR CODE LINK</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Generate QRCode</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
    include "phpqrcode/qrlib.php";
    include "config-QRcode.php";

    if(isset($_POST['create']))
    {
      $qc =  $_POST['qrContent'];
      $qrUname = $_POST['model'];
      $qrImgName = $qrUname.rand();
      if($qc=="" && $qrUname=="")
      {
        echo "<script>alert('Please Enter Your Name And Msg For QR Code');</script>";
      }
      elseif($qc=="")
      {
        echo "<script>alert('Please Enter QR Code Msg');</script>";
      }
      elseif($qrUname=="")
      {
        echo "<script>alert('Please Enter Your Name');</script>";
      }
      else
      {
      
      $final = $qc;
      $qrs = QRcode::png($final,"QR-code/$qrImgName.png","H","3","3");
      $qrimage = $qrImgName.".png";
      $workDir = $_SERVER['HTTP_HOST'];
      
      $insQr = $qr_generate->insertQr($qrUname,$final,$qrimage);
      if($insQr==true)
      {
        echo "<script>alert('Thank You $qrUname. Success Create Your QR Code'); window.location='hasil-qr.php?success=$qrimage & $qrUname';</script>";

      }
      else
      {
        echo "<script>alert('cant create QR Code');</script>";
      }
    }
   }
    ?>
    
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">GENGERATE QR CODE LINK</h3>

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
            <form method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>MODEL NAME </label>
                  <input type="text" name="model" class="form-control" value="<?php echo $edit ["model"]; ?>">
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>GRENERATE LINK </label>
                  <input type="text" name="qrContent" class="form-control" value="http://10.5.52.198/Tooling-Store/Admin-Pages/Trans-QR-cutting-dies.php?id=<?php echo $edit ["id"]; ?>">
                </div>
              </div>
             </div>          

            <div class="row">
              <div class="col-12 col-sm-12">
                <td>
                <button type="submit" name="create" class="btn btn-primary"><i class="fas fa-print"></i> Generate</button>
                <button type="cancel" class="btn btn-warning"><i class="fas fa-ban"></i> Cancel</button>
                <button type="button" class="btn btn-danger" onclick="history.back()"> <i class="fas fa-backward"></i> Back</button>
                </td>
              </div>
            </div>            
          </form>  
        </div>  
      </div>
    </div>
  </div>
      <!-- /.container-fluid --> 
  </section>
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
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>
