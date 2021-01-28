@extends('layouts.app')
@section('title', '会員登録')

@section('content')
<main class="l-main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header c-formAuth__cardHeader">会員登録</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">名前</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror c-formAuth__input"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">メールアドレス</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror c-formAuth__input"
                                        name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">パスワード</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror c-formAuth__input"
                                        name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">パスワード再入力</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="password-confirm c-formAuth__input" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 col-lg-6 offset-md-4 c-formAuth__btnWrap">
                                    <button type="submit" class="btn btn-primary c-formAuth__btn">
                                        登録する
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
