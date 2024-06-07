<?php
include("./config/connect.php");
$sql = "SELECT * FROM tbl_donhang ORDER BY order_id DESC";
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
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Quản lý đơn hàng</li>
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
          <h3 class="card-title">Danh sách đơn hàng</h3>
          <div class="card-tools">
            </div> 
         
        </div>
        <div class="card-body">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Tên khách hàng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tổng giá</td>
                        <td>Phương thức thanh toán</td>
                        <td>Thời gian</td>
                        <td></td>
                    </tr>

                </thead>
                <tbody>                 
                <?php                
                foreach ($result as $row) {?>
                    <tr>
                    <td><?php echo $row['order_id']?></td>
                    <td><?php echo $row['hoten']?></td>
                    <td><?php echo $row['diachi']?></td>
                    <td><?php echo $row['sdt']?></td>
                    <td><?php echo $row['tonggia']?></td>
                    <td><?php echo $row['cart_payment']?></td>
                    <td><?php echo $row['thoigian']?></td>

                    <td>
                    <a href='?action=chitietdonhang&order_id=<?php echo $row['order_id']?>'class='btn btn-sm btn-primary'>Chi tiết</a>
                    <a onclick="xoa(<?php echo $row['order_id']?>)" href="#" class='btn btn-sm btn-danger btnDelete'>Hủy </a>
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
    function xoa(order_id){
        if(confirm("Bạn có đồng ý hủy đơn hàng này không?")){
            window.location.href='modules/quanlydonhang/delete.php?order_id='+order_id;
            return true;
        }
        else{
            return false;
        }
    }
</script>