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
      @if(Auth::user()->user_type == 'admin')
        <li class="nav-item {{ Request::url() == url('dashboard/adminfleets') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/adminfleets')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Commercial Fleet Operator</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/adminAdvertiser') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/adminAdvertiser')}}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Advertisers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/adminDesigner') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/adminDesigner')}}">
            <i class="fas fa-fw fa-snowflake"></i>
            <span>Designers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/adminPrinters') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/adminPrinters')}}">
            <i class="fas fa-fw fa-print"></i>
            <span>Printers</span>
          </a>
                </li>
      @endif

      @if(Auth::user()->user_type == 'designer')
        <li class="nav-item {{ Request::url() == url('dashboard/designSamples') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/designSamples')}}">
            <i class="fas fa-fw fa-snowflake"></i>
            <span>Portfolio Samples</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/designerServicePlans') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/designerServicePlans')}}">
            <i class="fas fa-fw fa-print"></i>
            <span>Services</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activeFleet') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeFleet')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Active Commercial Fleet Operator</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activeAdvertiser') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeAdvertiser')}}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Active Advertisers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activeDesigner') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeDesigner')}}">
            <i class="fas fa-fw fa-snowflake"></i>
            <span>Active Designers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activePrinters') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activePrinters')}}">
            <i class="fas fa-fw fa-print"></i>
            <span>Active Printers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/adsView') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/adsView')}}">
            <i class="fas fa-fw fa-print"></i>
            <span>Ads View</span>
          </a>
        </li>
      @endif
      @if(Auth::user()->user_type == 'printing')
        
        <li class="nav-item {{ Request::url() == url('dashboard/activeFleet') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeFleet')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Active Commercial Fleet Operator</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activeAdvertiser') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeAdvertiser')}}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Active Advertisers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activeDesigner') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeDesigner')}}">
            <i class="fas fa-fw fa-snowflake"></i>
            <span>Active Designers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/workingHoursPrinter') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/workingHoursPrinter')}}">
          <i class="fas fa-fw fa-clock"></i>
          <span>Installation Schedule</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->user_type == 'advertiser')
      <li class="nav-item {{ Request::url() == url('dashboard/activeFleet') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/activeFleet')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Fleet Operators</span>
        </a>
      </li>
      <li class="nav-item {{ Request::url() == url('dashboard/activeDesigner') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activeDesigner')}}">
            <i class="fas fa-fw fa-snowflake"></i>
            <span>Active Designers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/activePrinters') ? 'active' : ''}}">
          <a class="nav-link collapsed" href="{{url('dashboard/activePrinters')}}">
            <i class="fas fa-fw fa-print"></i>
            <span>Active Printers</span>
          </a>
        </li>
        <li class="nav-item {{ Request::url() == url('dashboard/createanAds') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/createanAds')}}">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Create an Ad</span>
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
      <li class="nav-item {{ Request::url() == url('dashboard/fleetvehicles') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/fleetvehicles')}}">
          <i class="fas fa-fw fa-car"></i>
          <span>Commercial Vehicles</span>
        </a>
      </li>
      <li class="nav-item {{ Request::url() == url('dashboard/workingHours') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/workingHours')}}">
          <i class="fas fa-fw fa-clock"></i>
          <span>Installation Schedule</span>
        </a>
      </li>
      <li class="nav-item {{ Request::url() == url('dashboard/getWayPoints') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('dashboard/getWayPoints')}}">
          <i class="fas fa-fw fa-map-marker"></i>
          <span>WayPoints</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->user_type != 'admin')

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
@endif
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