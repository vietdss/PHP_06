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

<body>

    <div class="super_container">

        <!-- Header -->

        <?php
        include("pages/header.php");


        ?>

        <div class="container product_section_container">
            <div class="pt-5"> </div>
            <div class="pt-5"> </div>
            <div class="pt-3"> </div>
         
            <div class="py-5 text-center">
							<h2>Giỏ hàng</h2>
						
						</div>
        <div class="card-body">
                        <?php
                        
                            $tongcong = 0;

                        ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>Tên sản phẩm</td>
                                        <td>Hình ảnh </td>
                                        <td>Giá</td>
                                        <td>Số lượng</td>
                                        <td>Tổng giá</td>
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
                                            <td><?php echo $row_sanpham['tensanpham'] ?></td>
                                            <td><img src='images/<?php echo $row_sanpham['hinhanh'] ?>' width='50'></td>
                                            <td><?php echo $row_sanpham['giasanpham'] ?></td>
                                            <td>
                                                <div class="quantity_max1" hidden="true"><?php echo $row['soluongmua'] ?></div>
                                                <a class="minus1" href="cart/edit.php?tru=<?php echo $cart_item['id_sanpham'] ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <form style="display: inline" action="cart/edit.php?id_sanpham=<?php echo $cart_item['id_sanpham'] ?>" method="post"><span id="quantity_value1"><input type="text" name="sl_input" style="width: 25px; text-align: center; border: none;"  value="<?php echo $cart_item['soluongmua'] ?>"> </span></form>
                                                <a class="plus1" href="cart/edit.php?cong=<?php echo $cart_item['id_sanpham'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </td>
                                            <td><?php echo $cart_item['gia'] ?></td>
                                            <td>
                                                <a href="cart/delete.php?id=<?php echo $cart_item['id_sanpham'] ?>" class='btn btn-sm btn-danger btnDelete'>Xóa</a>
                                            </td>
                                        </tr>

                                    <?php
                                    } ?>
                                    <tr>
                                        <td>Tổng cộng:<?php echo $tongcong ?></td>
                                        <td><a href="cart/delete_all.php">Xóa tất cả</a></td>
                                        <td><a href="checkout.php">Đặt hàng</a></td>
                                    </tr><?php
                                        

                                ?>

                                </tbody>

                            </table>
                    </div>

				</div>
		</div>
        <div class="benefit">
            <div class="container">
                <div class="row benefit_row">
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>free shipping</h6>
                                <p>Suffered Alteration in Some Form</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>cach on delivery</h6>
                                <p>The Internet Tend To Repeat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>45 days return</h6>
                                <p>Making it Look Like Readable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>opening all week</h6>
                                <p>8AM - 09PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="post">
                            <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                                <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                            <ul class="footer_nav">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_nav_container">
                            <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

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