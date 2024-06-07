<?php
include("./config/connect.php");

$tieude = $_POST['tieude'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$fileType = $_FILES['hinhanhblog']['type'];
$fileName = $_FILES['hinhanhblog']['name'];
$tmpName = $_FILES['hinhanhblog']['tmp_name'];


$baiviet = "SELECT*FROM tbl_blog WHERE id_blog='$_GET[idbaiviet]' LIMIT 1";
$result = $conn->query($baiviet);
if (isset($_POST["quaylai"])) {
    echo "
    <script>
    window.location.href='./index.php?action=quanlybaiviet';
    </script>";
}
if (isset($_POST["capnhatbaiviet"])) {
    $newFileName = basename($fileName);
    $targetPath = '../images/' . $newFileName;
    if ($fileName != '') {
        move_uploaded_file($tmpName, $targetPath);
        $sql = "UPDATE tbl_blog SET tieude='$tieude',tomtat='$tomtat',noidung='$noidung',ngaydang=NOW(),hinhanhblog='$fileName' WHERE id_blog='$_GET[idbaiviet]'";
        // foreach ($result as $row) {
        //     unlink('../images/' . $row['hinhanh']);
        // }
    } else {
        $sql = "UPDATE tbl_blog SET tieude='$tieude',tomtat='$tomtat',noidung='$noidung',ngaydang=NOW() WHERE id_blog='$_GET[idbaiviet]'";

    }
    $conn->query($sql);
    echo "
    <script>
    window.location.href='./index.php?action=quanlybaiviet';
    </script>";}



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
                        <li class="breadcrumb-item active">Cập nhật bài viết</li>
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
                <h3 class="card-title">Cập nhật bài viết</h3>


            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="bs-stepper-content">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <?php
                            foreach ($result as $row) {


                            ?>

                                <div class='form-group'>
                                    <label>Tiêu đề</label>
                                    <input type="text" value="<?php echo $row['tieude'] ?>" name="tieude" class='form-control'>
                                </div>
                            
                                <div class='form-group'>
                                    <label>Hình ảnh</label>
                                    <img style="display: block;" id="anhHienThi" src='../images/<?php echo $row['hinhanhblog']?>' alt="" width="250">
                                <input style="display: block;" value="../images/<?php echo $row['hinhanhblog']?>" id="anhUpLoad" type="file" name="hinhanhblog" class="">
                                </div>

                                <div class='form-group'>
                                    <label>Tóm tắt</label>
                                    <textarea name="tomtat" rows="5" cols="50" style="resize: none;" class='form-control'><?php echo $row['tomtat'] ?></textarea>
                                </div>
                                <div class='form-group'>
                                    <label>Nội dung</label>
                                    <textarea name="noidung" rows="5" cols="50" style="resize: none;" class='form-control'><?php echo $row['noidung'] ?></textarea>
                                </div>
                            
                                <button type="submit" class="btn btn-danger" name="quaylai">Quay lại</button>

                                <button type="submit" class="btn btn-primary" name="capnhatbaiviet">Submit</button>
                        </form>
                    <?php       }
                    ?>
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
    anhUpLoad.addEventListener('change',function(e){
        var file = e.target.files[0];
        anhHienThi.src = URL.createObjectURL(file);
    })
</script>