<?php
	if(isset($_GET['dangxuat'])=='1'){
		unset($_SESSION['admin']);
		header('Location:login.php');
	}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">       
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?dangxuat=1" class="nav-link">Đăng xuất</a>
      </li>
    </ul>
  </nav>