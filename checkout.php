<?php

session_start();
include("admincp/config/connect.php");
if (isset($_POST['thanhtoan'])) {
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_order = rand(0, 9999);
	$cart_pay = "tienmat";
	$insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,cart_payment) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $cart_pay . "')";

	if ($conn->query($insert_cart) === TRUE) {
		foreach ($_SESSION['cart'] as $key => $value) {
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];

			$insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
			$conn->query($insert_order_details);
		}
	}
	unset($_SESSION['cart']);
	$message = "Đặt hàng thành công";
	echo "<script type='text/javascript'>alert('$message');</script>";
	

}





?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Colo Shop Categories</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
</head>
<style>
	.plus1,
	.minus1 {
		padding-left: 14px;
		padding-right: 14px;
		cursor: pointer;
	}

	.plus1:hover,
	.minus1:hover {
		color: #b5aec4;
	}

	.red_button {
		color: white;
	}

	.red_button:hover {
		cursor: pointer;
	}
</style>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php
		include("pages/header.php");


		?>

		<div class="fs_menu_overlay"></div>

		<!-- Hamburger Menu -->



		<div class="container product_section_container">
			<main role="main">
				<!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
				<div class="container mt-4">
					<form class="needs-validation" name="frmthanhtoan" method="post" action="#">
						<input type="hidden" name="kh_tendangnhap" value="dnpcuong">

						<div class="py-5 text-center">
							<i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
							<h2>Thanh toán</h2>
							<p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
						</div>

						<div class="row" >
							<div class="col-md-4 order-md-2 mb-4">
								<h4 class="d-flex justify-content-between align-items-center mb-3">
									<span class="text-muted">Giỏ hàng</span>
									<span class="badge badge-secondary badge-pill">2</span>
								</h4>
								<ul class="list-group mb-3">
									<input type="hidden" name="sanphamgiohang[1][sp_ma]">
									<input type="hidden" name="sanphamgiohang[1][gia]">
									<input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

									<li class="list-group-item d-flex justify-content-between lh-condensed">
										<div>
											<h6 class="my-0">Apple Ipad 4 Wifi 16GB</h6>
											<small class="text-muted">11800000.00 x 2</small>
										</div>
										<span class="text-muted">23600000</span>
									</li>
									<input type="hidden" name="sanphamgiohang[2][sp_ma]" value="4">
									<input type="hidden" name="sanphamgiohang[2][gia]" value="14990000.00">
									<input type="hidden" name="sanphamgiohang[2][soluong]" value="8">

									<li class="list-group-item d-flex justify-content-between lh-condensed">
										<div>
											<h6 class="my-0">Apple iPhone 5 16GB White</h6>
											<small class="text-muted">14990000.00 x 8</small>
										</div>
										<span class="text-muted">119920000</span>
									</li>
									<li class="list-group-item d-flex justify-content-between">
										<span>Tổng thành tiền</span>
										<strong>143520000</strong>
									</li>
								</ul>


								<div class="input-group">
									<input type="text" class="form-control" placeholder="Mã khuyến mãi">
									<div class="input-group-append">
										<button type="submit" class="btn btn-secondary">Xác nhận</button>
									</div>
								</div>

							</div>
							<div class="col-md-8 order-md-1">
								<h4 class="mb-3">Thông tin khách hàng</h4>

								<div class="row">
									<div class="col-md-12">
										<label for="kh_ten">Họ tên</label>
										<input type="text" class="form-control" name="kh_ten" id="kh_ten" value="Dương Nguyễn Phú Cường" readonly="">
									</div>
									<div class="col-md-12">
										<label for="kh_gioitinh">Giới tính</label>
										<input type="text" class="form-control" name="kh_gioitinh" id="kh_gioitinh" value="Nam" readonly="">
									</div>
									<div class="col-md-12">
										<label for="kh_diachi">Địa chỉ</label>
										<input type="text" class="form-control" name="kh_diachi" id="kh_diachi" value="130 Xô Viết Nghệ Tỉnh" readonly="">
									</div>
									<div class="col-md-12">
										<label for="kh_dienthoai">Điện thoại</label>
										<input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai" value="0915659223" readonly="">
									</div>
									<div class="col-md-12">
										<label for="kh_email">Email</label>
										<input type="text" class="form-control" name="kh_email" id="kh_email" value="phucuong@ctu.edu.vn" readonly="">
									</div>
									<div class="col-md-12">
										<label for="kh_ngaysinh">Ngày sinh</label>
										<input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh" value="11/6/1989" readonly="">
									</div>
									<div class="col-md-12">
										<label for="kh_cmnd">CMND</label>
										<input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd" value="362209685" readonly="">
									</div>
								</div>

								<h4 class="mb-3 my-3">Hình thức thanh toán</h4>
								<div class=" col-md-12">
									<div class="form-check col-md-12">
										<input  type="radio" class="form-check-input" name="optradio" value="Tiền mặt" checked>
										<label style="padding-left:0;" class="form-check-label" for="radio1">Tiền mặt</label>
									</div>
									<div class="form-check col-md-12">
										<input type="radio" class="form-check-input" id="radio2" name="optradio" value="Chuyển khoản">
										<label style="padding-left:0;" class="form-check-label" for="radio2">Chuyển khoản</label>
									</div>
								</div>
								<hr class="mb-4">
								<button class="btn btn-primary btn-lg btn-block" type="submit" name="thanhtoan">Thanh toán</button>
							</div>
						</div>
					</form>

				</div>
				<!-- End block content -->
			</main>

		</div>

		<?php
					include("pages/newsletter.php");

		include("pages/footer.php");


		?>


	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/categories_custom.js"></script>
</body>

</html>