<?php
include("./config/connect.php");
$sql = "SELECT * FROM tbl_chitietdonhang WHERE id_order= $_GET[order_id]";
$result = $conn->query($sql);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý đơn hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./index.php?action=quanlydonhang">Quản lý đơn hàng</a></li>
            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
        <h3 class="card-title">Chi tiết đơn hàng</h3>
        <div class="card-tools">
      <a target="_blank" href="modules/quanlydonhang/generate_invoice.php?order_id=<?php echo $_GET['order_id']; ?>" class="btn btn-primary">In hóa đơn</a>
    </div>

      </div>
      <div class="card-body">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>ID</td>
                <td>Tên sản phẩm</td>
                <td>Hình ảnh</td>
                <td>Số lượng</td>
              </tr>

            </thead>
            <tbody>
              <?php
              foreach ($result as $row) {
                $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham=$row[id_sanpham]";
                $result_sanpham = $conn->query($sql_sanpham);
                $sanpham = $result_sanpham->fetch_assoc();
              ?>
                <tr>
                  <td><?php echo $row['id_order_detail'] ?></td>
                  <td><?php echo $sanpham['tensanpham'] ?></td>
                  <td><img src='../images/<?php echo $sanpham['hinhanh'] ?>' width='50'></td>
                  <td><?php echo $sanpham['soluong'] ?></td>

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