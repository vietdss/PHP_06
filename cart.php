<?php
session_start();

include("admincp/config/connect.php");
$sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
$result_giohang = $conn->query($sql_giohang);
$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
$result_sanpham = $conn->query($sql_sanpham);
$row_giohang = $result_giohang->fetch_assoc();
$sql_chitiet = "SELECT * FROM tbl_cart_items WHERE tbl_cart_items.id_giohang='$row_giohang[id_giohang]'";
$result_chitiet = $conn->query($sql_chitiet);
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
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Giỏ hàng</li>
						</ul>
					</div>

					<!-- Sidebar -->

			

                    <?php
            if($result_chitiet->num_rows>0){
                
            
            ?>
            <div class="main_content">
                <?php

                $tongcong = 0;

                ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh </th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                        </tr>

                    </thead>

                    <tbody>


                        <?php
                        foreach ($result_chitiet as $cart_item) {
                            $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $cart_item['id_sanpham'] . "' LIMIT 1";
                            $result_sanpham = $conn->query($sql_sanpham);
                            $row_sanpham = $result_sanpham->fetch_assoc();
                            $tonggia = $cart_item['soluong'] * $cart_item['giasanpham'];
                            $tongcong += $cart_item['gia'];
                        ?>
                            <tr>
                                <td style="max-width: 350px;"><?php echo $row_sanpham['tensanpham'] ?></td>
                                <td><img src='images/<?php echo $row_sanpham['hinhanh'] ?>' width='50'></td>
                                <td><?php echo $row_sanpham['giasanpham'] ?>$</td>
                                <td>
                                    <div class="quantity_max1" hidden="true"><?php echo $row['soluongmua'] ?></div>
                                    <a class="minus1" href="cart/edit.php?tru=<?php echo $cart_item['id_sanpham'] ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <form style="display: inline" action="cart/edit.php?id_sanpham=<?php echo $cart_item['id_sanpham'] ?>" method="post"><span id="quantity_value1"><input type="text" name="sl_input" style="width: 25px; text-align: center; border: none;" value="<?php echo $cart_item['soluongmua'] ?>"> </span></form>
                                    <a class="plus1" href="cart/edit.php?cong=<?php echo $cart_item['id_sanpham'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </td>
                                <td><?php echo $cart_item['gia'] ?>$</td>
                                <td>
                                    <a onclick="xoa(<?php echo $cart_item['id_sanpham'] ?>)" href="#" class='btn btn-sm btn-danger btnDelete'>Xóa</a>
                                </td>
                            </tr>

                        <?php
                        } ?>
                        <tr>
                            <td>Tổng cộng:<?php echo $tongcong ?>$</td>
                            <td><a onclick="xoahet()" href="#">Xóa tất cả</a></td>
                            <td><a href="checkout.php">Đặt hàng</a></td>
                        </tr><?php


                                ?>

                    </tbody>

                </table>
            </div>
            <?php
            }else{

           
            ?>
            <div class="main_content"><h2 style="text-align: center;">Giỏ hàng trống</h2></div>
            <?php
            }
            ?>
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
<script>
    function xoa(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm này khỏi giỏ hàng không")) {
            window.location.href = 'cart/delete.php?id=' + id;
            return true;
        } else {
            return false;
        }
    }

    function xoahet() {
        if (confirm("Bạn có đồng ý xóa tất cả sản phẩm khỏi giỏ hàng không")) {
            window.location.href = 'cart/delete_all.php';
            return true;
        } else {
            return false;
        }
    }
</script>