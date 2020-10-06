<nav class="sidebar-nav" style="background: #0D276B">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home.admin')}}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>

        <li class="nav-title">Sales Order</li>
        <li class="nav-item nav-dropdown">
            <a href="#" class="nav-link nav-dropdown-toggle">
                <i class="nav-icon cil-layers"></i> Sales Order
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('budgets.index') }}   ">
                        <i class="nav-icon icon-wallet"></i> Budget
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('outflows.index') }}">
                        <i class="nav-icon cil-money"></i> Outflow
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.index') }}" class="nav-link">
                        <i class="nav-icon cil-notes"></i> Report
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-title">User Management</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="nav-icon fa fa-user-o"></i> User
            </a>
        </li>

        <li class="nav-title">Admin Menu</li>
        <li class="nav-item nav-dropdown">
            <a href="#" class="nav-link nav-dropdown-toggle">
                <i class="nav-icon icon-settings"></i> Admin
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a href="{{ route('users.create') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-plus"></i> Add User
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
