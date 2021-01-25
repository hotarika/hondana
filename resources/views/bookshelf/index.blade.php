@extends('layouts.app')
@section('title', '私の本棚')

@section('content')
<bookshelf-mybooks-component :public-path="{{ json_encode(asset('')) }}">
</bookshelf-mybooks-component>
@endsection
