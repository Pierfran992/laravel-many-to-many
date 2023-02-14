<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    @vite('resources/js/app.js')

    <title>Laravel many to many</title>
</head>
<body>
    
    {{-- header --}}
    @include('components.header')

    {{-- main --}}
    <div class="ms_container">
        @yield('content')    
    </div>

    {{-- footer --}}
    @include('components.footer')

</body>
</html>