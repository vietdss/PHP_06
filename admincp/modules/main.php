
    <?php
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else{
            $action = "";
        }
        if($action == "quanlydanhmuc"){
            include("quanlydanhmuc/index.php");
        }
        if($action == "themdanhmuc"){
            include("quanlydanhmuc/add.php");
        }
        if($action == "quanlysanpham"){
            include("quanlysanpham/index.php");
        }
        if($action == "themsanpham"){
            include("quanlysanpham/add.php");
        }
        if($action == "capnhatsanpham"){
            include("quanlysanpham/edit.php");
        }
        if($action == "quanlydonhang"){
            include("quanlydonhang/index.php");
        }
        if($action == "quanlynguoidung"){
            include("quanlynguoidung/index.php");
        }
        if($action == "capnhatdanhmuc"){
            include("modules/quanlydanhmuc/edit.php");
        }
    ?>