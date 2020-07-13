@extends('auth/login')

@section('title', 'パスワードリセット')

@section('見出し', 'パスワードリセット')

@section('フォーム')
  <form method="POST" action="{{ route('password.update') }}" class="c-form">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
@endsection

@section('メールアドレス')
  <input type="email" name="email" class="c-form__input @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
@endsection

@section('パスワード')
  <input type="password" name="password" class="c-form__input @error('password') is-invalid @enderror"　name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
    @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror    
@endsection

@section('ログイン認証')
@endsection

@section('パスワード確認')
  <input type="password" name="password_confirmation" class="c-form__input" required autocomplete="new-password" placeholder="{{ __('Confirm password') }}">
@endsection

@section('auth_btn')
  <input type="submit" class="c-btn c-btnRegister" value="{{ __('Reset Password') }}">
@endsection

@section('パスワード忘れリンク')
@endsection