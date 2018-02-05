<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Umbrella Irrigation</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">

                @if (Request::is('overview*'))
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Overview
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Overview</a>
                    </li>
                @endif
                @if (!is_null(Auth::user()) && Auth::user()->isAdmin())
                    @if (Request::is('valves*'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('valves') }}">Valves
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('valves') }}">Valves</a>
                        </li>
                    @endif
                    @if (Request::is('users*'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('users') }}">Users
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">Users</a>
                        </li>
                    @endif
                @endif
                @if (Request::is('forecast*'))
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Forecast
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Forecast</a>
                    </li>
                @endif
                @if (Request::is('retrospective*'))
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Retrospective
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Retrospective</a>
                    </li>
                @endif

            </ul>

            <ul class="navbar-nav navbar-right">
                @guest
                    @if (Request::is('login'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Sign in
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Sign in</a>
                        </li>
                    @endif
                    @if (Request::is('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">Register
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span>
                                @if(Auth::check())
                                    @if(Auth::user()->isAdmin())
                                        (Admin)
                                    @elseif(Auth::user()->isEmployee())
                                        (Employee)
                                    @else
                                        (Guest)
                                    @endif
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Account Settings</a>
                            <a class="dropdown-item" href="#">Notifications</a>
                            <div role="separator" class="dropdown-divider"></div>

                            <!-- Logout -->
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </nav>
</header>