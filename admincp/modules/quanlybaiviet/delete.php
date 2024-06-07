
<?php
$servername = "localhost";
$username = "root";
$password = "25112003";
$dbname = "banquanao";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['idbaiviet'];
$sanpham = "SELECT * FROM tbl_blog WHERE id_blog=$id LIMIT 1";
$result = $conn->query($danhmuc);
foreach ($result as $row) {
    // unlink('../images/' . $row['hinhanh']);
}
$sql = "DELETE FROM tbl_blog WHERE id_blog=$id";
$conn->query($sql);
header('Location:../../index.php?action=quanlybaiviet');
?>