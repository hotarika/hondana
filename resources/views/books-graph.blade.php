@extends('layouts.app')
@section('title', '読書グラフ')

@section('content')
<main class="l-main">
    <div class="container">
        <books-graph-component
            :public-path="{{ json_encode(asset('')) }}"></books-graph-component>
    </div>
</main>
@endsection
