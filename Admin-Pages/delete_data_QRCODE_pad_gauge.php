<?php
require 'fungction.php';
$id = $_GET ["id"];
if (delete_data_QRCODE_pad_gauge ($id) > 0){

echo 
"<script>
   alert ('Data berhasil di dihapus!');
   document.location.href = 'print-barcode-pad-gauge.php';
</script>
";

} else {
echo 
"<script>
   alert ('Data gagal di dihapus!');
   document.location.href = 'print-barcode-pad-gauge.php'
</script>
";

}
?>