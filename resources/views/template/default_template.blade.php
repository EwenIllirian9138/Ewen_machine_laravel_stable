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
        </div>
    </div>
</header>
@include('template.navbar')

<section class="content container">
    <div class="mb-5 mt-5">
        @yield('content')
    </div>
</section>

<footer class="bg-dark">
    <div class="container">
        <em>Machine à café laravel ilot 5</em>
    </div>
</footer>

</body>
</html>