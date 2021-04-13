      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link {{$activePage == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{$activePage == 'masterlist' || $activePage == 'new entry' ? 'menu-open' : 'menu-close' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Masterlist
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('people.index') }}" class="nav-link {{$activePage == 'masterlist' ? 'active' : ''}}">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Masterlist</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('people.create') }}" class="nav-link {{$activePage == 'new entry' ? 'active' : ''}}">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>New Entry (IP)</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{$activePage == 'communities' || $activePage == 'new community' ? 'menu-open' : 'menu-close'}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Communities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('communities.index') }}" class="nav-link {{$activePage == 'communities' ? 'active' : ''}}">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Community List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('communities.create') }}" class="nav-link {{$activePage == 'new community' ? 'active' : ''}}">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>New Community</p>
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