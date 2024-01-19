<!-- Logout Popup -->
<body>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to log out?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="{{ route('logout') }}" class="btn btn-primary"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</body> 
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
    <a class="navbar-brand" href="login">{{ $namePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">

      <ul class="navbar-nav">
        {{-- <li class="nav-item">
          <a class="nav-link" href="#pablo">
            <i class="now-ui-icons media-2_sound-wave"></i>
            <p>
              <span class="d-lg-none d-md-block">{{ __("Stats") }}</span>
            </p>
          </a>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i> <!-- Menggunakan ikon gear -->
              <p>
                  <span class="d-lg-none d-md-block">{{ __("Some Actions") }}</span>
              </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <h6 class="dropdown-header">Konfigurasi</h6> <!-- Caption "Konfigurasi" sebagai header dropdown -->
              <a class="dropdown-item" href="{{route('categories.index')}}">
                  Configure Categories
              </a>
              <a class="dropdown-item" href="{{route('project-owners.configuration')}}">
                  Configure Project Owner
              </a>
              <a class="dropdown-item" href="{{route('configure-priority.index')}}">
                  Configure Priority
              </a>
              <a class="dropdown-item" href="{{route('configure-revisions.index')}}">
                Configure Revisions
              </a>
              <a class="dropdown-item" href="{{route('statuses.index')}}">
                  Configure Status
              </a>
          </div>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="now-ui-icons users_single-02"></i>
            <p>
              <span class="d-lg-none d-md-block">{{ __("Account") }}</span>
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __("My profile") }}</a>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __("Edit profile") }}</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- End Navbar -->