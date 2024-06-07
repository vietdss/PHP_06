<?php
session_start();

include("admincp/config/connect.php");
$sql = "SELECT * FROM tbl_blog WHERE id_blog='$_GET[idblog]'";
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
                            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Chi tiết Blog</li>
                        </ul>
                    </div>

                    <!-- Sidebar -->




                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">

                                <span class="d-block text-center">Admin</span>
                                <span class="date d-block text-center small text-uppercase text-black-50 mb-5"><?php echo $row['ngaydang'] ?></span>
                                <h2 class="heading text-center"><?php echo $row['tieude'] ?></h2>
                                <p class="lead mb-4 text-center"><?php echo $row['tomtat'] ?></p>
                                <img src="images/<?php echo $row['hinhanhblog'] ?>" alt="Image" style="margin: auto;display: block;" class="img-fluid rounded mb-4">




                                <p><?php echo $row['noidung'] ?></p>


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