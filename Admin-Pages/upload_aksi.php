<?php
require 'fungction.php';
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
        $style_color = $sheetData[$i]['3'];
        mysqli_query($conn,"INSERT INTO data_master_cutting_dies (id, model, component, style_color) values ('','$model','$component','$style_color')");
    }
    header("Location: data-master-cutting-dies.php"); 
}
?>