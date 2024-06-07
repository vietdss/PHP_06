<?php
include("./config/connect.php");
$tieude = $_POST['tieude'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$fileType = $_FILES['hinhanhblog']['type'];
$fileName = $_FILES['hinhanhblog']['name'];
$tmpName = $_FILES['hinhanhblog']['tmp_name'];

if (isset($_POST["quaylai"])) {
    echo "
    <script>
    window.location.href='./index.php?action=quanlybaiviet';
    </script>";
}
if (isset($_POST["thembaiviet"])) {
    $newFileName = basename($fileName);
    $targetPath = '../images/' . $newFileName;
    if ($fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png') {
        move_uploaded_file($tmpName, $targetPath);
        $sql = "INSERT INTO tbl_blog(tieude,ngaydang,hinhanhblog,noidung,tomtat) 
    VALUE ('$tieude',NOW(),'$fileName','$noidung','$tomtat')";
        $conn->query($sql);
        echo "
        <script>
        window.location.href='./index.php?action=quanlybaiviet';
        </script>";
        header('Location: ./index.php?action=quanlybaiviet');  // Set redirect header

    } else {
        $hinhanh = '';
        $sql = "INSERT INTO tbl_blog(tieude,ngaydang,hinhanhblog,noidung,tomtat) 
    VALUE ('$tieude',NOW(),'$fileName','$noidung','$tomtat')";
        $conn->query($sql);
        echo "
    <script>
    window.location.href='./index.php?action=quanlybaiviet';
    </script>";
    header('Location: ./index.php?action=quanlybaiviet');  // Set redirect header

    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=quanlybaiviet">Quản lý bài viết</a></li>
                        <li class="breadcrumb-item active">Thêm bài viết</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm bài viết</h3>


            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="bs-stepper-content">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <!-- your steps content here -->
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" name="tieude" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <img style="display: block;" id="anhHienThi" src="" alt="" width="250">
                                <input style="display: block;" id="anhUpLoad" type="file" name="hinhanhblog" class="">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input type="text" name="tomtat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="noidung" id="noidung" class="form-control"></textarea>
                   
                            </div>

                            <button type="submit" class="btn btn-danger" name="quaylai">Quay lại</button>

                            <button type="submit" class="btn btn-primary" name="thembaiviet">Submit</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    var anhHienThi = document.getElementById('anhHienThi');
    var anhUpLoad = document.getElementById('anhUpLoad');
    anhUpLoad.addEventListener('change', function(e) {
        var file = e.target.files[0];
        anhHienThi.src = URL.createObjectURL(file);
    })
</script>
