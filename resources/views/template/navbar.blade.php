<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="/">Machine à café</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            @if(Auth::user() && Auth::user()->admin)
                @if(Request::is("boissons*") || Request::is("recipes*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                        @endif
                        <a class="nav-link" href="/boissons">Boissons</a>
                    </li>
                    @if(Request::is("ingredients*"))
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                            @endif
                            <a class="nav-link" href="/ingredients">Ingredients</a>
                        </li>
                        @if(Request::is("commandes"))
                            <li class="nav-item active">
                        @else
                            <li class="nav-item">
                                @endif
                                <a class="nav-link" href="/commandes">Commandes</a>
                            </li>

                            @if(Request::is("pieces"))
                                <li class="nav-item active">
                            @else
                                <li class="nav-item">
                                    @endif
                                    <a class="nav-link" href="/pieces">Pièces</a>
                                </li>
                            @endif
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
        @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
            <li class="nav-item dropdown show">
                <a class="nav-link btn btn-secondary dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                   aria-expanded="false"
                   aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>

                </ul>
            </li>
        @endguest
    </ul>

</nav>