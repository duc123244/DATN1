<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{route('admin.dashboard')}}" class="logo">
        <img
          src="../../asset-admin/img/kaiadmin/logo_light.svg"
          alt="navbar brand"
          class="navbar-brand"
          height="20"
        />
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item active">
          <a  href="{{route('admin.dashboard')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">TÁC VỤ</h4>
        </li>
        <li class="nav-item">
          <a href="{{route('categories.index')}}">
            <i class="fas fa-layer-group"></i>
            <p>Danh Mục</p>
          </a>
          
         
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#sidebarLayouts">
            <i class="fas fa-th-list"></i>
            <p>Quản lý Sản phẩm</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{route('products.index')}}">
                  <span class="sub-item">Product</span>
                </a>
              </li>
              <li>
                <a href="{{route('suppliers.index')}}">
                  <span class="sub-item">Suppliers</span>
                </a>
              </li>
              <li>
                <a href="{{route('categories.index')}}">
                  <span class="sub-item">Categories</span>
                </a>
              </li>
              <li>
                <a href="{{route('product_image.index')}}">
                  <span class="sub-item">image</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#tables">
            <i class="fas fa-table"></i>
            <p>Biến thể</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{route('screens.index')}}">
                  <span class="sub-item">Screen</span>
                </a>
              </li>
              <li>
                <a href="{{route('colours.index')}}">
                  <span class="sub-item">Colours</span>
                </a>
              </li>
              <li>
                <a href="{{route('batterys.index')}}">
                  <span class="sub-item">Battery</span>
                </a>
              </li>
              <li>
                <a href="{{route('variants.index')}}">
                  <span class="sub-item">Ram</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{route('users.index')}}">
          <i class="bi bi-person-fill"></i>
            <p>Người dùng</p>
          </a>
          
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#charts">
            <i class="bi bi-bag-heart-fill"></i>
            <p>Giỏ hàng</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav nav-collapse">
              <li>
                <a href="./Giỏ hàng/hoaDon.html">
                  <span class="sub-item">Hóa đơn</span>
                </a>
              </li>
              <li>
                <a href="./Giỏ hàng/trangThai.html">
                  <span class="sub-item">Trạng thái</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="./Thống kê/thongKe.html">
            <i class="far fa-chart-bar"></i>
            <p>Thống kê</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../documentation/index.html">
            <i class="fas fa-file"></i>
            <p>Documentation</p>
            <span class="badge badge-secondary">1</span>
          </a>
        </li>
       
      </ul>
    </div>
  </div>
</div>
