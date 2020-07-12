  <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li>
          <a href="{{ route('home') }}">
            <i class="fa fa-th"></i> <span>beranda</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->level == 'admin')
            <li class="active"><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>User</a></li>

            @endif
            <li><a href="{{ route('supplier.index') }}"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <li><a href="{{ route('employe.index') }}"><i class="fa fa-circle-o"></i> Pegawai</a></li>
            <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i> Produk</a></li>
            <li><a href="{{ route('agents') }}"><i class="fa fa-circle-o"></i> Agen </a></li>
          </ul>
        </li>
      
        <li>
          <a href="{{ route('transaction.index') }}">
            <i class="fa fa-th"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('sale-report') }}">
            <i class="fa fa-th"></i> <span>Laporan Penjualan</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
 </ul>