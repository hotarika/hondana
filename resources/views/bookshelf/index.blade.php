@extends('layouts.app')
@section('title', '私の本棚')

@section('content')
<main class="l-main">
    <div class="container">
        <bookshelf-mybooks-component :public-path="{{ json_encode(asset('')) }}">
        </bookshelf-mybooks-component>
    </div>
</main>
@endsection
