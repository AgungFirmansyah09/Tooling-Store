<?php
require 'fungction.php';
$id = $_GET ["id"];
if (delete_data_master_cutting_dies ($id) > 0){

echo 
"<script>
   alert ('Data berhasil di dihapus!');
   document.location.href = 'data-master-cutting-dies.php';
</script>
";

} else {
echo 
"<script>
   alert ('Data gagal di dihapus!');
   document.location.href = 'data-master-cutting-dies.php'
</script>
";

}
?>