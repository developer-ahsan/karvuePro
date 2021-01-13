<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
        
        <div class="sidebar-brand-text mx-3"><img  style="background: white; width: 180px !important" src="{{asset('app-assets/images/Karvue.svg')}}"/></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ Request::url() == url('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      @if(Auth::user()->user_type == 'advertiser')
      <li class="nav-item {{ Request::url() == url('dashboard/fleetoperators') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/fleetoperators')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Fleet Operators</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->user_type == 'fleet')
      <li class="nav-item {{ Request::url() == url('dashboard/servicearea') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/servicearea')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Service Areas</span>
        </a>
      </li>
      @endif
      <!-- Heading -->
      <div class="sidebar-heading">
        Profile Area
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ Request::url() == url('dashboard/updateProfile') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/updateProfile')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Update Profile</span>
        </a>
      </li>
      <li class="nav-item {{ Request::url() == url('dashboard/updatePassword') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/updatePassword')}}">
          <i class="fas fa-fw fa-key"></i>
          <span>Update Password</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->