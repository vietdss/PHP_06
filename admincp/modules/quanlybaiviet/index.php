<?php
include("./config/connect.php");

$sql = "SELECT * FROM tbl_blog  ORDER BY id_blog DESC";
$result = $conn->query($sql);



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
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Quản lý bài viết</li>
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
        <h3 class="card-title">Danh sách bài viết</h3>
        <div class="card-tools">
          <a href="index.php?action=thembaiviet" class="btn btn-primary">Thêm mới</a>
        </div>

      </div>
      <div class="card-body">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>ID</td>
                <td>Tiêu đề</td>
                <td>Hình ảnh </td>
                <td>Tóm tắt</td>
                <td>Ngày đăng</td>           
                <td>Quản lý</td>
              </tr>

            </thead>
            <tbody>
              <?php

              foreach ($result as $row) {
              ?><tr>
                  <td><?php echo $row['id_blog'] ?></td>
                  <td><?php echo $row['tieude'] ?></td>
                  <td><img  src='../images/<?php echo $row['hinhanhblog']?>' width='50'></td>
                  <td><?php echo $row['tomtat'] ?></td>
                  <td><?php echo $row['ngaydang'] ?></td>
                  
                  <td>
                    <a href="?action=capnhatbaiviet&idbaiviet=<?php echo $row['id_blog'] ?>" class='btn btn-sm btn-primary'>Sửa</a>
                    <a onclick="xoa(<?php echo $row['id_blog'] ?>)" href="#" class='btn btn-sm btn-danger btnDelete'>Xóa</a>
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
<script>
    function xoa(idbaiviet){
        if(confirm("Bạn có đồng ý xóa bài viết này không?")){
            window.location.href='modules/quanlybaiviet/delete.php?idbaiviet='+idbaiviet;
            return true;
        }
        else{
            return false;
        }
    }
</script>