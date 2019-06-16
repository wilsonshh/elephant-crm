<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">
                    <i class="nav-icon icon-people"></i> Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lead.index') }}">
                    <i class="nav-icon icon-phone"></i> Leads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('project.index') }}">
                    <i class="nav-icon icon-notebook"></i> Projects</a>
            </li>

            <li class="nav-item mt-auto">


                <a class="nav-link nav-link-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="nav-icon icon-lock"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </li>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
