<aside class="main-sidebar elevation-4" style="background: #000;">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard')}}" class="brand-link text-center">
      {{-- <img src="{{ url('public/assets/dist/img/AdminLTELogo.png')}}" alt="E-COMMERCE" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-bold">LARA <span class="pr-3">E-COMMERCE</span></span>
    </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ url('public/assets/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('admin/user/profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="{{ url('admin/dashboard')}}" class="nav-link  @if (Request::segment(2)=='dashboard') active  @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{url('admin/admin/list')}}" class="nav-link @if (Request::segment(2)=='admin') active  @endif ">
                    <i class="nav-icon fas fa-user"></i>
                    <p> Admin</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/users/list')}} " class="nav-link @if (Request::segment(2)=='users') active  @endif ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>

            <li class="nav-item">
            <a href="{{ url('admin/category/list')}}" class="nav-link @if (Request::segment(2)=='category') active  @endif ">
                <i class="nav-icon fas fa-circle"></i>
                <p>Category</p>
            </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/sub_category/list')}}" class="nav-link @if (Request::segment(2)=='sub_category') active  @endif ">
                <i class="nav-icon fas fa-circle"></i>
                <p>Sub Category</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/brand/list')}}" class="nav-link @if (Request::segment(2)=='brand') active  @endif ">
                <i class="nav-icon fas fa-th"></i>
                <p>Brand</p>
                </a>
            </li>

            <li class="nav-item">
            <a href="{{ url('admin/product/list')}}" class="nav-link @if (Request::segment(2)=='product') active  @endif ">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>Products</p>
            </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/color/list')}}" class="nav-link @if (Request::segment(2)=='color') active  @endif ">
                <i class="nav-icon fas fa-brush"></i>
                <p>Colors</p>
                </a>
            </li>

            <li class="nav-header">PAGES</li>

            <li class="nav-item">
                <a href="{{ url('admin/blog/list')}}" class="nav-link @if (Request::segment(2)=='blog') active  @endif ">
                <i class="nav-icon far fa-image"></i> <p> Blog</p>
                </a>
            </li>

            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
                <a href="{{ url('admin/user/profile')}}" class="nav-link @if (Request::segment(2)=='user') active  @endif ">
                    <i class="nav-icon fas fa-user"></i>
                    <p> Profile</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/logout')}}" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Logout</p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
