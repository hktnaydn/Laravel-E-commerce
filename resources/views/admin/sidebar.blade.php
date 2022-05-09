<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets')}}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AlSat.Com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets')}}/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @auth
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          <a href="{{route('admin_logout')}}" class="d-block">Çıkış Yap</a>
          <a href="{{route('admin_setting')}}" class="d-block">Site Ayarları</a>
          @endauth
        </div>
     
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
              <li class="nav-item">
                <a href="{{route('admin_home')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anasayfa </p>
                </a>
              </li>
         
          <li class="nav-item">
            <a href="{{route('admin_category')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Kategoriler
             
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin_products')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Ürünler  

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Siparişler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin_orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Siparişler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin_orders_new')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Siparişler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin_orders_accept')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Onaylanan Siparişler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin_orders_shipping')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kargolanmış Siparişler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin_orders_completed')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tamamlanmış Siparişler</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
