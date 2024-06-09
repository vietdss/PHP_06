<?php
session_start();
include("admincp/config/connect.php");

// Retrieve existing user data
$sql = "SELECT * FROM tbl_dangky WHERE id_khachhang='$_SESSION[id_khachhang]'";
$result = $conn->query($sql);
$khachang = $result->fetch_assoc();

$error_messages = array();

if (isset($_POST['luu'])) {
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
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_messages['email'] = "Địa chỉ email không hợp lệ!";
    }
    if (empty($matkhau)) {
        $error_messages['matkhau'] = "Mật khẩu không được để trống!";
    }
    if (empty($rematkhau)) {
        $error_messages['rematkhau'] = "Nhập lại mật khẩu không được để trống!";
    }
    if ($matkhau !== $rematkhau) {
        $error_messages['matkhau'] = "Mật khẩu không khớp!";
    }

    if (empty($error_messages)) {
        $sql_update = "UPDATE tbl_dangky SET hovaten='$tenkhachhang', taikhoan='$taikhoan', matkhau='$matkhau', sodienthoai='$dienthoai', email='$email' WHERE id_khachhang='$_SESSION[id_khachhang]'";
        $query_update = $conn->query($sql_update);
        if ($query_update) {
            echo '<script>alert("Cập nhật thành công"); window.location.href = "profile_user.php";</script>';
        } else {
            echo '<script>alert("Cập nhật thất bại");</script>';
        }
    }
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

            // Check if fields are not empty
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
</head>

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
                            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Tài khoản</li>
                        </ul>
                    </div>

                    <!-- Sidebar -->
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <span class="font-weight-bold"><?php echo $khachang['hovaten'] ?></span>
                                <span class="text-black-50"><?php echo $khachang['email'] ?></span>
                            </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Tài khoản của tôi</h4>
                                </div>
                                <form name="userForm" onsubmit="return validateForm()" method="post" action="">
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Họ tên</label>
                                            <input type="text" class="form-control" name="hovaten" value="<?php echo $khachang['hovaten'] ?>">
                                            <span id="hovatenError" style="color:red;"><?php echo isset($error_messages['hovaten']) ? $error_messages['hovaten'] : ''; ?></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Tài khoản</label>
                                            <input type="text" class="form-control" name="taikhoan" value="<?php echo $khachang['taikhoan'] ?>">
                                            <span id="taikhoanError" style="color:red;"><?php echo isset($error_messages['taikhoan']) ? $error_messages['taikhoan'] : ''; ?></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Mật khẩu</label>
                                            <input type="password" class="form-control" name="matkhau" value="<?php echo $khachang['matkhau'] ?>">
                                            <span id="matkhauError" style="color:red;"><?php echo isset($error_messages['matkhau']) ? $error_messages['matkhau'] : ''; ?></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Xác nhận mật khẩu</label>
                                            <input type="password" class="form-control" name="rematkhau" value="<?php echo $khachang['matkhau'] ?>">
                                            <span id="rematkhauError" style="color:red;"><?php echo isset($error_messages['rematkhau']) ? $error_messages['rematkhau'] : ''; ?></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Số điện thoại</label>
                                            <input type="text" class="form-control" name="dienthoai" value="<?php echo $khachang['sodienthoai'] ?>">
                                            <span id="dienthoaiError" style="color:red;"><?php echo isset($error_messages['dienthoai']) ? $error_messages['dienthoai'] : ''; ?></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $khachang['email'] ?>">
                                            <span id="emailError" style="color:red;"><?php echo isset($error_messages['email']) ? $error_messages['email'] : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <button style="background-color: #FF6347; border: none; cursor: pointer;" class="btn btn-primary profile-button" name="luu" type="submit">Lưu</button>
                                    </div>
                                </form>
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
    </div>
</body>

</html>
