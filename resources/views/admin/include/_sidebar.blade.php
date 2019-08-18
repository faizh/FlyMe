 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin_lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        @if($active=="dashboard")
          <li class="active treeview">
        @else
          <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        @if($active=="user")
          <li class="active treeview">
        @else
          <li class="treeview">
        @endif
          <a href="/admin/user">
            <i class="fa fa-user"></i> <span>User</span>
          </a>
        </li>

        @if($active=="rute")
          <li class="active treeview">
        @else
          <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-exchange"></i> <span>Rute</span>
          </a>
        </li>
        
        @if($active=="customer")
          <li class="active treeview">
        @else
          <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-user"></i> <span>Customer</span>
          </a>
        </li>

        @if($active=="reservation")
          <li class="active treeview">
        @else
          <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-book"></i> <span>Reservation</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>