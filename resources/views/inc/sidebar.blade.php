<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
    <div class="sidebar-brand d-flex">
        <img class="img-responsive mr-auto text-light" src="{{ asset('/img/logo.png')}}" style="height:26px;"
        alt="BlueRentals">
      
      <div id="close-sidebar" >
        <i class="fas fa-bars text-light"></i>
      </div>
    </div>
    <div class="sidebar-header d-flex">
      {{-- <div class="user-pic">
        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
          alt="User picture">
      </div> --}}
      <div class="user-info">
          <a class="text-light" href="#">
              <span class="user-name">{{ Auth::user()->name }}</span><br>
              <small class="text-info">{{implode(', ', Auth::user()->roles()->get()->pluck('name')->toArray())}}</small>
          </a>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul>
          <li>
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          @can('is_admin')
          <li>
          <a href="{{ route('admin.users.index')}}">
            <i class="fa fa-user" aria-hidden="true"></i>
              <span>Users</span>
            </a>
          </li>
          @endcan
          @can('manage-properties')
          <li>
            <a href="{{route('admin.properties.index')}}">
              <i class="fas fa-building"></i>
              <span>Properties</span>
            </a>
          </li>
          @endcan

          @can('is_admin')
          <li>
            <a href="{{route('applications.index')}}">
              <i class="far fa-paper-plane"></i>
              <span>Applications</span>
            </a>
          </li>
          @endcan
          @can('is_admin')
            <li>
              <a href="{{route('applications.agreement')}}">
                <i class="far fa-file"></i>
                <span>Agreement</span>
              </a>
            </li>
          @endcan
          
          <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              
              <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
      </ul>
    </div>
    {{-- <div class="sidebar-footer text-info">
      <small>Copyright &copy {{ now()->year }} Softancy</small>
    </div> --}}
  </div>
</nav>