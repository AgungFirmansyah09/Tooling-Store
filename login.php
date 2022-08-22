<?php 
// mengaktifkan session pada php
session_start();


if (isset($_SESSION ["login"])) {
    header("Location: after-login.php");
  exit;
  }
 
// menghubungkan php dengan koneksi database
require 'fungction.php';

// menangkap data yang dikirim dari form login

if (isset($_POST ["login"])) {
  $username = $_POST['username'];
  $password2 = $_POST['password2'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user_otorisasi WHERE username='$username' AND password2='$password2'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

  $data = mysqli_fetch_assoc($login);

  // cek jika user login sebagai admin
  if($data['level']=="Admin"){

    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Admin";
    // alihkan ke halaman dashboard admin
    header("location:Admin-Pages/index.php");
    exit;

  // cek jika user login sebagai Team member
  }else if($data['level']=="Team Member" ){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Team Member";
    // alihkan ke halaman dashboard Team Member
    header("location:TL TM-Pages/index.php");
    exit;
  // cek jika user login sebagai Team Leader
  }else if($data['level']=="Team Leader" ){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Team Leader";
    // alihkan ke halaman dashboard Team Leader
    header("location:TL TM-Pages/index.php");
    exit;

  // cek jika user login sebagai Staff
  }else if($data['level']=="Staff"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Staff";
    // alihkan ke halaman dashboard Staff
    header("location:index3.php");
    exit;
  // cek jika user login sebagai Supervisor
  }else if($data['level']=="Supervisor"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Supervisor";
    // alihkan ke halaman dashboard Supervisor
    header("location:index3.php");
    exit;

  // cek jika user login sebagai Manager
  }else if($data['level']=="Manager"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Manager";
    // alihkan ke halaman dashboard Manager
    header("location:index4.php");
    exit;
  // cek jika user login sebagai Senior Manager
  }else if($data['level']=="Senior Manager"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Senior Manager";
    // alihkan ke halaman dashboard Senior Manager
    header("location:index4.php");
    exit;

  // cek jika user login sebagai General Manager
  }else if($data['level']=="General Manager"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "General Manager";
    // alihkan ke halaman dashboard General Manager
    header("location:index5.php");
    exit;
  // cek jika user login sebagai Direktur Direktur
  }else if($data['level']=="Direktur"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Direktur";
    // alihkan ke halaman dashboard Direktur
    header("location:index5.php");
    exit;


  }else if($data['level']=="Presiden Direktur"){
    // buat session login dan username
    $_SESSION["login"] = true;
    $_SESSION['username'] = $username;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "Presiden Direktur";
    // alihkan ke halaman dashboard pengurus
    header("location:index6.php");
    exit;
  }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tooling-Store | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link href="docs/assets/img/Logo-Header2.png"  rel="shortcut icon"/>
</head>
<body class="hold-transition login-page bg-gray">
    <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 2000);
    </script>

    <?php if (isset($error)) :?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Oops...!</h5>
        The username and password you entered is wrong, Please Try again...
      </div>      
    <?php endif; ?>


<div class="login-box ">
  <div class="login-logo">
    <a href="index2.php" style="color:white;">
      <img src="docs/assets/img/Logo-Header.png" width="30%">
      <b style="color:blue; margin-left: -20px;">Tooling</b> 
    STORE
  </a> 

  </div>
  <!-- /.login-logo -->
   
  <div class="card ">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- <div class="input-group mb-3">
          <select class="form-control" style="width: 100%;" name="level">
            <option selected="selected">--Select Level--</option>
            <option value="Admin">Admin</option>
            <option value="TM_TL">Team Member | Team Leader</option>
            <option value="STF_SPV">Staff | Supervisor</option>
            <option value="MGT_SMGR">Manager | Senior Manager</option>
            <option value="GM_DRK">General Manager | Direktur</option>
          </select>
        </div> -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>

      <div class="col-4">
        
      </div>
       <center>
        <a href="https://adisdimensionfootwear.id/id/">
          <img src="docs/assets/img/Logo-Footer.png" width="100%">
        </a> 
       </center>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
