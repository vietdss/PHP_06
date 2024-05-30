
<?php
$servername = "localhost";
$username = "root";
$password = "25112003";
$dbname = "banquanao";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id_danhmuc'];
$danhmuc = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$id LIMIT 1";
$result = $conn->query($danhmuc);
foreach ($result as $row) {
    unlink('../images/' . $row['hinhanh']);
}
$sql = "DELETE FROM tbl_danhmuc WHERE id_danhmuc=$id";
$conn->query($sql);
header('Location:../../index.php?action=quanlydanhmuc');
?>