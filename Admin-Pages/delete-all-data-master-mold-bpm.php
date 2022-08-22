<?php
    require 'fungction.php';
    
    if (empty($_POST['pilih'])) {
        ?>
        <script language="JavaScript">
            alert('Oops! Please select your choise ...');
            document.location='data-master-mold-bpm.php';
        </script>
        <?php
    }
        
    else{
        $data =$_POST['pilih'];
        $jml_dipilih =count($data);
        for($x=0;$x<$jml_dipilih;$x++){
            mysqli_query($conn,"DELETE FROM data_master_mold_bpm WHERE id='$data[$x]'");
        }
        ?>
        <script language="JavaScript">
            alert('Data yang anda pilih berhasil di hapus');
            document.location='data-master-mold-bpm.php';
        </script>
        <?php
    }    
?>