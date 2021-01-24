@extends('layouts.app')
@section('title', '読書グラフ')

@section('content')
<books-graph-component
    :public-path="{{ json_encode(asset('')) }}"></books-graph-component>
@endsection
