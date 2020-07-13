
<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="utf-8">

  <title>@yield('title', 'ログイン')</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <script src="https://kit.fontawesome.com/39ab84bfc8.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:400,700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>

<body>
<div id="app">
  <header class="l-header"> 
    <div class="p-headerLogo"><img src="images/logo.png" alt="" class="p-headerLogo__img"></div>

    <div class="p-headerMenuTrigger js-toggle-sp-menu">
        <span class="p-headerMenuTrigger__border"></span>
        <span class="p-headerMenuTrigger__border"></span>
        <span class="p-headerMenuTrigger__border"></span>
    </div>

    <div class="p-headerMenu">
      <li class="p-headerMenu__list"><a href="#" class="p-menuLink">ログイン</a></li>
      <li class="p-headerMenu__list"><a href="#" class="p-menuLink">ユーザー登録</a></li>
    </div>   
  </header>

  <div class="l-bg p-form"> 
    <div class="p-formContainer">
      <p class="c-formTitle">@yield('見出し', 'ログイン')</p>
        @section('フォーム')
          <form method="post" action="{{ route('login') }}" class="c-form">
            @csrf
        @show
        
        @section('メールアドレス')
        <input type="email" name="email" class="c-form__input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        @show
        @section('パスワード')
        <input type="password" name="password" class="c-form__input @error('password') is-invalid @enderror"　required autocomplete="current-password" placeholder="{{ __('Password') }}">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror      
        @show
        @section('ログイン認証')
        <label for="c-formCheck" class="c-form__label"><input type="checkbox" name="remember" id="c-formCheck" {{ old('remember') ? 'checked' : '' }}>次回から自動でログインする</label>
        @show
      

        @yield('パスワード確認')
        @section('auth_btn')
          <input type="submit" class="c-btn c-btnRegister" value="{{ __('Login') }}">
      　@show
        @section('パスワード忘れリンク')
          @if (Route::has('password.request'))
          <p class="c-form__passlink">※パスワードを忘れた方は<a href="{{ route('password.request') }}" class="c-passLink">こちら</a></p>
          @endif
        @show
      </form>
    </div>
  </div>


  <div class="l-footer">
      <ul class="p-footerMenu">
        <li class="p-footerMenu__list">特定商取引法</li>
        <li class="p-footerMenu__list">プライバシーポリシー</li>
        <li class="p-footerMenu__list">Inspiration</li>
      </ul>
  </div>
</div>

</body>
</html>