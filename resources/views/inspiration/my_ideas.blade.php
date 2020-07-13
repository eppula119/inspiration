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
<!--ーーーーーーーーーーーーーーーーーー 投稿アイディア一覧表示 ーーーーーーーーーーーーーーーーーー-->
  
  <p class="p-postHeading">@yield('ページタイトル', '投稿アイディア一覧')</p>
  <div class="p-postContainer">
    @for ($i = 0; $i < 3; $i++)
    <div class="p-postIdea">
      <img src="/images/meadow_card.png" alt="" class="p-postIdea__img">
      <div class="p-postIdea__text">
        <p class="p-postTitle">スッキリ目覚まし！</p><button class="c-editDelteBtn">@yield('ボタン名', '編集')</button>
        <p class="p-postPrice">10,000円</p>
        @section('カテゴリー部分')
          <span class="p-postCategory c-category">マッチング</span>
        @show
        <p class="p-postOutline">
          気温や湿度を入力し、最も目覚めの良いアラームを<br>自動で選択し快適な朝を迎えれrます。
        </p>
        <button class="p-detailBtn c-btn">詳細を見る</button>
      
      </div>
    </div>
    @endfor
    <button class="p-postMore c-btn">＋もっと見る</button>
  </div>
    

  <!--ーーーーーーーーーーーーーーーーーー ページネーション ーーーーーーーーーーーーーーーーーー-->
  <ul class="c-pagenation">
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" ><</a>
    </li>
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" >1</a>
    </li>
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" >2</a>
    </li>
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" >3</a>
    </li>
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" >4</a>
    </li>
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" >5</a>
    </li>
    <li class="c-pagenation__item">
      <a class="c-pageLink" href="#" >></a>
    </li>
  </ul>
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