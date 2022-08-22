<?php 
class RaviKoQr
{
  public $server = "localhost";
  public $user = "root";
  public $pass = "";
  public $dbname = "db_toolingstore";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($qrUname,$final,$qrimage)
 	{
    $sql = "INSERT INTO generate_qrcode (model,QRcontent,QR_img) VALUES('$qrUname','$final','$qrimage')";
    $query = $this->conn->query($sql);
    return $query;
 	
 	}
 	public function displayImg()
 	{
 		$sql = "SELECT QR_img from generate_qrcode where QR_img='$qrimage'";

 	}
}
$qr_generate = new RaviKoQr();

