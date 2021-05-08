  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="index.html"> <img src="https://via.placeholder.com/216x62" alt="logo"> </a>
    </div>

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ route('admin.home') }}">
          <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
        </a>
      </li>

      <!---User management starts here-->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#customer" aria-expanded="false" aria-controls="customer">
          <span><i class="fas fa-users"></i>User Management</span>
        </a>
        <ul id="customer" class="collapse" aria-labelledby="customer" data-parent="#side-nav-accordion">
          <li> <a href="{{ route('admin.users.index') }}">Users</a> </li>
          <li> <a href="{{ route('admin.roles.index') }}">Roles</a> </li>
          <li> <a href="{{ route('admin.permissions.index') }}">Permissions</a> </li>
        </ul>
      </li>
      <!-- User management ends here -->

      <!-- Change Password starts here -->
      <li class="menu-item">
        <a href="{{ route('auth.change_password') }}">
          <span><i class="fas fa-key"></i>Change Password</span>
        </a>
      </li>
      <!-- Change Password ends here -->

    </ul>


  </aside>