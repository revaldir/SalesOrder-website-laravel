<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background: #0D276B">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="navbar-brand-full" src="{{ asset('assets/icons/logo-signet.svg') }}" width="120" height="50" >
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sales Order
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="{{ route('user.budgets.index') }}">Budget</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('user.ouflows.index') }}">Outflow</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('user.reports.index') }}">Report</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-avatar" style="height: 35px;
                        margin: 0 10px;" src="{{ asset('assets/img/user.png') }}" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>{{ Auth::user()->name }}</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">View Profile</a>
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
        </div>
    </div>
</nav>
