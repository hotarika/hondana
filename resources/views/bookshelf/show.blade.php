@extends('layouts.app')
@section('title', '書籍の詳細')

@section('content')
<bookshelf-show-component
    :public-path="{{ json_encode(asset('')) }}"
    :book="{{$book}}">
</bookshelf-show-component>
@endsection