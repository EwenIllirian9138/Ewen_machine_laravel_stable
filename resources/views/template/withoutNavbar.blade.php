<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body>
<img id="background" src="{{ asset('img/7420.jpg') }}"/>
<div class="top-right">

    <div class="dropdown">
        <button class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                type="button"
                aria-expanded="false"
                aria-haspopup="true">
            @guest
                <i class="fa fa-bars fa-xs"></i>
            @else
                <i class="fa fa-user fa-xs"></i> {{ Auth::user()->name }} <span class="caret"></span>
            @endguest
        </button>


        <ul class="dropdown-menu dropdown-menu-right">
            @guest
                <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-sign-in fa-xs"></i> Login </a>
                <a class="dropdown-item" href="{{ route('register') }}"><i class="fa fa-user-plus fa-xs"></i>
                    Register</a>
            @else

                <a class="dropdown-item" href="/home"">
                <i class="fa fa-home fa-xs"></i> Home
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-xs"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest


        </ul>
    </div>
</div>

<section class="front_section content container">
    @yield('content')
</section>

</body>
</html>