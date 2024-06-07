<?php
session_start();
include("admincp/config/connect.php");
$error_messages = array();

if (isset($_POST['dangky'])) {
	$tenkhachhang = $_POST['hovaten'];
	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];
	$rematkhau =  $_POST['rematkhau'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];

	// Server-side validation
	if (empty($tenkhachhang)) {
		$error_messages['hovaten'] = "Họ và tên không được để trống!";
	}
	if (empty($taikhoan)) {
		$error_messages['taikhoan'] = "Tên đăng nhập không được để trống!";
	}
	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error_messages['email'] = "Địa chỉ email không hợp lệ!";
	}
	if (empty($dienthoai) || !preg_match('/^[0-9]{9,10}$/', $dienthoai)) {
		$error_messages['dienthoai'] = "Số điện thoại phải có 9-10 chữ số!";
	}
	if (empty($matkhau) || strlen($matkhau) < 6 || strlen($matkhau) > 20) {
		$error_messages['matkhau'] = "Mật khẩu phải từ 6 đến 20 ký tự!";
	}
	if ($matkhau !== $rematkhau) {
		$error_messages['rematkhau'] = "Mật khẩu không khớp!";
	}

	if (empty($error_messages)) {
		$sql_dangky = "INSERT INTO tbl_dangky(hovaten,taikhoan,matkhau,sodienthoai,email) VALUE('$tenkhachhang','$taikhoan','$matkhau','$dienthoai','$email')";
		$query_dangky = $conn->query($sql_dangky);
		if ($query_dangky) {
			echo '<script>alert("Đăng ký thành công"); window.location.href = "login.php";</script>';
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
<script>
	function validateForm() {
		let valid = true;
		let errorMessages = {};

		let hovaten = document.forms["userForm"]["hovaten"].value;
		let taikhoan = document.forms["userForm"]["taikhoan"].value;
		let email = document.forms["userForm"]["email"].value;
		let matkhau = document.forms["userForm"]["matkhau"].value;
		let rematkhau = document.forms["userForm"]["rematkhau"].value;
		let dienthoai = document.forms["userForm"]["dienthoai"].value;

		if (hovaten === "") {
			errorMessages.hovaten = "Họ và tên không được để trống!";
			valid = false;
		}
		if (taikhoan === "") {
			errorMessages.taikhoan = "Tên đăng nhập không được để trống!";
			valid = false;
		}
		if (email === "") {
			errorMessages.email = "Email không được để trống!";
			valid = false;
		}
		if (dienthoai === "") {
			errorMessages.dienthoai = "Số điện thoại không được để trống!";
			valid = false;
		}
		if (matkhau === "") {
			errorMessages.matkhau = "Mật khẩu không được để trống!";
			valid = false;
		}
		if (rematkhau === "") {
			errorMessages.rematkhau = "Nhập lại mật khẩu không được để trống!";
			valid = false;
		}

		// Email validation
		let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
		if (!email.match(emailPattern)) {
			errorMessages.email = "Địa chỉ email không hợp lệ!";
			valid = false;
		}

		// Password validation
		if (matkhau.length < 6 || matkhau.length > 20) {
			errorMessages.matkhau = "Mật khẩu phải từ 6 đến 20 ký tự!";
			valid = false;
		}

		// Password matching validation
		if (matkhau !== rematkhau) {
			errorMessages.rematkhau = "Mật khẩu không khớp!";
			valid = false;
		}

		// Phone number validation
		let phonePattern = /^[0-9]{9,10}$/;
		if (!dienthoai.match(phonePattern)) {
			errorMessages.dienthoai = "Số điện thoại phải có 9-10 chữ số!";
			valid = false;
		}

		// Display error messages
		document.getElementById("hovatenError").innerText = errorMessages.hovaten || "";
		document.getElementById("taikhoanError").innerText = errorMessages.taikhoan || "";
		document.getElementById("emailError").innerText = errorMessages.email || "";
		document.getElementById("matkhauError").innerText = errorMessages.matkhau || "";
		document.getElementById("rematkhauError").innerText = errorMessages.rematkhau || "";
		document.getElementById("dienthoaiError").innerText = errorMessages.dienthoai || "";

		return valid;
	}
</script>
<style>

</style>

<body>

	<div class="wrapper">
		<div class="inner">
			<img src="images/image-1.png" alt="" class="image-1">
			<form name="userForm" onsubmit="return validateForm()" action="" method="post">
				<h3>Đăng ký</h3>
				<div class="form-holder">
					<span class="lnr lnr-user"></span>
					<input type="text" class="form-control" name="hovaten" placeholder="Họ và tên">
					<span style="font-size: 12px;margin-top: 30px;color: red;" id="hovatenError" style="color:red;"></span>
				</div>
				<div class="form-holder">
					<span class="lnr lnr-user"></span>
					<input type="text" class="form-control" name="taikhoan" placeholder="Tên đăng nhập">
					<span style="font-size: 12px;margin-top: 30px;color: red;" id="taikhoanError" style="color:red;"></span>
				</div>
				<div class="form-holder">
					<span class="lnr lnr-phone-handset"></span>
					<input type="text" class="form-control" name="dienthoai" placeholder="Số điện thoại">
					<span style="font-size: 12px;margin-top: 30px;color: red;" id="dienthoaiError" style="color:red;"></span>
				</div>
				<div class="form-holder">
					<span class="lnr lnr-envelope"></span>
					<input type="text" class="form-control" name="email" placeholder="Email">
					<span style="font-size: 12px;margin-top: 30px;color: red;" id="emailError" style="color:red;"></span>
				</div>
				<div class="form-holder">
					<span class="lnr lnr-lock"></span>
					<input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu">
					<span style="font-size: 12px;margin-top: 30px;color: red;" id="matkhauError" style="color:red;"></span>
				</div>
				<div class="form-holder">
					<span class="lnr lnr-lock"></span>
					<input type="password" class="form-control" name="rematkhau" placeholder="Nhập lại mật khẩu">
					<span style="font-size: 12px;margin-top: 30px;color: red;" id="rematkhauError" style="color:red;"></span>
				</div>

				<a style="margin-top: 10px;" href="login.php">Bạn đã có tài khoản ?</a>
				<button type="submit" name="dangky" style="margin-top: 10px;">
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