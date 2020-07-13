@extends('auth/login')

@section('title', 'ユーザー登録')

@section('見出し', 'ユーザー登録')

@section('フォーム')
  <form method="POST" action="{{ route('register') }}" class="c-form">
    @csrf
@endsection

@section('ログイン認証')
@endsection

@section('パスワード確認')
  <input type="password" name="password_confirmation" class="c-form__input @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="{{ __('Confirm password') }}">
@endsection

@section('auth_btn')
  <input type="submit" class="c-btn c-btnRegister" value="{{ __('Registration') }}">
@endsection

@section('パスワード忘れリンク')
@endsection
