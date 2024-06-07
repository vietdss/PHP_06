<?php
session_start();

include("admincp/config/connect.php");
$sql = "SELECT * FROM tbl_blog";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
                            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog</li>
                        </ul>
                    </div>

                    <!-- Sidebar -->




                    <div class="container">
                            <?php
                            foreach($result as $row){
                            ?>
                            <div class="container" style="display: flex;margin-bottom: 50px;">
                            <div style="background-image: url('images/<?php echo $row['hinhanhblog']?>'); flex: 1.9; margin-right: 15px;">
                            </div>
                            <div class="news-item" style="flex: 3.5;">
                                <div class="news-content">
                                    <h3><?php echo $row['tieude']?></h3><span class="news-post"><?php echo $row['ngaydang']?></span>
                                    <p class="short-description"><?php echo $row['tomtat']?></p>
                                    <a style="background-color: #FF6347; border: none; cursor: pointer;" class="btn btn-primary" href="blog_detail.php?idblog=<?php echo $row['id_blog']?>">Xem thêm</a>
                                </div>
                            </div>
                            </div>
                            <?php
                            }
                            ?>

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