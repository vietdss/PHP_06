
<?php
$servername = "localhost";
$username = "root";
$password = "25112003";
$dbname = "banquanao";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['order_id'];
$donhang = "SELECT * FROM tbl_donhang WHERE order_id=$id LIMIT 1";
$result = $conn->query($donhang);

$sql = "DELETE FROM tbl_donhang WHERE id_donhang=$id";
$conn->query($sql);
header('Location:../../index.php?action=quanlydanhmuc');
?>