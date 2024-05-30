
	<?php
            session_start();

    if (isset($_GET['dangxuat']) == '1') {
        unset($_SESSION['username']);
        unset($_SESSION['dangnhap']);
        unset($_SESSION['id_khachhang']);
        header("Location:login.php");

    }
    ?>
		
