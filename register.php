<?php
session_start();
include("admincp/config/connect.php");
if (isset($_POST['dangky'])) {
	$tenkhachhang = $_POST['hovaten'];
	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];
	$rematkhau =  $_POST['rematkhau'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];

	if (!$tenkhachhang || !$taikhoan || !$matkhau || !$rematkhau || !$email || !$dienthoai) {
		echo '<script>alert("Vui lòng nhập đầy đủ thông tin")
								window.location.href = "register.php";

								</script>';
	} elseif ($matkhau != $rematkhau) {

		echo '<script>alert("Mật khẩu nhập lại không đúng")
							window.location.href = "register.php";

							</script>';
	} else {


		$sql_dangky = "INSERT INTO tbl_dangky(hovaten,taikhoan,matkhau,sodienthoai,email) VALUE('" . $tenkhachhang . "','" . $taikhoan . "','" . $matkhau . "','" . $dienthoai . "','" . $email . "')";
		$query_dangky = $conn->query($sql_dangky);
		if ($query_dangky) {
			echo '<script>alert("Đăng ký thành công")
								window.location.href = "login.php";

								</script>';
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Đăng ký</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- LINEARICONS -->
	<link rel="stylesheet" href="fonts/linearicons/style.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="styles/register.css">
</head>

<body>

	<div class="wrapper">
		<div class="inner">
			<img src="images/image-1.png" alt="" class="image-1">
			<form action="" method="post">
				<h3>Đăng ký</h3>
				<div class="form-holder">
					<span class="lnr lnr-user"></span>
					<input type="text" class="form-control" name="hovaten" placeholder="Họ và tên">
				</div>
				<div class="form-holder">
					<span class="lnr lnr-user"></span>
					<input type="text" class="form-control" name="taikhoan" placeholder="Tên đăng nhập">
				</div>
				<div class="form-holder">
					<span class="lnr lnr-phone-handset"></span>
					<input type="text" class="form-control" name="dienthoai" placeholder="Số điện thoại">
				</div>
				<div class="form-holder">
					<span class="lnr lnr-envelope"></span>
					<input type="text" class="form-control" name="email" placeholder="Email">
				</div>
				<div class="form-holder">
					<span class="lnr lnr-lock"></span>
					<input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu">
				</div>
				<div class="form-holder">
					<span class="lnr lnr-lock"></span>
					<input type="password" class="form-control" name="rematkhau" placeholder="Nhập lại mật khẩu">
				</div>
			
					<a href="login.php">Bạn đã có tài khoản ?</a>
					<button  type="submit" name="dangky" style="margin-top: 10px;">
					<span>Register</span>
				</button>
				</div>
				
			</form>

			<img src="images/image-2.png" alt="" class="image-2">
		</div>

	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>