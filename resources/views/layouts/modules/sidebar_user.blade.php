<nav class="sidebar-nav" style="background: #0D276B">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home')}}">
                <i class="nav-icon cil-home"></i> Home
            </a>
        </li>

        <li class="nav-title">Menu</li>
        <li class="nav-item nav-dropdown">
            <a href="#" class="nav-link nav-dropdown-toggle">
                <i class="nav-icon cil-layers"></i> Sales Order
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a href="{{ route('user.budgets.index') }}" class="nav-link">
                        <i class="nav-icon icon-wallet"></i> Budget
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.outflows.index') }}" class="nav-link">
                        <i class="nav-icon cil-money"></i> Outflow
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.reports.index') }}" class="nav-link">
                        <i class="nav-icon cil-spreadsheet"></i> Report
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
