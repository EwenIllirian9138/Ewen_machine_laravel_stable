<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body>
<header>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">
                @yield('titre')
            </h1>
            <p class="lead">@yield('description')</p>
        </div>
    </div>
</header>

@include('template.navbar')

<section class="content container">
    @yield('content')
</section>

</body>
</html>