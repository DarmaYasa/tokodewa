<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('admin.dashboard') }}">DC</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>

      {{-- <li class="menu-header">Master</li>
      <li class="{{ Route::is('products.*') ? ' active' : '' }}"><a class="nav-link" href="{{ route('products.index') }}"><i class="fas fa-file-alt"></i> <span>Produk</span></a></li>

      <li class="menu-header">Transaksi</li>
      <li class="{{ Route::is('transactions.*') ? ' active' : '' }}"><a class="nav-link" href="{{ route('transactions.index') }}"><i class="far fa-credit-card"></i> <span>Penjualan</span></a></li>
      <li class="{{ Route::is('services.*') ? ' active' : '' }}"><a class="nav-link" href="{{ route('services.index') }}"><i class="fas fa-file-medical"></i> <span>Servis</span></a></li> --}}
    </ul>
</aside>
