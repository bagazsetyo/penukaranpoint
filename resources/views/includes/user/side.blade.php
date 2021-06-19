
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">User</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Usr</a>
          </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
                <li>
                    <a class="nav-link" href="{{ route('user.dashboard.index') }}">
                      <i class="fas fa-fire"></i> 
                      <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Transaction</li>
                <li>
                    <a class="nav-link" href="{{ route('user.transaksi.index') }}">
                      <i class="fas fa-shopping-cart"></i> 
                      <span>Transaksi</span>
                    </a>
                </li>
                <li>
                  <a class="nav-link" href="{{ route('user.penukaran.index') }}">
                    <i class="fas fa-exchange-alt"></i> 
                    <span>Penukaran</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="{{ route('user.gift.index') }}">
                    <i class="fas fa-gift"></i> 
                    <span>Gift</span>
                  </a>
                </li>
            </ul>
        </aside>
      </div>