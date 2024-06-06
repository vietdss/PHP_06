
<?php
$servername = "localhost";
$username = "root";
$password = "25112003";
$dbname = "banquanao";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id_khachhang'];

$sql = "DELETE FROM tbl_dangky WHERE id_khachhang=$id";
$conn->query($sql);
header('Location:../../index.php?action=quanlynguoidung');
?>