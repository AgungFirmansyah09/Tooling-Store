<?php 
  session_start();
  
  // menghubungkan php dengan koneksi database
  require 'fungction.php';

  if (!isset($_SESSION ["login"])) {
    header("Location: ../login.php");
  exit;
  }
  
  if(isset ($_POST["submit"])){

  if ( data_master_cutting_dies ($_POST) >0) {
    $success = true;
  } else {
    $error = true;
  }
}
  ?>

  <!-- Upload Excel -->
<?php
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['namafile']['name']) && in_array($_FILES['namafile']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['namafile']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['namafile']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    for($i = 1;$i < count($sheetData);$i++)
    {
        $model = $sheetData[$i]['1'];
        $component = $sheetData[$i]['2'];

        mysqli_query($conn,"INSERT INTO data_master_cutting_dies (id, model, component) values ('','$model','$component')");
    }
    header("Location: data-master-cutting-dies.php"); 
}
?>
<!-- End Upload -->

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
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">

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
                <a href="data-master.php" class="nav-link active">
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
            <h1>Data Master Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Master</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Alert Session -->
        <script>
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
          }, 1500);
        </script>

        <?php if (isset($success)) :?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="far fa-check-circle"></i> Success...</h5>
            Master data input successfully!
            <script>
            document.location.href = "data-master-cutting-dies.php";
            </script>
          </div>
          <?php elseif (isset($error)): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Sorry...!</h5>
            Master data input unsuccessfully!
            <script>
            document.location.href = "data-master-cutting-dies.php";
            </script>
          </div>
        <?php endif; ?>
        <!-- End Alert -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Created Data Master Cutting Dies</h3>

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
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Model Shoe</label>
                  <input type="text" class="form-control auto-save" name="model" placeholder="Model Shoe" required="">
                </div>
              </div>

              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Component</label>
                  <input type="text" class="form-control auto-save" name="component" placeholder="Component" required="">
                </div>
              </div>

              <!-- <div class="col-12 col-sm-4">
                <div class="form-group">
                  <label>Style</label>
                  <input type="text" class="form-control auto-save" name="style_color" placeholder="Style Shoe" >
                </div>
              </div> -->
             </div>


            <div class="row">
              <div class="col-12 col-sm-12">
                <td>
                <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-share-square"></i> Submit</button>
                <button type="cancel" class="btn btn-warning"><i class="fas fa-ban"></i> Cancel</button>
                <button type="button" class="btn btn-danger" onclick="history.back()"> <i class="fas fa-backward"></i> Back</button>
                </td>
              </div>
            </div>            
          </form>  
        </div>  
      </div>

      <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Created Data Master Cutting Dies</h3>

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
              <div class="col-12 col-sm-6">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="namafile" name="namafile">
                    <label class="custom-file-label">Excel file...</label>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <button type="submit" id="upload" name="upload" value="Import" class="btn btn-success">
                  <i class="fas fa-upload"></i> Upload file</button>
                <a onclick="JavaScript:window.location.href='download.php?file=master-data/data_master_cutting_dies.xlsx';" class="btn btn-primary">
                  <i class="fas fa-download"></i> Unduh  Template
                </a>
              </div>
             </div>
           
          </form>           
        </div>  
      </div>

       <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master data Cutting Dies</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="delete-all-data-master-cutting-dies.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
                  <?php 
                    $data_user = mysqli_query($conn,"SELECT * FROM data_master_cutting_dies ");
                   ?>
                  <thead>
                    <tr>
                      <th><input type="checkbox" onchange="checkAll(this)"></th>
                      <th>No</th>
                      <th>Model Shoe</th>
                      <th>Component</th>
                      <th>Style</th>
                      <th>Date Update</th>
                      <th>Option</th>
                    </tr>
                  </thead>

                  <?php 
                  $total = mysqli_query($conn, "SELECT * FROM data_master_cutting_dies ORDER BY id DESC");
                  ?>
                  <tbody>
                    <?php $i=1; ?>
                    <?php   foreach ($total as $row):?>
                    <tr>
                      <td><input type="checkbox" name="pilih[]" value="<?php echo $row['id']; ?>"></td>
                      <td><center><?php echo $i; ?></center></td>
                      <td><?php echo $row ["model"]; ?> </td>
                      <td><?php echo $row ["component"]; ?></td>
                      <td><?php echo $row ["style_color"]; ?></td>
                      <td><?php echo $row ["date_created"]; ?></td>
                      <td>
                        <a href="" 
                          class="btn btn-primary btn-sm" 
                          data-toggle='tooltip' title="Edit data">
                          <i class="fas fa-edit"></i>
                        </a>

                        <a href="delete_data_master_cutting_dies.php?id=<?php echo $row['id']; ?>"  
                          onclick="return confirm('Are you sure you want to delete?')" 
                          class="btn btn-danger btn-sm" 
                          data-toggle='tooltip' 
                          title="Delete Data">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    <?php   endforeach; ?>
                  </tbody>
                </table>
                  <button type="submit" name="hapus" class="btn btn-danger" onclick="return confirm ('Anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i> Delete Your Selected</button>
                </form>

                
              </div>
                
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
      <!-- /.container-fluid --> 
  </section>
</div>

<!-- Checked Box -->
 <script type="text/javascript">
  function checkAll(box) 
  {
   let checkboxes = document.getElementsByTagName('input');

   if (box.checked) { // jika checkbox teratar dipilih maka semua tag input juga dipilih
    for (let i = 0; i < checkboxes.length; i++) {
     if (checkboxes[i].type == 'checkbox') {
      checkboxes[i].checked = true;
     }
    }
   } else { // jika checkbox teratas tidak dipilih maka semua tag input juga tidak dipilih
    for (let i = 0; i < checkboxes.length; i++) {
     if (checkboxes[i].type == 'checkbox') {
      checkboxes[i].checked = false;
     }
    }
   }
  }
 </script>
<!-- Checked Box -->


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
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../plugins/dropzone/min/dropzone.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })



    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

</body>
</html>
