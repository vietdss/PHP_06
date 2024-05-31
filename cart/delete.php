<?php
    session_start();
    include "../admincp/config/connect.php";
   
    $id = $_GET['id'];
	$sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
	$result_giohang = $conn->query($sql_giohang);
	$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
	$result_sanpham = $conn->query($sql_sanpham);
	if($result_giohang->num_rows>0){
		$row_giohang = $result_giohang->fetch_assoc();
		$row_sanpham = $result_sanpham->fetch_assoc();
		$sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[id_sanpham]' LIMIT 1";
		$result_chitiet = $conn->query($sql_chitiet);
		$row_chitiet = $result_chitiet->fetch_assoc();
		$sql_xoa= "DELETE FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[id]'";
        $conn->query($sql_xoa);

	}
   
      
        header('Location:../cart.php');
      
		
	

?>