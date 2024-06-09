<?php
$servername = "localhost";
$username = "root";
$password = "25112003";
$dbname = "banquanao";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require('fpdf/fpdf.php');

if (!isset($_GET['order_id'])) {
    die("Order ID is required.");
}

$order_id = $_GET['order_id'];
$sql = "SELECT * FROM tbl_chitietdonhang WHERE id_order = '$order_id'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Invoice', 0, 1, 'C');
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Order ID: ' . $order_id, 0, 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 10, 'ID', 1);
$pdf->Cell(80, 10, 'Product Name', 1);
$pdf->Cell(30, 10, 'Image', 1);
$pdf->Cell(30, 10, 'Quantity', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
foreach ($result as $row) {
    $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$row[id_sanpham]'";
    $result_sanpham = $conn->query($sql_sanpham);
    $sanpham = $result_sanpham->fetch_assoc();
    $pdf->Cell(30, 10, $row['id_order_detail'], 1);
    $pdf->Cell(80, 10, $sanpham['tensanpham'], 1);
    $imagePath = 'images/' . $sanpham['hinhanh'];

    if (file_exists($imagePath)) {
        $pdf->Cell(30, 10, $pdf->Image($imagePath, $pdf->GetX() + 2, $pdf->GetY() + 2, 10), 1);
    } else {
        $pdf->Cell(30, 10, 'No image', 1);
    }
    $pdf->Cell(30, 10, $row['soluongmua'], 1);
    $pdf->Ln();
}

$pdf->Output();
