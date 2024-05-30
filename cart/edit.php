<?php
session_start();
include "../admincp/config/connect.php";

if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    $sql = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham=$id LIMIT 1";
    $result = $conn->query($sql);
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            $_SESSION['cart'] = $product;
        } else {

            foreach($result as $row) {

                if ($cart_item['soluong'] < $row['soluong']) {
                    $tangsoluong = $cart_item['soluong'] + 1;
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                } else {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            }
        }
    }
    header('Location:../cart.php');
}
//TRỪ SỐ LƯỢNG
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            $_SESSION['cart'] = $product;
        } else {

            if ($cart_item['soluong'] > 1) {
                $trusoluong = $cart_item['soluong'] - 1;
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $trusoluong, 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../cart.php');
}
