<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , 'CRM')</title>
    @vite(['resources/js/app.js'])
</head>
<body>
@include('layouts.partials._nav')

<div class="container-fluid px-5">
    @yield('content')
</div>

</body>
</html>
