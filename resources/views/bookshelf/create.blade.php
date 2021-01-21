@extends('layouts.app')
@section('title', '本棚に登録')

@section('content')
<register-books-component
    :public-path="{{ json_encode(asset('')) }}"
    :my-shelf="{{ json_encode($myShelf) }}"></register-books-component>
@endsection
