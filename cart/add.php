<?php
session_start();
include "../admincp/config/connect.php";
//them so luong

//tru so luong

//xóa sản phẩm 


//them 
if (isset($_POST['themgiohang'])) {
	$soluong = 1;
	$id = $_GET['id_sanpham'];
	// $soluong=1;
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($row) {
		$new_product = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasanpham' => $row['giasanpham'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masanpham']));
		//kiem tra session gio hang ton tai
		if (isset($_SESSION['cart'])) {

			$found = false;
			foreach ($_SESSION['cart'] as $cart_item) {
				//neu du lieu trung
				
				if ($cart_item['id'] == $id) {
					
						if ($cart_item['soluong'] < $row['soluong']) {
							$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong']+1, 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);

						}
						else{
							$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);

						}
					$found = true;
				
				}
				else {
					//neu du lieu khong trung
					$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
				}

			}
			if($found == false){
				//lien ket du lieu new_product voi product
				$_SESSION['cart']=array_merge($product,$new_product);
			}else{
				$_SESSION['cart']=$product;
			}

		} else {
			$_SESSION['cart'] = $new_product;
		}
	}
	header('Location:../cart.php');

}
?>