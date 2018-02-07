<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            @yield('titre')
        </div>
        @include('template.navbar')
    </div>
</div>
</body>
</html>