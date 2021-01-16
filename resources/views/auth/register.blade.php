@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
<!--名前入力-->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">氏名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
<!--e-mail入力-->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Ｅメール</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
<!--パスワード入力-->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
<!--パスワード確認入力-->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

<!--誕生日入力-->
                        <div class="form-group row">
                            <label for="birth" class="col-md-4 col-form-label text-md-right">生年月日</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control" name="birth">
                            </div>
                        </div>
                        
<!--郵便番号入力-->
                        <div class="form-group row">
                            <label for="postal" class="col-md-4 col-form-label text-md-right">郵便番号</label>

                            <div class="col-md-6">
                                <input id="postal" type="tel" class="form-control" name="postal" autocomplete="postal-code">
                            </div>
                        </div>
                        
<!--住所入力-->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" autocomplete="address">
                            </div>
                        </div>
                        
<!--電話番号入力-->
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control" name="tel" autocomplete="tel">
                            </div>
                        </div>
                        
<!--権限入力-->
                        <div class="form-group row">
                            <label for="auth_id" class="col-md-4 col-form-label text-md-right">登録区分</label>

                            <div class="col-md-6">
                                <input id="auth_id" type="radio" name="auth_id" value="1">利用者
                                <input id="auth_id" type="radio" name="auth_id" value="2">管理者
                            </div>
                        </div>

<!--送信ボタン-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
