<?php
require 'fungction.php';
$id = $_GET ["id"];
if (delete ($id) > 0){

echo 
"<script>
   alert ('Data berhasil di dihapus!');
   document.location.href = 'Regis.php';
</script>
";

} else {
echo 
"<script>
   alert ('Data gagal di dihapus!');
   document.location.href = 'Regis.php'
</script>
";

}
?>