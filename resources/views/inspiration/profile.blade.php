<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="utf-8">

  <title>アイディア詳細</title>
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
<header class="l-header"> 
  <div class="p-headerLogo"><img src="/images/logo.png" style="width:100px;" alt="" class="p-headerLogo__img"></div>
  <div class="p-searchForm">
    <form action="#" method="post" class="p-searchForm__form">
      <input type="text" class="p-searchInput"><i class="fas fa-search p-searchIcon"></i>
    </form>
  </div>
  <div class="p-headerMenu">
    <ul>
      <li class="p-headerMenu__list">
        <i class="fas fa-user p-userIcon"></i>
        <ul class="p-menuList">
          <li class="p-menuList__item">マイページ</li>
          <li class="p-menuList__item">アイディ投稿</li>
          <li class="p-menuList__item">気になるリスト</li>
          <li class="p-menuList__item">ログアウト</li>
        </ul>
      </li>
    </ul>
  </div>   
</header>

<main class="l-main">
<!--ーーーーーーーーーーーーーーーーーー プロフィール編集画面表示 ーーーーーーーーーーーーーーーーーー--> 
  <p class="p-profHeading p-heading">プロフィール編集</p>
  <form method="post" action="" class="p-profile p-postWidth">
    <input type="text" class="p-profile__name" placeholder="名前">
    <div class="p-profileImgContainer">
      <label class="p-profileImgContainer__airDrop"><i class="fas fa-user p-userIcon"></i>ドラッグ＆ドロップ
        <input type="file" class="p-profileImg" value="ユーザー画像" name="user_img">
      </label>
      <div class="p-profileImgContainer__msg">画像の容量は10MB以内に抑えてください。</div>
    </div>
    <textarea class="p-profile__content" name="#" cols="30" rows="10" value="自己紹介"></textarea>
    <span class="p-profile__count">1/200</span>
    <input type="email" class="p-profile__email" placeholder="メールアドレス">

    <span class="p-profile__dialog">※パスワード変更の場合</span>
    <input type="password" class="p-profile__nowPass" placeholder="現在のパスワード">
    <input type="password" class="p-profile__newPass" placeholder="新しいパスワード">
    <input type="password" class="p-profile__rePass" placeholder="パスワード（確認用）">

    <button class="c-btnEntry c-btn">変更</button>
  
  </form>
</main>


<div class="l-footer">
    <ul class="p-footerMenu">
      <li class="p-footerMenu__list">特定商取引法</li>
      <li class="p-footerMenu__list">プライバシーポリシー</li>
      <li class="p-footerMenu__list">Inspiration</li>
    </ul>
</div>

</body>
</html>