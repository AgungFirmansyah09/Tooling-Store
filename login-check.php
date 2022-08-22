<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require 'fungction.php';

// menangkap data yang dikirim dari form login

if (isset($_POST ["login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user_otorisasi WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="ADMIN"){

		// buat session login dan username
		$_SESSION["login"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "ADMIN";
		// alihkan ke halaman dashboard admin
		header("location:index.php");
		exit;

	// cek jika user login sebagai pegawai
	}else if($data['level']=="TL_TM" ){
		// buat session login dan username
		$_SESSION["login"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "TL_TM";
		// alihkan ke halaman dashboard pegawai
		header("location:index2.php");
		exit;

	// cek jika user login sebagai pengurus
	}else if($data['level']=="STF_SPV"){
		// buat session login dan username
		$_SESSION["login"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "STF_SPV";
		// alihkan ke halaman dashboard pengurus
		header("location:index3.php");
		exit;

	}
  }
	$error = true;
}

?>