<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('assets/icons/logo-signet.svg') }}" width="120" height="50" >
        <img class="navbar-brand-minimized" src="{{ asset('assets/icons/logo-base.svg') }}" width="118"
            height="46">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                @if(Auth::user()->role_id == 1)
                <img class="img-avatar" src="{{ asset('assets/img/admin.png') }}" alt="admin@bootstrapmaster.com">
                @elseif(Auth::user()->role_id == 2)
                <img class="img-avatar" src="{{ asset('assets/img/user.png') }}" alt="admin@bootstrapmaster.com">
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>{{ Auth::user()->name }}</strong>
                </div>
                <div class="divider"></div>
                @if(Auth::user()->role_id == 2)
                <a href="{{ route('user.users.edit', Auth::user()->id) }}" class="dropdown-item">
                    <i class="fa fa-user"></i> Edit Profile
                </a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>
