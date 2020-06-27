  <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>User</a></li>
            <li><a href="{{ route('supplier.index') }}"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <li><a href="{{ route('employe.index') }}"><i class="fa fa-circle-o"></i> Pegawai</a></li>
          </ul>
        </li>
      
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
 </li></ul>