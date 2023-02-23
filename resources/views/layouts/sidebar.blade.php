<aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                 <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                     <a href="index.html"><i class="menu-icon fa fa-tachometer"></i>Dashboard </a>
                 </li>
                 <li class="menu-title">MASTER</li><!-- /.menu-title -->
                 <li class="{{ request()->is('kategori*') ? 'active' : '' }} menu-item">
                     <a href="{{ route('kategori.index') }}">
                         <i class="menu-icon fa fa-cube">
                             </i>Kategori 
                     </a>
                 </li>
                 <li class="{{ request()->is('produk*') ? 'active' : '' }} menu-item">
                     <a href="{{ route('produk.index') }}">
                         <i class="menu-icon fa fa-cubes">
                             </i>Produk 
                     </a>
                 </li>
                 <li class="{{ request()->is('member*') ? 'active' : '' }} menu-item">
                     <a href="{{ route('member.index') }}">
                         <i class="menu-icon fa fa-id-card">
                             </i>Member
                     </a>
                 </li>
                 <li class="{{ request()->is('supplier*') ? 'active' : '' }} menu-item">
                     <a href="{{ route('supplier.index') }}">
                         <i class="menu-icon fa fa-truck">
                             </i>Supplier
                     </a>
                 </li>
 
                 <li class="menu-title">TRANSAKSI</li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-money">
                             </i>Pengeluaran
                     </a>
                 </li>
                
                 <li class="menu-item">
                     <a href="#">
                             <i class="menu-icon fa fa-download">
                             </i>Pembelian
                     </a>
                 </li>
                 
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-upload">
                             </i>Penjualan
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-cart-arrow-down">
                             </i>Transaksi Aktif
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-cart-arrow-down">
                             </i>Transaksi Baru
                     </a>
                 </li>
 
                 <li class="menu-title">REPORT</li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-file-pdf-o">
                             </i>Laporan 
                     </a>
                 </li>
 
                 <li class="menu-title">SYSTEM</li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-users">
                             </i>User
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-cogs">
                             </i>Pengaturan
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-cart-arrow-down">
                             </i>Transaksi Aktif
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="#">
                         <i class="menu-icon fa fa-cart-arrow-down">
                             </i>Transaksi Baru
                     </a>
                 </li>
                
             </ul>
         </div><!-- /.navbar-collapse -->
     </nav>
 </aside>