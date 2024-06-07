<?php
include("./config/connect.php");
$sql = "SELECT * FROM tbl_lienhe ORDER BY id_lienhe DESC";
$result = $conn->query($sql);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý liên hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Quản lý liên hệ</li>
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
          <h3 class="card-title">Danh sách liên hệ</h3>
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
                        <td>Email</td>
                        <td>Liên hệ</td>
                        <td></td>
                    </tr>

                </thead>
                <tbody>                 
                <?php                
                foreach ($result as $row) {?>
                    <tr>
                    <td><?php echo $row['id_lienhe']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['message']?></td>
                    <td>
                    <a onclick="xoa(<?php echo $row['id_lienhe']?>)" href="#" class='btn btn-sm btn-danger btnDelete'>Xóa</a>
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
    function xoa(id_lienhe){
        if(confirm("Bạn có đồng ý xóa liên hệ này không?")){
            window.location.href='modules/quanlylienhe/delete.php?id_lienhe='+id_lienhe;
            return true;
        }
        else{
            return false;
        }
    }
</script>