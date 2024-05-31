<?php

session_start();
include "../admincp/config/connect.php";

if (isset($_SESSION['dangnhap'])) {
    if (isset($_GET['cong'])) {
        $id = $_GET['cong'];
        $sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
        $result_giohang = $conn->query($sql_giohang);
        $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
        $result_sanpham = $conn->query($sql_sanpham);
        if ($result_giohang->num_rows > 0) {
            $row_giohang = $result_giohang->fetch_assoc();
            $row_sanpham = $result_sanpham->fetch_assoc();
            $sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[cong]' LIMIT 1";
            $result_chitiet = $conn->query($sql_chitiet);
            $row_chitiet = $result_chitiet->fetch_assoc();
            if ($row_chitiet['soluongmua']+1<=$row_sanpham['soluong']){
                $sql_capnhatgiohang = "UPDATE tbl_cart_items SET soluongmua=$row_chitiet[soluongmua]+1,gia=$row_chitiet[gia]+$row_sanpham[giasanpham]	 WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[cong]'";
                $conn->query($sql_capnhatgiohang);
                // $sql_capnhatsanpham = "UPDATE tbl_sanpham SET soluong =  $row_sanpham[soluong]-1 WHERE id_sanpham='" . $id . "'";
                // $conn->query($sql_capnhatsanpham);
            }            
        }
        header('Location:../cart.php');
    }
    if (isset($_POST['sl_input'])) {
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
            if ($_POST['sl_input']>=1 && $_POST['sl_input']<=$row_sanpham['soluong']){
                $sql_capnhatgiohang = "UPDATE tbl_cart_items SET soluongmua=$_POST[sl_input],gia=$_POST[sl_input]*$row_sanpham[giasanpham]	 WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[id_sanpham]'";
                $conn->query($sql_capnhatgiohang);
            }
            
            // if ($_POST['sl_input'] > $row_sanpham['soluong']) {
            //     $sql_capnhatsanpham = "UPDATE tbl_sanpham SET soluong =  $row_sanpham[soluong]-1 WHERE id_sanpham='" . $id . "'";
            //     $conn->query($sql_capnhatsanpham);
            // }
            // if ($_POST['sl_input'] < $row_sanpham['soluong']) {
            //     $sql_capnhatsanpham = "UPDATE tbl_sanpham SET soluong =  $row_sanpham[soluong]+1 WHERE id_sanpham='" . $id . "'";
            //     $conn->query($sql_capnhatsanpham);
            // }
        }
        header('Location:../cart.php');
    }
    if (isset($_GET['tru'])) {
        $id = $_GET['tru'];
        $sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
        $result_giohang = $conn->query($sql_giohang);
        $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
        $result_sanpham = $conn->query($sql_sanpham);
        if ($result_giohang->num_rows > 0) {
            $row_giohang = $result_giohang->fetch_assoc();
            $row_sanpham = $result_sanpham->fetch_assoc();
            $sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[tru]' LIMIT 1";
            $result_chitiet = $conn->query($sql_chitiet);
            $row_chitiet = $result_chitiet->fetch_assoc();
            if ($row_chitiet['soluongmua']-1>=1){
            $sql_capnhatgiohang = "UPDATE tbl_cart_items SET soluongmua=$row_chitiet[soluongmua]-1,gia=$row_chitiet[gia]-$row_sanpham[giasanpham]	 WHERE id_giohang='$row_giohang[id_giohang]'  AND id_sanpham='$_GET[tru]'";
            $conn->query($sql_capnhatgiohang);
            // $sql_capnhatsanpham = "UPDATE tbl_sanpham SET soluong =  $row_sanpham[soluong]+1 WHERE id_sanpham='" . $id . "'";
            // $conn->query($sql_capnhatsanpham);
            }
        }
        header('Location:../cart.php');
    }
}
