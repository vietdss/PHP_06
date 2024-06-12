<?php
            session_start();

include("admincp/config/connect.php");

$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = $conn->query($sql_danhmuc);

$category = isset($_GET['category']) ? $_GET['category'] : "All";

if ($category == "All") {
	$sql_count_sanpham = "SELECT COUNT(*) AS total FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc";
} else {
	$sql_count_sanpham = "SELECT COUNT(*) AS total FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.tendanhmuc = '$category'";
}

$result_count = $conn->query($sql_count_sanpham);
$row_count = $result_count->fetch_assoc();
$total_products = $row_count['total'];

$products_per_page = 10;
$total_pages = ceil($total_products / $products_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_index = ($current_page - 1) * $products_per_page;

if ($category == "All") {
	$sql_show_sanpham = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $start_index, $products_per_page";
} else {
	$sql_show_sanpham = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.tendanhmuc = '$category' ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $start_index, $products_per_page";
}

$query_show_sanpham = $conn->query($sql_show_sanpham);
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
<body>

	<div class="super_container">

		<!-- Header -->
		<?php include("pages/header.php"); ?>

		<div class="fs_menu_overlay"></div>

		<div class="container product_section_container">
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->
					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $category ?></li>
						</ul>
					</div>

					<!-- Sidebar -->
					<div class="sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Product Category</h5>
							</div>
							<ul class="sidebar_categories">
								<li><a href="product_categories.php">All</a></li>
								<?php foreach ($query_danhmuc as $row) { ?>
									<li><a href="product_categories.php?category=<?php echo $row['tendanhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
								<?php } ?>
							</ul>
						</div>

						<!-- Price Range Filtering -->
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Filter by Price</h5>
							</div>
							<p>
								<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
							</p>
							<div id="slider-range"></div>
							<div class="filter_button"><span>filter</span></div>
						</div>
					</div>

					<!-- Main Content -->
					<div class="main_content">

						<!-- Products -->
						<div class="products_iso">
							<div class="row">
								<div class="col">

									<!-- Product Sorting -->
									<div class="product_sorting_container product_sorting_container_top">
										<ul class="product_sorting">
											<li>
												<span class="type_sorting_text">Default Sorting</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_type">
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
												</ul>
											</li>
										</ul>
										<div class="pages d-flex flex-row align-items-center">
											<div class="page_current">
												<span><?php echo $current_page; ?></span>
												<ul class="page_selection">
													<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
														<li><a href="product_categories.php?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
													<?php } ?>
												</ul>
											</div>
											<div class="page_total"><span>of</span> <?php echo $total_pages; ?></div>
											<?php if ($current_page < $total_pages) { ?>
												<div id="next_page" class="page_next"><a href="product_categories.php?category=<?php echo $category; ?>&page=<?php echo $current_page + 1; ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
											<?php } ?>
										</div>
									</div>

									<!-- Product Grid -->
									<div class="product-grid">
										<?php foreach ($query_show_sanpham as $row) { ?>
											<form action="cart/add.php?id_sanpham=<?php echo $row['id_sanpham'] ?>" method="post">
												<div class="product-item <?php echo $row['tendanhmuc'] ?>">
													<div class="product discount product_filter">
														<div class="product_image">
															<img src="images/<?php echo $row['hinhanh'] ?>" alt="">
														</div>
														<div class="favorite favorite_left"></div>
														<div class="product_info">
															<h6 class="product_name"><a href="single.php?id_sanpham=<?php echo $row['id_sanpham'] ?>"><?php echo $row['tensanpham'] ?></a></h6>
															<div class="product_price"><?php echo $row['giasanpham'] ?>$</div>
														</div>
													</div>
													<?php if ($row['soluong'] > 0) { ?>
														<button name="themgiohang" type="submit" style="border: none;" class="red_button add_to_cart_button" onclick="confirmAddToCart(event)"><a>add to cart</a></button>
													<?php } else { ?>
														<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Hết</span></div>
													<?php } ?>
												</div>
											</form>
										<?php } ?>
									</div>

									<!-- Product Sorting -->
									<div class="product_sorting_container product_sorting_container_bottom clearfix">
										<div class="pages d-flex flex-row align-items-center">
											<div class="page_current">
												<span><?php echo $current_page; ?></span>
												<ul class="page_selection">
													<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
														<li><a href="product_categories.php?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
													<?php } ?>
												</ul>
											</div>
											<div class="page_total"><span>of</span> <?php echo $total_pages; ?></div>
											<?php if ($current_page < $total_pages) { ?>
												<div id="next_page_1" class="page_next"><a href="product_categories.php?category=<?php echo $category; ?>&page=<?php echo $current_page + 1; ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
											<?php } ?>
										</div>
									</div>

								</div>
							</div>
						</div>
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