@extends('layouts.app')
@section('title', '私の本棚')

@section('content')
<bookshelf-index-component :public-path="{{ json_encode(asset('')) }}">
</bookshelf-index-component>
@endsection
