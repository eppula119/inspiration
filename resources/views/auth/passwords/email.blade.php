@extends('auth/login')

@section('title', 'パスワードリマインダー')

@section('見出し', 'パスワードリマインダー') 



@section('フォーム')
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif
  <form method="post" action="{{ route('password.email') }}" class="c-form">
    @csrf
@endsection

@section('パスワード')
@endsection

@section('ログイン認証')
@endsection

@section('auth_btn')
  <input type="submit" class="c-btn c-btnRegister" value="送信">
@endsection

@section('パスワード忘れリンク')
  <p class="c-form__comment">※メールアドレス宛に認証キーが届きます。</p>
@endsection