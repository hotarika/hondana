@extends('layouts.app')
@section('title', '書籍の詳細')

@section('content')
<main class="l-main">
    <div class="container">
        <bookshelf-detail-component
            :public-path="{{ json_encode(asset('')) }}"
            :book="{{json_encode($book)}}">
        </bookshelf-detail-component>
    </div>
</main>
@endsection
