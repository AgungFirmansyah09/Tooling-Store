<?php
require 'fungction.php';
$id = $_GET ["id"];
if (delete_data_master_mold_bpm ($id) > 0){

echo 
"<script>
   alert ('Data berhasil di dihapus!');
   document.location.href = 'data-master-mold-bpm.php';
</script>
";

} else {
echo 
"<script>
   alert ('Data gagal di dihapus!');
   document.location.href = 'data-master-mold-bpm.php'
</script>
";

}
?>