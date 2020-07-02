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
            <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i> Produk</a></li>
          </ul>
        </li>
      
        <li>
          <a href="{{ route('transaction.index') }}">
            <i class="fa fa-th"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              
            </span>
          </a>
 </li></ul>