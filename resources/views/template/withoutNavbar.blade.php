<div class="collapse navbar-collapse nav justify-content-end" id="app-navbar-collapse">
    @guest
        @if(Request::is("login*"))
            <li class="nav-item active">
        @else
            <li class="nav-item">
                @endif
                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in fa-xs"></i> Login</a></li>

            @if(Request::is("register*"))
                <li class="nav-item active">
            @else
                <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <button class="nav-link btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                type="button"
                                aria-expanded="false"
                                aria-haspopup="true">
                            <i class="fa fa-user fa-xs"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/home"">
                            <i class="fa fa-home fa-xs"></i> Home</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out fa-xs"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                @endguest
</div>