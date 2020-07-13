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
<div id="app">
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
  <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
      <div class="alert alert-primary text-center" role="alert">
        {{ session('flash_message') }}
      </div>
    @endif
<!--ーーーーーーーーーーーーーーーーーー アイディア投稿画面表示 ーーーーーーーーーーーーーーーーーー--> 
  <p class="p-heading">@yield('ページタイトル', 'アイディア投稿')</p>
  <form method="POST" action="{{ route('inspiration.create') }}" class="p-newIdea p-postWidth">
    @csrf
    <input type="text" name="name" class="p-newIdea__title" placeholder="アイディア名">

    <select name="category_id" class="p-newIdea__category">
          <option value="1" class="p-selectCategory">マッチング</option>
          <option value="2" class="p-selectCategory">掲示板</option>
          <option value="3" class="p-selectCategory">SNS</option>
          <option value="4" class="p-selectCategory">シェアリング</option>
          <option value="5" class="p-selectCategory">ECサイト</option>
          <option value="6" class="p-selectCategory">情報発信</option>
          <option value="7" class="p-selectCategory">その他</option>
    </select>

    <div class="p-fileContainer">
      <label class="p-fileContainer__airDrop">ドラッグ＆ドロップ
        <input type="file" class="p-dropImg" name="photo1">
      </label>
      <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
    </div>

    <div class="p-fileWrap">
      <div class="p-fileContainerSub">
        <label class="p-fileContainerSub__airDrop">ドラッグ＆ドロップ
          <input type="file" class="p-dropImg" name="photo2">
        </label>
        <div class="p-fileContainerSub__msg">画像の容量は10MB以内に抑えてください。</div>
      </div>
      <div class="p-fileContainerSub">
        <label class="p-fileContainerSub__airDrop">ドラッグ＆ドロップ
          <input type="file" class="p-dropImg" name="photo3">
        </label>
        <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
      </div>
      <div class="p-fileContainerSub">
        <label class="p-fileContainerSub__airDrop">ドラッグ＆ドロップ
          <input type="file" class="p-dropImg" name="photo4">
        </label>
        <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
      </div>
      <div class="p-fileContainerSub">
        <label class="p-fileContainerSub__airDrop">ドラッグ＆ドロップ
          <input type="file" class="p-dropImg" name="photo5">
        </label>
        <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
      </div>
    </div>

    <textarea class="p-newIdea__outLine" name="outline" cols="30" rows="10" placeholder="概要"></textarea>
    <span class="p-newIdea__count">1/200</span>
    <textarea  class="p-newIdea__content" name="content" cols="30" rows="10" placeholder="内容"></textarea>
    <div class="p-newIdea__price"><input type="number" name="price" class="p-ideaPrice" placeholder="金額 (単位：円)"></div>
    @section('登録ボタン')
    <button type="submit" class="c-btnEntry c-btn">登録</button>
    @show
  </form>
</main>


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