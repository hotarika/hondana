@extends('layouts.app')
@section('title', '会員情報変更')

@section('content')
<div class="l-main">
    <div class="container">
        <div class="row justify-content-center">

            @include('components/settings-lists')

            <div class="col-md-9 col-lg-8">
                <div class="card">
                    <div class="card-header c-formAuth__cardHeader">会員情報変更</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('edit.profile') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right c-formAuth__label">名前</label>

                                <div class="col-md-7 col-lg-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror c-formAuth__input"
                                        name="name"
                                        autocomplete="name"
                                        autofocus
                                        placeholder="10文字以内"
                                        value="{{ old('name') ?? $user->name}}">

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
                                        name="email"
                                        autocomplete="email"
                                        value="{{ old('email') ?? $user->email  }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4" style="text-align:right;">
                                    <button type="submit" class="btn btn-primary c-formAuth__btn">変更</button>
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
