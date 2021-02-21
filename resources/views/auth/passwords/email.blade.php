@extends('layouts.app')
@section('title', 'パスワードリセット')

@section('content')
<div class="l-main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-header c-formAuth__cardHeader">リセットパスワード</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" style="font-size: 14px" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">メールアドレス</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror c-formAuth__input"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4" style="text-align: right">
                                    <button type="submit" class="btn btn-primary c-formAuth__btn">
                                        リセット
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
