<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body class="container">

@include('template.back_office.navbar')

<header class="title">
    <div class="content">
        <div class="title m-b-md">
            @yield('titre')
        </div>
    </div>
</header>

<section class="content">
    @yield('content')
</section>

</body>
</html>