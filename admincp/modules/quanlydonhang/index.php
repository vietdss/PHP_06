<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->



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
             <a href="/admin/category/add" class="btn btn-primary">Thêm mới</a>
            </div>  
        </div>
        <div class="card-body">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên danh mục</td>
                        <td>Thứ tự</td>
                        <td></td>
                    </tr>

                </thead>
                <tbody>
                            <tr id="trow_2">
                                <td>2</td>
                                <td>Trang chủ</td>
                                <td>1</td>
                                <td>
                                    <a href="/admin/category/edit/2" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" data-id="2" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                                </td>
                            </tr>
                            <tr id="trow_3">
                                <td>3</td>
                                <td>Giới thiệu</td>
                                <td>1</td>
                                <td>
                                    <a href="/admin/category/edit/3" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" data-id="3" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                                </td>
                            </tr>
                            <tr id="trow_4">
                                <td>4</td>
                                <td>Tin tức</td>
                                <td>1</td>
                                <td>
                                    <a href="/admin/category/edit/4" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" data-id="4" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                                </td>
                            </tr>
                            <tr id="trow_5">
                                <td>5</td>
                                <td>Khuyến mãi</td>
                                <td>1</td>
                                <td>
                                    <a href="/admin/category/edit/5" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" data-id="5" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                                </td>
                            </tr>
                            <tr id="trow_6">
                                <td>6</td>
                                <td>Liên hệ</td>
                                <td>1</td>
                                <td>
                                    <a href="/admin/category/edit/6" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" data-id="6" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                                </td>
                            </tr>
                            <tr id="trow_7">
                                <td>7</td>
                                <td>Sản Phẩm</td>
                                <td>1</td>
                                <td>
                                    <a href="/admin/category/edit/7" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" data-id="7" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                                </td>
                            </tr>
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
</body>
</html>
