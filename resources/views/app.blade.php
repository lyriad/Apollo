<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', config('app.name'))</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link rel="icon" href="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" type="image/svg">
        <livewire:styles>
    </head>
    <body>
        @auth
            @include('core.header')
        @endauth
        <div id="wrapper">
            @yield('slot')
        </div>
        <livewire:scripts>
        <script type="text/javascript" src="{{mix('js/app.js')}}"></script>
        @stack('javascript')
    </body>
</html>