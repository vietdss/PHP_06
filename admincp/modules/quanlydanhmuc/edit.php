<?php
include("./config/connect.php");

$tendanhmuc = $_POST['tendanhmuc'];
$file = $_FILES['hinhanh'];
$fileName = $_FILES['hinhanh']['name'];
$tmpName = $_FILES['hinhanh']['tmp_name'];
$id = $_GET['id_danhmuc'];

$danhmuc = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$id LIMIT 1";
$result = $conn->query($danhmuc);
if (isset($_POST["quaylai"])) {
  echo "
  <script>
  window.location.href='./index.php?action=quanlydanhmuc';
  </script>";
}
if (isset($_POST["capnhatdanhmuc"])) {
  $newFileName = basename($fileName);
  $targetPath = '../images/' . $newFileName;
  if ($fileName != '') {
    move_uploaded_file($tmpName, $targetPath);
    $sql="UPDATE tbl_danhmuc SET tendanhmuc='".$tendanhmuc."',banner='".$fileName."' WHERE id_danhmuc=$id";            
    foreach ($result as $row) {
      unlink('../images/' . $row['hinhanh']);
    }
  } else {
    $sql = "UPDATE tbl_danhmuc SET tendanhmuc='" . $tendanhmuc . "',banner='" . $fileName . "' WHERE id_danhmuc=$id";
  }
  $conn->query($sql);
  echo "
  <script>
  window.location.href='./index.php?action=quanlydanhmuc';
  </script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?action=quanlydanhmuc">Quản lý danh mục</a></li>
            <li class="breadcrumb-item active">Cập nhật danh mục</li>
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
        <h3 class="card-title">Cập nhật danh mục</h3>


      </div>
      <div class="card-body">
        <div class="card-body">
          <div class="bs-stepper-content">
            <form method="POST" action="" enctype="multipart/form-data">
              <!-- your steps content here -->
              <?php

              foreach ($result as $row) {
              ?>
                <div class='form-group'>
                  <label>Tên danh mục</label>
                  <input type='text' name='tendanhmuc' value="<?php echo $row['tendanhmuc'] ?>" class='form-control'>
                </div>
                <div class='form-group'>
                  <label>Hình ảnh</label>
                  <input type='file' name='hinhanh'>
                </div>
                <button type="submit" class="btn btn-danger" name="quaylai">Quay lại</button>

                <button type='submit' class='btn btn-primary' name='capnhatdanhmuc'>Cập nhật</button>
              <?php
              }
              ?>
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