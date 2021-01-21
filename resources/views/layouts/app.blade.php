<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components/head')

<body>
    <div id="app">
        {{-- header --}}
        @include('components/header')

        <main class="l-main">
            <div class="container">
                @yield('content')
            </div>
        </main>

        {{-- footer --}}
        @include('components/footer')
    </div>
</body>

</html>
