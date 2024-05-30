<?php
    session_start();
    include "../admincp/config/connect.php";
    //XÓA HẾT GIỎ HÀNG

		unset($_SESSION['cart']);
		header('Location:../cart.php');


?>