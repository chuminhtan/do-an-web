<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">3Gs House</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- DASHBOARD - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- USER- Pages Collapse Menu - Chỉ hiển thị cho Quản Trị-->
    @if (Session::has('user_type') && Session::get('user_type') == 2)
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fas fa-fw fa-user"></i>
            <span>Người Dùng</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản Lý Người Dùng:</h6>
                <a class="collapse-item" href="{{ url('admin/user/list') }}">Danh Sách</a>
                <a class="collapse-item" href="{{ url('admin/user/create') }}">Tạo Mới</a>
            </div>
        </div>
    </li>
    @endif

    <!-- CATEGORY- Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-bars"></i>
            <span>Danh Mục</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản Lý Danh Mục</h6>
                <a class="collapse-item" href="{{ url('admin/category/list') }}">Danh Sách</a>
                <a class="collapse-item" href="{{ url('admin/category/create') }}">Tạo Mới</a>
            </div>
        </div>
    </li>

    <!-- PRODUCT- Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
            aria-expanded="true" aria-controls="collapseProduct">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Sản Phẩm</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản Lý Sản Phẩm</h6>
                <a class="collapse-item" href="{{ url('admin/product/list') }}">Danh Sách</a>
                <a class="collapse-item" href="{{ url('admin/product/create') }}">Tạo Mới</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>