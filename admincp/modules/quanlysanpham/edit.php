<?php
include("./config/connect.php");

$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$giasanpham = $_POST['giasanpham'];
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$hienthi = $_POST['hienthi'];
$danhmuc = $_POST['danhmuc'];
$fileType = $_FILES['hinhanh']['type'];
$fileName = $_FILES['hinhanh']['name'];
$tmpName = $_FILES['hinhanh']['tmp_name'];


$sanpham = "SELECT*FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$result = $conn->query($sanpham);
if (isset($_POST["quaylai"])) {
    echo "
    <script>
    window.location.href='./index.php?action=quanlysanpham';
    </script>";
  }
if (isset($_POST["capnhatsanpham"])) {
    $newFileName = basename($fileName);
    $targetPath = '../images/' . $newFileName;
    if ($fileName != '') {
        move_uploaded_file($tmpName, $targetPath);
        $sql = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',hinhanh='" . $fileName . "',
            tomtat='" . $tomtat . "',noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
        // foreach ($result as $row) {
        //     unlink('../images/' . $row['hinhanh']);
        // }
    } else {
        $sql = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
    giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',tomtat='" . $tomtat . "',
    noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    $conn->query($sql);
    echo "
    <script>
    window.location.href='./index.php?action=quanlysanpham';
    </script>";}



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=quanlysanpham">Quản lý sản phẩm</a></li>
                        <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                <h3 class="card-title">Cập nhật sản phẩm</h3>


            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="bs-stepper-content">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <?php
                            foreach ($result as $row) {


                            ?>

                                <div class='form-group'>
                                    <label>Tên sản phẩm</label>
                                    <input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" class='form-control'>
                                </div>
                                <div class='form-group'>
                                    <label>Mã sản phẩm</label>
                                    <input type="text" name="masanpham" value="<?php echo $row['masanpham'] ?>" class='form-control'>
                                </div>
                                <div class='form-group'>
                                    <label>Giá</label>
                                    <input type="number" name="giasanpham" value="<?php echo $row['giasanpham'] ?>" class='form-control'>
                                </div>
                                <div class='form-group'>
                                    <label>Số lượng</label>
                                    <input type="text" name="soluong" value="<?php echo $row['soluong'] ?>" class='form-control'>
                                </div>
                                <div class='form-group'>
                                    <label>Hình ảnh</label>
                                    <img style="display: block;" id="anhHienThi" src='../images/<?php echo $row['hinhanh']?>' alt="" width="250">
                                <input style="display: block;" value="../images/<?php echo $row['hinhanh']?>" id="anhUpLoad" type="file" name="hinhanh" class="">
                                </div>

                                <div class='form-group'>
                                    <label>Tóm tắt</label>
                                    <textarea name="tomtat" rows="5" cols="50" style="resize: none;" class='form-control'><?php echo $row['tomtat'] ?></textarea>
                                </div>
                                <div class='form-group'>
                                    <label>Nội dung</label>
                                    <textarea name="noidung" rows="5" cols="50" style="resize: none;" class='form-control'><?php echo $row['noidung'] ?></textarea>
                                </div>
                                <div class='form-group'>
                                    <label>Danh mục sản phẩm</label>
                                    <select name="danhmuc">
                                        <?php
                                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                        $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                            if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                                        ?>
                                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" selected><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                            <?php
                                            } else {

                                            ?>
                                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class='form-group'>
                                    <label>Tình trạng </label>

                                    <select name="hienthi">
                                        <?php
                                        if ($row['trangthai'] == 1) {
                                        ?>
                                            <option value="1" selected>Mới</option>
                                            <option value="0">Cũ</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="1">Mới</option>
                                            <option value="0" selected>Cũ</option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <button type="submit" class="btn btn-danger" name="quaylai">Quay lại</button>

                                <button type="submit" class="btn btn-primary" name="capnhatsanpham">Submit</button>
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