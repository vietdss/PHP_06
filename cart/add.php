<?php
session_start();
include "../admincp/config/connect.php";


if (isset($_SESSION['dangnhap'])) {
	$id = $_GET['id_sanpham'];
	$sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
	$result_giohang = $conn->query($sql_giohang);
	$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
	$result_sanpham = $conn->query($sql_sanpham);
	if ($result_giohang->num_rows > 0) {
		$row_giohang = $result_giohang->fetch_assoc();
		$row_sanpham = $result_sanpham->fetch_assoc();
		$sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[id_sanpham]' LIMIT 1";
		$result_chitiet = $conn->query($sql_chitiet);
		$row_chitiet = $result_chitiet->fetch_assoc();
		if ($result_chitiet->num_rows > 0) {
			if ($row_chitiet['soluongmua'] + 1 <= $row_sanpham['soluong']) {
				$sql_capnhatgiohang = "UPDATE tbl_cart_items SET soluongmua=$row_chitiet[soluongmua]+1,gia=$row_chitiet[gia]+$row_sanpham[giasanpham]	 WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[id_sanpham]'";
				$conn->query($sql_capnhatgiohang);
			}
		} else {
			$sql_themgiohang = "INSERT INTO tbl_cart_items (id_giohang,id_sanpham,soluongmua,gia) VALUES ('$row_giohang[id_giohang]','$row_sanpham[id_sanpham]',1,'$row_sanpham[giasanpham]')";
			$conn->query($sql_themgiohang);
		}
	} else {
		$row_taogiohang = "INSERT INTO tbl_giohang (id_khachhang) VALUES ($_SESSION[id_khachhang])";
		$conn->query($row_taogiohang);
		$sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
		$result_giohang = $conn->query($sql_giohang);
		$row_giohang = $result_giohang->fetch_assoc();
		$row_sanpham = $result_sanpham->fetch_assoc();
		$sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[id_sanpham]' LIMIT 1";
		$result_chitiet = $conn->query($sql_chitiet);
		$row_chitiet = $result_chitiet->fetch_assoc();

		$sql_themgiohang = "INSERT INTO tbl_cart_items (id_giohang,id_sanpham,soluongmua,gia) VALUES ('$row_giohang[id_giohang]','$row_sanpham[id_sanpham]',1,'$row_sanpham[giasanpham]')";
		$conn->query($sql_themgiohang);
	}
	header("Location:../cart.php");
}



//them 
// if (isset($_POST['themgiohang'])) {
// 	$soluong = 1;
// 	$id = $_GET['id_sanpham'];
// 	// $soluong=1;
// 	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";

// 	$result = $conn->query($sql);
// 	$row = $result->fetch_assoc();
// 	if ($row) {
// 		$new_product = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasanpham' => $row['giasanpham'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masanpham']));
// 		//kiem tra session gio hang ton tai
// 		if (isset($_SESSION['cart'])) {

// 			$found = false;
// 			foreach ($_SESSION['cart'] as $cart_item) {
// 				//neu du lieu trung

// 				if ($cart_item['id'] == $id) {

// 						if ($cart_item['soluong'] < $row['soluong']) {
// 							$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong']+1, 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);

// 						}
// 						else{
// 							$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);

// 						}
// 					$found = true;

// 				}
// 				else {
// 					//neu du lieu khong trung
// 					$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
// 				}

// 			}
// 			if($found == false){
// 				//lien ket du lieu new_product voi product
// 				$_SESSION['cart']=array_merge($product,$new_product);
// 			}else{
// 				$_SESSION['cart']=$product;
// 			}

// 		} else {
// 			$_SESSION['cart'] = $new_product;
// 		}
// 	}
// 	header('Location:../cart.php');

// }
