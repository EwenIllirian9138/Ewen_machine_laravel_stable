<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="/back_office">Back Office</a>
    </div>


    <div class="content">
        <div class="title m-b-md">
            @yield('titre')
        </div>

        @include('template.front_office.liens_fragment')
    </div>
</div>
</body>
</html>