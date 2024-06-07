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

if (isset($_POST["quaylai"])) {
    echo "
    <script>
    window.location.href='./index.php?action=quanlysanpham';
    </script>";
  }
if (isset($_POST["themsanpham"])) {
    $newFileName = basename($fileName);
    $targetPath = '../images/' . $newFileName;
    if ($fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png') {
        move_uploaded_file($tmpName, $targetPath);
        $sql = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,trangthai,id_danhmuc) 
    VALUE ('" . $tensanpham . "','" . $masanpham . "','" . $giasanpham . "','" . $soluong . "','" . $fileName . "','" . $tomtat . "','" . $noidung . "'," . $hienthi . ",'" . $danhmuc . "')";
        $conn->query($sql);
        echo "
        <script>
        window.location.href='./index.php?action=quanlysanpham';
        </script>";    } else {
        $hinhanh = '';
        $sql = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,trangthai,id_danhmuc) 
                VALUE ('" . $tensanpham . "','" . $masanpham . "','" . $giasanpham . "','" . $soluong . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "'," . $hienthi . ",'" . $danhmuc . "')";
        $conn->query($sql);
        echo "
        <script>
        window.location.href='./index.php?action=quanlysanpham';
        </script>";    }
}

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
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                <h3 class="card-title">Thêm sản phẩm</h3>


            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="bs-stepper-content">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <!-- your steps content here -->
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="tensanpham" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input type="text" name="masanpham" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" name="giasanpham" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="text" name="soluong" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <img style="display: block;" id="anhHienThi" src="" alt="" width="250">
                                <input style="display: block;" id="anhUpLoad" type="file" name="hinhanh" class="">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <div><textarea name="tomtat" rows="5" cols="100" style="resize: none;" class="form-control"></textarea> </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <div><textarea name="noidung" rows="5" cols="100" style="resize: none;" class="form-control"></textarea></div>
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="danhmuc">
                                    <?php
                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                    $result = $conn->query($sql);
                                    foreach ($result as $row) {
                                    ?>
                                        <option value="<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></option>


                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select name="hienthi">
                                    <option value="1">Mới</option>
                                    <option value="0">Cũ</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger" name="quaylai">Quay lại</button>

                            <button type="submit" class="btn btn-primary" name="themsanpham">Submit</button>
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
    anhUpLoad.addEventListener('change',function(e){
        var file = e.target.files[0];
        anhHienThi.src = URL.createObjectURL(file);
    })
</script>