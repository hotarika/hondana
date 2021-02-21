@extends('layouts.app')
@section('title', 'パスワード変更')

@section('content')
<div class="l-main">
    <div class="container">
        <div class="row justify-content-center">

            @include('components/settings-lists')

            <div class="col-md-9 col-lg-8">
                <div class="card">
                    <div class="card-header c-formAuth__cardHeader">
                        パスワード変更@if(Auth::id()===1)<br><span class="c-formAuth__noUser">（このユーザーは利用できません）</span>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="current_password"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">現在のパスワード</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="current_password" type="password"
                                        class="form-control @error('current_password') is-invalid @enderror c-formAuth__input"
                                        name="current_password"
                                        autocomplete="new-password"
                                        autofocus
                                        @if(Auth::id()===1) disabled @endif>

                                    @error('current_password')
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
                                        autocomplete="new-password"
                                        placeholder="6~20文字・半角英数字のみ"
                                        @if(Auth::id()===1) disabled @endif>

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
                                    <input id="password-confirm" type="password" class="form-control c-formAuth__input"
                                        name="password_confirmation" autocomplete="new-password"
                                        @if(Auth::id()===1) disabled @endif>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4" style="text-align:right;">
                                    <button type="submit" class="btn btn-primary c-formAuth__btn" @if(Auth::id()===1)
                                        disabled @endif>変更</button>
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
