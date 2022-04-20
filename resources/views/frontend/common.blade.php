<!DOCTYPE html>
<html lang="en" class="template-default template-all">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BIKE NATION |  @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/styles.css')}}" media="all" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="wrapper">
        <div class="page">
            @include('frontend.header')
            @yield('content')
            @include('frontend.footer')
        </div>
    </div>
</body>
@include('frontend.js')
@yield('custom_scripts')
</html>
