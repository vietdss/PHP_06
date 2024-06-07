<?php
include("./config/connect.php");
$sql = "SELECT * FROM tbl_danhmuc";
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
              <li class="breadcrumb-item active">Quản lý danh mục</li>
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
             <a href="index.php?action=themdanhmuc" class="btn btn-primary">Thêm mới</a>
            </div> 
         
        </div>
        <div class="card-body">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Tên danh mục</td>
                        <td>Hình ảnh</td>
                        <td></td>
                    </tr>

                </thead>
                <tbody>                 
                <?php                
                foreach ($result as $row) {?>
                    <tr>
                    <td><?php echo $row['id_danhmuc']?></td>
                    <td><?php echo $row['tendanhmuc']?></td>
                    <td><img  src='../images/<?php echo $row['banner']?>' width='50'></td>
                    <td>
                    <a href='?action=capnhatdanhmuc&id_danhmuc=<?php echo $row['id_danhmuc']?>'class='btn btn-sm btn-primary'>Sửa</a>
                    <a onclick="xoa(<?php echo $row['id_danhmuc']?>)" href="#" class='btn btn-sm btn-danger btnDelete'>Xóa</a>
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
    function xoa(iddanhmuc){
        if(confirm("Bạn có đồng ý xóa danh mục này không?")){
            window.location.href='modules/quanlydanhmuc/delete.php?idsanpham='+iddanhmuc;
            return true;
        }
        else{
            return false;
        }
    }
</script>