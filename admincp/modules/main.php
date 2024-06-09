<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "25112003";
$dbname = "banquanao";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_donhang = "SELECT * FROM tbl_donhang";
$result_donhang = $conn->query($sql_donhang);
$tong = 0;
foreach ($result_donhang as $row) {
    $tong += $row['tonggia'];
}
$sql_khachhang = "SELECT * FROM tbl_dangky";
$result_khachhang = $conn->query($sql_khachhang);

$sql_danhmuc = "SELECT tbl_danhmuc.tendanhmuc, COUNT(tbl_sanpham.id_sanpham) as product_count
                FROM tbl_danhmuc
                INNER JOIN tbl_sanpham  ON tbl_danhmuc.id_danhmuc = tbl_sanpham.id_danhmuc
                GROUP BY tbl_danhmuc.id_danhmuc";
$result_danhmuc = $conn->query($sql_danhmuc);


$sql = "SELECT DATE(thoigian) as date, COUNT(*) as order_count FROM tbl_donhang GROUP BY DATE(thoigian) ORDER BY date";
$result = $conn->query($sql);

$dates = [];
$order_counts = [];

foreach ($result as $row) {
    $dates[] = $row['date'];
    $order_counts[] = $row['order_count'];
}


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}
if ($action == "quanlydanhmuc") {
    include("quanlydanhmuc/index.php");
}
if ($action == "themdanhmuc") {
    include("quanlydanhmuc/add.php");
}
if ($action == "quanlysanpham") {
    include("quanlysanpham/index.php");
}
if ($action == "themsanpham") {
    include("quanlysanpham/add.php");
}
if ($action == "capnhatsanpham") {
    include("quanlysanpham/edit.php");
}
if ($action == "quanlydonhang") {
    include("quanlydonhang/index.php");
}
if ($action == "chitietdonhang") {
    include("quanlydonhang/chitietdonhang.php");
}
if ($action == "quanlynguoidung") {
    include("quanlynguoidung/index.php");
}
if ($action == "capnhatdanhmuc") {
    include("modules/quanlydanhmuc/edit.php");
}
if ($action == "quanlybaiviet") {
    include("modules/quanlybaiviet/index.php");
}
if ($action == "capnhatbaiviet") {
    include("quanlybaiviet/edit.php");
}
if ($action == "thembaiviet") {
    include("quanlybaiviet/add.php");
}
if ($action == "quanlylienhe") {
    include("quanlylienhe/index.php");
}
if ($action == "") {



?>


    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $result_donhang->num_rows; ?></h3>
                                <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $tong ?>$</h3>
                                <p>Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $result_khachhang->num_rows ?></h3>
                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Lượt truy cập</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                   


                </div>
            </div>
        </section>
        <section class="content">
                        <!-- Existing card content ... -->

                        <!-- Chart container -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Biểu đồ mua hàng theo thời gian</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="orderChart"></canvas>
                            </div>
                        </div>
                    </section>
    </div>

<?php } ?>






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get the data from PHP
    var dates = <?php echo json_encode($dates); ?>;
    var orderCounts = <?php echo json_encode($order_counts); ?>;

    // Create the chart
    var ctx = document.getElementById('orderChart').getContext('2d');
    var orderChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Number of Orders',
                data: orderCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>