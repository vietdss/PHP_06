<!-- <?php

session_start();
include("admincp/config/connect.php");
$id_khachhang = $_SESSION['id_khachhang'];
$sql_khachhang = "SELECT * FROM tbl_dangky WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
$result_khachhang = $conn->query($sql_khachhang);
$khachhang = $result_khachhang->fetch_assoc();
$sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
$result_giohang = $conn->query($sql_giohang);
$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
$result_sanpham = $conn->query($sql_sanpham);
$row_giohang = $result_giohang->fetch_assoc();
$sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'";
$result_chitiet = $conn->query($sql_chitiet);





?> -->
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
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Thanh toán</li>
						</ul>
					</div>

					<!-- Sidebar -->

			

     
            <div class="main_content">
                
         
					<form class="needs-validation" name="frmthanhtoan" method="post" action="checkout_handle.php">
						<input type="hidden" name="kh_tendangnhap" value="dnpcuong">

					

						<div class="row">
							<div class="col-md-4 order-md-2 mb-4">
								<h4 class="d-flex justify-content-between align-items-center mb-3">
									<span class="text-muted">Giỏ hàng</span>
									<span class="badge badge-secondary badge-pill"><?php echo $result_chitiet->num_rows ?></span>
								</h4>
								<ul class="list-group mb-3">
									<?php
									$tong = 0;
									foreach ($result_chitiet as $row) {
										$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $row['id_sanpham'] . "' LIMIT 1";
										$result_sanpham = $conn->query($sql_sanpham);
										$row_sanpham = $result_sanpham->fetch_assoc();
										$tong += $row['gia'];
									?>


										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0"><?php echo $row_sanpham['tensanpham'] ?></h6>
												<small class="text-muted"><?php echo $row_sanpham['giasanpham'] ?>$ x <?php echo $row['soluongmua'] ?></small>
											</div>
											<span class="text-muted"><?php echo $row['gia'] ?>$</span>
										</li>
									<?php
									}

									?>


									<li class="list-group-item d-flex justify-content-between">
										<span>Tổng thành tiền</span>
										<strong><?php echo $tong ?>$</strong>
									</li>
								</ul>




							</div>
							<div class="col-md-8 order-md-1">
								<h4 class="mb-3">Thông tin khách hàng</h4>

								<div class="row">
									<div class="col-md-12">
										<label>Họ tên</label>
										<input type="text" class="form-control" name="hoten" value="<?php echo $khachhang["hovaten"] ?>">
									</div>
									<div class="col-md-12">
										<label>Số điện thoại</label>
										<input type="text" class="form-control" name="sdt" value="<?php echo $khachhang["sodienthoai"] ?>">

									</div>
									<div class="col-md-12">
										<label>Địa chỉ</label>
										<div>
											<select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
												<option value="" selected>Chọn tỉnh thành</option>
											</select>

											<select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
												<option value="" selected>Chọn quận huyện</option>
											</select>

											<select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
												<option value="" selected>Chọn phường xã</option>
											</select>
										</div>
									</div>

								</div>

						
								<hr class="mb-4">
								<button style="cursor: pointer;" class="btn btn-primary btn-lg btn-block" type="submit" name="thanhtoan">Thanh toán bằng Momo</button>
								<button style="cursor: pointer;" class="btn btn-primary btn-lg btn-block" type="submit" name="thanhtoantructiep">Thanh toán trực tiếp</button>

							</div>
						</div>
					</form>

	
            </div>
           
				</div>
			</div>
		</div>

		<?php
        include("pages/benefit.php");
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
	<script>
		var citis = document.getElementById("city");
		var districts = document.getElementById("district");
		var wards = document.getElementById("ward");
		var Parameter = {
			url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
			method: "GET",
			responseType: "application/json",
		};
		var promise = axios(Parameter);
		promise.then(function(result) {
			renderCity(result.data);
		});

		function renderCity(data) {
			for (const x of data) {
				citis.options[citis.options.length] = new Option(x.Name, x.Name); // Change x.Id to x.Name
			}
			citis.onchange = function() {
				district.length = 1;
				ward.length = 1;
				if (this.value != "") {
					const result = data.find(n => n.Name === this.value); // Change n.Id to n.Name

					for (const k of result.Districts) {
						district.options[district.options.length] = new Option(k.Name, k.Name); // Change k.Id to k.Name
					}
				}
			};
			district.onchange = function() {
				ward.length = 1;
				const dataCity = data.find((n) => n.Name === citis.value); // Change n.Id to n.Name
				if (this.value != "") {
					const dataWards = dataCity.Districts.find(n => n.Name === this.value).Wards;

					for (const w of dataWards) {
						wards.options[wards.options.length] = new Option(w.Name, w.Name); // Change w.Id to w.Name
					}
				}
			};
		}
	</script>