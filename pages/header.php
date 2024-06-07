<?php

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
?>
<style>
    .search {
        position: relative;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1);

    }

    .search input {

        height: 60px;
        text-indent: 25px;
        border: 2px solid #d6d4d4;


    }


    .search input:focus {

        box-shadow: none;
        border: 2px solid blue;


    }

    .search .fa-search {

        position: absolute;
        top: 20px;
        left: 16px;

    }

    .search button {

        position: absolute;
        top: 5px;
        right: 5px;
        height: 50px;
        width: 110px;
        background: blue;

    }
</style>
<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- Currency / Language / My Account -->


                            <li class="account">
                                <?php
                                if (isset($_SESSION['dangnhap'])) {
                                ?>
                                    <a href="#">
                                        <?php echo $_SESSION['username'] ?>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="logout.php?dangxuat=1"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng xuất</a></li>
                                    </ul>
                                <?php
                                } else {
                                ?>
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>


                                    <ul class="account_selection">
                                        <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                        <li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                    </ul>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="main_nav_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="logo_container">
                    <a href="index.php">colo<span>shop</span></a>
                </div>
                <nav class="navbar">
                <ul id="menu-container" class="navbar_menu">
                        <li><a href="index.php">home</a></li>
                        <li><a href="product_categories.php">shop</a></li>
                        <li><a href="list_blog.php">blog</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                    <ul class="navbar_menu">
                        <li id="search-form-container" style="display: none;">
                            <form id="search-form" method="get" action="product_search.php" style="display: flex;">
                                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
                                <button style="background-color: #fe4c50; border: none; cursor: pointer;" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>
                    
                    <ul class="navbar_user">
                        <li><a href="#" id="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li><a href="profile_user.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li class="checkout">
                            <a href="cart.php">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="checkout_items" class="checkout_items"><?php echo $result_chitiet->num_rows ?></span>
                            </a>
                        </li>
                    </ul>
                    <div class="hamburger_container">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>


</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item has-children">
                <a href="#">
                    usd
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">cad</a></li>
                    <li><a href="#">aud</a></li>
                    <li><a href="#">eur</a></li>
                    <li><a href="#">gbp</a></li>
                </ul>
            </li>
            <li class="menu_item has-children">
                <a href="#">
                    English
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">French</a></li>
                    <li><a href="#">Italian</a></li>
                    <li><a href="#">German</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </li>
            <li class="menu_item has-children">
                <a href="#">
                    My Account
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                    <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="#">home</a></li>
            <li class="menu_item"><a href="#">shop</a></li>
            <li class="menu_item"><a href="#">promotion</a></li>
            <li class="menu_item"><a href="#">pages</a></li>
            <li class="menu_item"><a href="#">blog</a></li>
            <li class="menu_item"><a href="#">contact</a></li>
        </ul>
    </div>
</div>
<script>
document.getElementById('search-icon').addEventListener('click', function(event) {
    event.preventDefault();
    var searchFormContainer = document.getElementById('search-form-container');
    if (searchFormContainer.style.display === 'none' || searchFormContainer.style.display === '') {
        searchFormContainer.style.display = 'block';
    } else {
        searchFormContainer.style.display = 'none';
    }
    
});
</script>
