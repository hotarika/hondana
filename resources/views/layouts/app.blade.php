<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components/head')

<body>
    <div id="app">
        {{-- header --}}
        @include('components/header')

        @yield('content')

        {{-- footer --}}
        @include('components/footer')
    </div>
</body>

</html>
