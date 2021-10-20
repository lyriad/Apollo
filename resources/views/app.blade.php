<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', config('app.name'))</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <livewire:styles>
    </head>
    <body>
        @include('core.header')
        <div id="wrapper">
            @yield('app')
        </div>
        <livewire:scripts>
        <script type="text/javascript" src="{{mix('js/app.js')}}"></script>
        @stack('javascript')
    </body>
</html>