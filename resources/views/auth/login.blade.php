@extends('layouts.app')
@section('title', 'ログイン')

@section('content')
<main class="l-main">
    <div class="container">
        <div class="row justify-content-center p-login">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-header c-formAuth__cardHeader">ログイン</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label -mail">メールアドレス</label>

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

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label -pass">パスワード</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror c-formAuth__input"
                                        name="password"
                                        autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4 p-login__rememberWrap">
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label c-formAuth__label -remember" for="remember">
                                            自動でログイン
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2 c-formAuth__btnWrap">
                                    <button type="submit" class="btn btn-primary c-formAuth__btn">
                                        ログイン
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (Route::has('password.request'))
                <div class="p-login__passRequestWrap">
                    <a class="btn btn-link p-login__passRequest" href="{{ route('password.request') }}">
                        パスワードを忘れた方はこちら
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
