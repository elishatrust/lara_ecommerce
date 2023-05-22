<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="p-2 text-center">
    <h4 class="mt-2 text-white font-weight-bold">E-Commerce</h4>
  </div>
  

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="{{ url('admin/dashboard')}}" class="nav-link  @if (Request::segment(2)=='dashboard') active  @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard  
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{url('admin/admin/list')}}" class="nav-link @if (Request::segment(2)=='admin') active  @endif ">
            <i class="nav-icon fas fa-glasses"></i>
            <p>
              Admin
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/users/list')}} " class="nav-link @if (Request::segment(2)=='users') active  @endif ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Users
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/products/list')}}" class="nav-link @if (Request::segment(2)=='products') active  @endif ">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Products
            </p>
          </a>
        </li>

        
        <li class="nav-item">
          <a href="{{ url('admin/logout')}}" class="nav-link">
            <i class="nav-icon fas fa-arrow-left"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>