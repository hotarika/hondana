<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components/head')

<body>
    <div id="app">
        {{-- header --}}
        @include('components/header')

        {{-- フラッシュメッセージ --}}
        @if(session('flash'))
        <div class="c-flash" role="alert">{{ session('flash') }}
        </div>
        @endif

        @yield('content')

        {{-- footer --}}
        @include('components/footer')
    </div>
</body>

</html>
