<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('portials.head')
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
