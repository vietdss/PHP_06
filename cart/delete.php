<?php
    session_start();
    include "../admincp/config/connect.php";
   
    //XÓA SẢN PHẨM
   
        $id=$_GET['id'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                //thiết lập lại session 
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                
            }
        $_SESSION['cart']=$product;
        header('Location:../cart.php');
        }
		
	

?>