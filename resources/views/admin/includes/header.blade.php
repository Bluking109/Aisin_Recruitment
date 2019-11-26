<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('admin.home') }}"><img src="{{ asset('admin/images/logo/logo.png') }}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.home') }}"><img src="{{ asset('admin/images/logo/aiia-logo.png') }}" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ auth()->user()->name }}</span>
                        <img src="{{ asset('admin/images/avatar/avatar.jpg') }}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('admin.settings.index') }}">
                            <i class="mdi mdi-settings text-primary"></i>
                            Settings
                        </a>
                        {{-- <a class="dropdown-item"> --}}
                            {{-- <i class="mdi mdi-file-document-box text-primary"></i> --}}
                            {{-- Documentation --}}
                        {{-- </a> --}}
                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-logout text-primary"></i>Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
</nav>