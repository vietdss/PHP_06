
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Trang quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php
          if(isset($_SESSION['admin']))
          echo $_SESSION['admin'];
          
          ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="index.php?action=quanlydanhmuc" class="nav-link">
              <i class="nav-icon fa fa-list" aria-hidden="true"></i>

              <p>
                Quản lý danh mục
              </p>
            </a>
            </li>
       </ul>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="index.php?action=quanlysanpham" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý sản phẩm
              </p>
            </a>
            </li>
       </ul>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="index.php?action=quanlydonhang" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart" aria-hidden="true""></i>
              <p>
                Quản lý đơn hàng
              </p>
            </a>
            </li>
       </ul>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="index.php?action=quanlynguoidung" class="nav-link">
              <i class="nav-icon fa fa-user" aria-hidden="true"></i>
              <p>
                Quản lý người dùng
              </p>
            </a>
            </li>
       </ul>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="index.php?action=quanlybaiviet" class="nav-link">
              <i class="nav-icon fa fa-book" aria-hidden="true"></i>
              <p>
                Quản lý bài viết
              </p>
            </a>
            </li>
       </ul>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="index.php?action=quanlylienhe" class="nav-link">
              <i class="nav-icon fa fa-user" aria-hidden="true"></i>
              <p>
                Quản lý liên hệ
              </p>
            </a>
            </li>
       </ul>
      </nav>
    </div>

  </aside>