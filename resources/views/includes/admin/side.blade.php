
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Admin</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Adm</a>
          </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
                <li>
                    <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                      <i class="fas fa-fire"></i> 
                      <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Product</li>
                <li>
                    <a class="nav-link" href="{{ route('admin.product.index') }}">
                      <i class="fas fa-user"></i> 
                      <span>Product</span>
                    </a>
                </li>
                <li class="menu-header">User</li>
                <li>
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                      <i class="fas fa-user"></i> 
                      <span>User</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.gift.index') }}">
                      <i class="fas fa-gift"></i> 
                      <span>Gift</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.penukaran.index') }}">
                      <i class="fas fa-exchange-alt"></i> 
                      <span>Penukaran</span>
                    </a>
                </li>
                <li class="menu-header">Transaction</li>
                <li>
                    <a class="nav-link" href="{{ route('admin.transaksi.index') }}">
                      <i class="fas fa-shopping-cart"></i> 
                      <span>Transaksi</span>
                    </a>
                </li>
            </ul>
        </aside>
      </div>