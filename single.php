<?php
include("admincp/config/connect.php");
            session_start();

$sql_single = "SELECT * FROM tbl_sanpham ,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham=$_GET[id_sanpham] LIMIT 1";
$query_single = $conn->query($sql_single);
$single = $query_single->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Single Product</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
</head>
<script>
	function confirmAddToCart(event) {
		event.preventDefault();
		<?php
		if(isset($_SESSION['username'])){ ?>
		var userConfirmed = alert("Sản phẩm đã được thêm vào giỏ hàng");
		event.target.closest('form').submit();
		<?php
		}		
		else{
			?>
			if(confirm("Bạn cần đăng nhập để thêm vào giỏ hàng")){
				window.location.href="./login.php";

			}	
		<?php
		}?>
			
	
	}
</script>
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



		<div class="container single_product_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->
					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $single['tendanhmuc'] ?></li>
							<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>

						</ul>
					</div>
		

				</div>
			</div>

				<form action="cart/add.php?id_sanpham=<?php echo $single['id_sanpham'] ?>" method="post">
					<div class="row">
						<div class="col-lg-7">
							<div class="single_product_pics">
								<div class="row">

									<div class="col-lg-9 image_col order-lg-2 order-1">
										<div class="single_product_image">
											<div class="single_product_image_background" style="background-image:url(images/<?php echo "$single[hinhanh]" ?>)"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="product_details">
								<div class="product_details_title">
									<h2><?php echo "$single[tensanpham]" ?></h2>
									<p><?php echo "$single[tomtat]" ?></p>
								</div>

								<div class="product_price"><?php echo "$single[giasanpham]" ?>$</div>

								<div class="quantity_max1" hidden="true"><?php echo $single['soluong'] ?></div>

								<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">



								
								<button style="margin-left: 0px;border: none;" name="themgiohang" type="submit" style="border: none;" class="red_button add_to_cart_button" onclick="confirmAddToCart(event)"><a>add to cart</a></button>
						
								</div>
							</div>
						</div>
					</div>
				</form>
	
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
	<script src="js/single_custom.js"></script>
</body>

</html>