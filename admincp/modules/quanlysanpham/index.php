<?php
include("./config/connect.php");

$sql = "SELECT * FROM tbl_sanpham ,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$result = $conn->query($sql);



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
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Quản lý sản phẩm</li>
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
        <h3 class="card-title">Danh sách danh mục</h3>
        <div class="card-tools">
          <a href="index.php?action=themsanpham" class="btn btn-primary">Thêm mới</a>
        </div>

      </div>
      <div class="card-body">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>ID</td>
                <td>Tên sản phẩm</td>
                <td>Hình ảnh </td>
                <td>Giá sản phẩm</td>
                <td>Số lượng</td>
                <td>Danh mục</td>
                <td>Mã sản phẩm</td>
                <td>Tóm tắt</td>
                <td>Trạng thái</td>
                <td>Quản lý</td>
              </tr>

            </thead>
            <tbody>
              <?php

              foreach ($result as $row) {
              ?><tr>
                  <td><?php echo $row['id_sanpham'] ?></td>
                  <td><?php echo $row['tensanpham'] ?></td>
                  <td><img  src='../images/<?php echo $row['hinhanh']?>' width='50'></td>
                  <td><?php echo $row['giasanpham'] ?></td>
                  <td><?php echo $row['soluong'] ?></td>
                  <td><?php echo $row['tendanhmuc'] ?></td>
                  <td><?php echo $row['masanpham'] ?></td>
                  <td><?php echo $row['tomtat'] ?></td>
                  <td><?php if ($row['trangthai'] == 1) echo "Mới";
                      else {
                        echo "Cũ";
                      } ?></td>
                  <td>
                    <a href="?action=capnhatsanpham&idsanpham=<?php echo $row['id_sanpham'] ?>" class='btn btn-sm btn-primary'>Sửa</a>
                    <a href="modules/quanlysanpham/handle.php?idsanpham=<?php echo $row['id_sanpham'] ?>" class='btn btn-sm btn-danger btnDelete'>Xóa</a>
                  </td>
                </tr>
              <?php
              }

              ?>
            </tbody>

          </table>
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