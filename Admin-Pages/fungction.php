<?php 

//Koneksi ke DBMS

$conn = mysqli_connect("localhost","root","","db_toolingstore");

//mengambil data all data gaes...
function query ($query){
global $conn;
$result = mysqli_query($conn, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows [] = $row;
}
return $rows;
}

// Input data Regis ke DBMS
function regis ($data){
global $conn;
  $level = htmlspecialchars($data ["level"]);
  $username = htmlspecialchars (ucwords($data ["username"]));
  $password = htmlspecialchars($data ["password"]);
  $password2 = htmlspecialchars($data ["password2"]);

//cek konfirmasi password
if ($password !== $password2) {
	echo "<script>
    alert ('Incorrected Password')
    </script>";
return false;
}

//upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

//query insert data Regis
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_otorisasi WHERE username='$username'"));
    if ($cek > 0){
    echo "<script>window.alert('username Sudah terdaftar')
    window.location='Regis.php'</script>";
    }else {

//enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  $query = "INSERT INTO user_otorisasi (level, username, password, password2, gambar)
  VALUES ('$level','$username','$password','$password2','$gambar')";
  };
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
}

//function uplaod Gambar
function upload (){
    
  $namaFile = $_FILES ['gambar'] ['name'];
  $ukuranFile = $_FILES ['gambar'] ['size'];
  $error = $_FILES ['gambar'] ['error'];
  $tmpName = $_FILES ['gambar'] ['tmp_name'];

//cek apakah ada gambar yang di uplaod
  if ($error === 4) {
    echo "
      <script>
      alert ('pilih gambar terlebih dahulu!');
      </script>
    ";
    return false;
  }

  // cek apakah yang di upload gambar

  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
      <script>
      alert ('yang anda upload bukan Gambar!');
      </script>
    ";
    return false;
  }

//cek ukuran Gambar

if ($ukuranFile > 1000000) {
  echo "
      <script>
      alert ('Ukuran gambar tidak boleh Melebihi 1MB');
      </script>
    ";
    return false;
}


//generate nama Gambar

$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


//siap upload gambar

move_uploaded_file($tmpName, '../img_uplaod/' . $namaFileBaru);

return $namaFileBaru;
}

//hapus data User
function delete ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM user_otorisasi WHERE id = $id");
return mysqli_affected_rows($conn);
}


// Input Data Master Cutting Dies
function data_master_cutting_dies ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $component = htmlspecialchars (ucwords($data ["component"]));
  $style_color = htmlspecialchars($data ["style_color"]);

//query insert data Master Cutting Dies
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_master_cutting_dies WHERE component='$component' AND model = '$model'"));
    if ($cek > 0){
    echo "<script>window.alert('Model Shoe & component Sudah di input')
    window.location='data-master-cutting-dies.php'</script>";
    }else {
  
  $query = "INSERT INTO data_master_cutting_dies (model, component, style_color)
  VALUES ('$model','$component','$style_color')";
  };
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
}


// Input data QR-Code cutting dies
function print_qr_ct_dies ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $component = htmlspecialchars ($data ["component"]);
  $Size = htmlspecialchars($data ["Size"]);
  $grin_size = htmlspecialchars($data ["grin_size"]);
  $No_req = htmlspecialchars ($data ["No_req"]);
  $No_PO = htmlspecialchars($data ["No_PO"]);
  $No_inventory = htmlspecialchars($data ["No_inventory"]);
  $BC_in=htmlspecialchars($data ["BC_in"]);
  $lokasi = htmlspecialchars($data ["lokasi"]);

  $query = "INSERT INTO print_qr_ct_dies (model, component, Size, grin_size, No_req, No_PO, No_inventory, BC_in, lokasi)
  VALUES ('$model','$component','$Size', '$grin_size', '$No_req', '$No_PO', '$No_inventory', '$BC_in','$lokasi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
};

//update data Tooling cutting dies (Transaksi)
  function tooling_proses ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $component=htmlspecialchars($data["component"]);
    $style_color=htmlspecialchars($data ["style_color"]);
    $Size=htmlspecialchars($data["Size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);
    $ncvs=htmlspecialchars($data ["ncvs"]);
    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_ct_dies SET 
                model = '$model',
                component = '$component',
                style_color = '$style_color',
                Size = '$Size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                ncvs = '$ncvs',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };


//update data tabel cutting dies
  function update_data_cutting_dies ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $component=htmlspecialchars($data["component"]);
    $style_color=htmlspecialchars($data ["style_color"]);
    $Size=htmlspecialchars($data["Size"]);
    $grin_size=htmlspecialchars($data["grin_size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);

    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_ct_dies SET 
                model = '$model',
                component = '$component',
                style_color = '$style_color',
                Size = '$Size',
                grin_size = '$grin_size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };

//hapus data Qrcode Cutting dies
function delete_data_QRCODE_cutting_dies ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM print_qr_ct_dies WHERE id = $id");
return mysqli_affected_rows($conn);
}

//hapus data Master Cutting dies
function delete_data_master_cutting_dies ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM data_master_cutting_dies WHERE id = $id");
return mysqli_affected_rows($conn);
}



// Input Data Master Pad Gauge
function data_master_pad_gauge ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $style_color = htmlspecialchars($data ["style_color"]);

//query insert data Master Pad Gauge
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_master_pad_gauge WHERE style_color='$style_color' AND model = '$model'"));
    if ($cek > 0){
    echo "<script>window.alert('Model Shoe & style color Sudah di input')
    window.location='data-master-pad-gauge.php'</script>";
    }else {
  
  $query = "INSERT INTO data_master_pad_gauge (model, style_color)
  VALUES ('$model','$style_color')";
  };
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
}

// Input data QR-Code Pad Gauge
function print_qr_pad_gauge ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $style_color = htmlspecialchars($data ["style_color"]);
  $Size = htmlspecialchars($data ["Size"]);
  $grin_size = htmlspecialchars($data ["grin_size"]);
  $No_req = htmlspecialchars ($data ["No_req"]);
  $No_PO = htmlspecialchars($data ["No_PO"]);
  $No_inventory = htmlspecialchars($data ["No_inventory"]);
  $BC_in = htmlspecialchars($data ["BC_in"]);
  $lokasi = htmlspecialchars($data ["lokasi"]);

  $query = "INSERT INTO print_qr_pad_gauge (model, style_color, Size, grin_size, No_req, No_PO, No_inventory, BC_in, lokasi)
  VALUES ('$model','$style_color','$Size', '$grin_size', '$No_req', '$No_PO', '$No_inventory', '$BC_in','$lokasi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
};

//hapus data Qrcode pad gauge
function delete_data_QRCODE_pad_gauge ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM print_qr_pad_gauge WHERE id = $id");
return mysqli_affected_rows($conn);
}

//hapus data Master Cutting dies
function delete_data_master_pad_gauge ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM data_master_pad_gauge WHERE id = $id");
return mysqli_affected_rows($conn);
}

//update data Tooling pad gauge (Transaksi)
  function tooling_proses_pad_gauge ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $style_color=htmlspecialchars($data ["style_color"]);
    $Size=htmlspecialchars($data["Size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);
    $ncvs=htmlspecialchars($data ["ncvs"]);
    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_pad_gauge SET 
                model = '$model',
                style_color = '$style_color',
                Size = '$Size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                ncvs = '$ncvs',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };

//update data tabel pad gauge
  function update_data_pad_gauge ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $style_color=htmlspecialchars($data ["style_color"]);
    $Size=htmlspecialchars($data["Size"]);
    $grin_size=htmlspecialchars($data["grin_size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);
    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_pad_gauge SET 
                model = '$model',
                style_color = '$style_color',
                Size = '$Size',
                grin_size = '$grin_size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };



// Input Data Master Pad press
function data_master_pad_press ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $style_color = htmlspecialchars($data ["style_color"]);

//query insert data Master Pad press
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_master_pad_press WHERE style_color='$style_color' AND model = '$model'"));
    if ($cek > 0){
    echo "<script>window.alert('Model Shoe & style color Sudah di input')
    window.location='data-master-pad-gauge.php'</script>";
    }else {
  
  $query = "INSERT INTO data_master_pad_press (model, style_color)
  VALUES ('$model','$style_color')";
  };
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
}

// Input data QR-Code Pad press
function print_qr_pad_press ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $style_color = htmlspecialchars($data ["style_color"]);
  $Size = htmlspecialchars($data ["Size"]);
  $grin_size = htmlspecialchars($data ["grin_size"]);
  $No_req = htmlspecialchars ($data ["No_req"]);
  $No_PO = htmlspecialchars($data ["No_PO"]);
  $No_inventory = htmlspecialchars($data ["No_inventory"]);
  $BC_in = htmlspecialchars($data ["BC_in"]);
  $lokasi = htmlspecialchars($data ["lokasi"]);

  $query = "INSERT INTO print_qr_pad_press (model, style_color, Size, grin_size, No_req, No_PO, No_inventory, BC_in, lokasi)
  VALUES ('$model','$style_color','$Size', '$grin_size', '$No_req', '$No_PO', '$No_inventory', '$BC_in','$lokasi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
};

//hapus data Qrcode pad press
function delete_data_QRCODE_pad_press ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM print_qr_pad_press WHERE id = $id");
return mysqli_affected_rows($conn);
}

//hapus data Master Cutting dies
function delete_data_master_pad_press ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM data_master_pad_press WHERE id = $id");
return mysqli_affected_rows($conn);
}

//update data Tooling pad press (Transaksi)
  function tooling_proses_pad_press ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $style_color=htmlspecialchars($data ["style_color"]);
    $Size=htmlspecialchars($data["Size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);
    $ncvs=htmlspecialchars($data ["ncvs"]);
    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_pad_press SET 
                model = '$model',
                style_color = '$style_color',
                Size = '$Size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                ncvs = '$ncvs',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };


  //update data tabel pad gauge
  function update_data_pad_press ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $style_color=htmlspecialchars($data ["style_color"]);
    $Size=htmlspecialchars($data["Size"]);
    $grin_size=htmlspecialchars($data["grin_size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);
    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_pad_press SET 
                model = '$model',
                style_color = '$style_color',
                Size = '$Size',
                grin_size = '$grin_size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };


  // Input Data Master Mold BPM
function data_master_mold_bpm ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $kode_mold = htmlspecialchars (ucwords($data ["kode_mold"]));
  $style_color = htmlspecialchars($data ["style_color"]);

//query insert data Master Mold BPM
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_master_mold_bpm WHERE kode_mold='$kode_mold' AND model = '$model'"));
    if ($cek > 0){
    echo "<script>window.alert('Model Shoe & kode mold Sudah di input')
    window.location='data-master-cutting-dies.php'</script>";
    }else {
  
  $query = "INSERT INTO data_master_mold_bpm (model, kode_mold, style_color)
  VALUES ('$model','$kode_mold','$style_color')";
  };
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
}

//hapus data Master Mold BPM
function delete_data_master_mold_bpm ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM data_master_mold_bpm WHERE id = $id");
return mysqli_affected_rows($conn);
}

//hapus data Qrcode Mold BPM
function delete_data_QRCODE_mold_bpm ($id) {
global $conn;
mysqli_query ($conn, "DELETE FROM print_qr_mold_bpm WHERE id = $id");
return mysqli_affected_rows($conn);
}


// Input data QR-Code Pad Gauge
function print_qr_mold_bpm ($data){
global $conn;
  $model = htmlspecialchars($data ["model"]);
  $kode_mold = htmlspecialchars($data ["kode_mold"]);
  $Size = htmlspecialchars($data ["Size"]);
  $grin_size = htmlspecialchars($data ["grin_size"]);
  $No_req = htmlspecialchars ($data ["No_req"]);
  $No_PO = htmlspecialchars($data ["No_PO"]);
  $No_inventory = htmlspecialchars($data ["No_inventory"]);
  $BC_in = htmlspecialchars($data ["BC_in"]);
  $lokasi = htmlspecialchars($data ["lokasi"]);

  $query = "INSERT INTO print_qr_mold_bpm (model, kode_mold, Size, grin_size, No_req, No_PO, No_inventory, BC_in, lokasi)
  VALUES ('$model','$kode_mold','$Size', '$grin_size', '$No_req', '$No_PO', '$No_inventory', '$BC_in','$lokasi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows ($conn);
};

//update data Tooling Mold BPM (Transaksi)
  function tooling_proses_mold_bpm ($data) {
    global $conn;

    $id = $data ["id"];
    $model=htmlspecialchars($data["model"]);
    $kode_mold=htmlspecialchars($data ["kode_mold"]);
    $Size=htmlspecialchars($data["Size"]);
    $No_req=htmlspecialchars($data ["No_req"]);
    $No_PO=htmlspecialchars($data ["No_PO"]);
    $No_inventory=htmlspecialchars($data ["No_inventory"]);
    $BC_in=htmlspecialchars($data ["BC_in"]);
    $ncvs=htmlspecialchars($data ["ncvs"]);
    $lokasi=htmlspecialchars($data ["lokasi"]);

    $result = "UPDATE print_qr_mold_bpm SET 
                model = '$model',
                kode_mold = '$kode_mold',
                Size = '$Size',
                No_req = '$No_req', 
                No_PO = '$No_PO',
                No_inventory = '$No_inventory',
                BC_in = '$BC_in',
                ncvs = '$ncvs',
                lokasi = '$lokasi'
                WHERE id =$id

               ";

      mysqli_query($conn, $result);

      return mysqli_affected_rows($conn);
  };
 ?>