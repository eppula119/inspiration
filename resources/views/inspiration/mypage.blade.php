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
  <div class="c-searchForm">
    <form action="#" method="post" class="c-searchForm__form">
      <input type="text" class="c-searchInput"><i class="fas fa-search c-searchIcon"></i>
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
<!--ーーーーーーーーーーーーーーーーーー マイページ画面表示 ーーーーーーーーーーーーーーーーーー--> 
  <p class="p-myHeading p-heading">マイページ</p>
  <div class="p-profContainer"><button class="p-profContainer__btn c-btn">プロフィールを編集する</button></div>
<!--ーーーーーーーーーーーーーーーーーー 購入済みアイディア見出し（１） ーーーーーーーーーーーーーーーーーー--> 
  <p class="p-lead">購入済みアイディア</p>
  <div class="p-ideaContainer">
    @for ($i = 1; $i <= 4; $i++)
    <div class="p-buyPostCard">
      <img src="/images/meadow_card.png" alt="" class="p-buyPostCard__img">
      <div class="p-buyPostCard__wrap">
        <p class="p-ideaTitle">スッキリ目覚まし！</p>
        <span class="p-ideaCategory c-category">マッチング</span>
        <span class="p-ideaDay c-day">2020/3/15</span>
        <i class="fas fa-star p-ideaStar c-star"></i><span class="p-ideaMouth">4.9(48)</span><span class="p-ideaPrice c-price">10,000円</span>
      </div>
    </div>
    @endfor
  </div>
  <div class="p-btnContainer"><button class="p-btnAll c-btn">全件表示</button></div>
<!--ーーーーーーーーーーーーーーーーーー 気になるリスト見出し（２） ーーーーーーーーーーーーーーーーーー--> 
  <p class="p-lead">気になるリスト</p>
  @for($i = 1; $i <= 4; $i++)
  <div class="p-favReviewItem">
    <img src="/images/meadow_card.png" alt="" class="p-favReviewItem__img">
    <div class="p-favReviewItem__text">
      <span class="p-favTitle">スッキリ目覚まし！</span>
      <span class="p-favCategory c-category">シェアリング</span>
      <i class="fas fa-star p-favStar c-star"></i><span class="p-favMouth">4.9(321)</span>
      <p class="p-favPrice">10,000円</p>
      <p class="p-favOutline">
        気温や湿度を入力し、最も目覚めの良いアラームを<br>自動で選択し快適な朝を迎えれrます。
      </p>
    </div>
  </div>
  @endfor
  <div class="p-btnContainer"><button class="p-btnAll c-btn">全件表示</button></div>
<!--ーーーーーーーーーーーーーーーーーー 投稿したアイディア見出し（３） ーーーーーーーーーーーーーーーーーー-->
  <p class="p-lead">投稿したアイディア</p>
  <div class="p-ideaContainer">
    @for ($i = 1; $i <= 4; $i++)
    <div class="p-buyPostCard">
      <img src="/images/meadow_card.png" alt="" class="p-buyPostCard__img">
      <div class="p-buyPostCard__wrap">
        <p class="p-ideaTitle">スッキリ目覚まし！</p>
        <span class="p-ideaCategory c-category">マッチング</span>
        <span class="p-ideaDay c-day">2020/3/15</span>
        <i class="fas fa-star p-ideaStar c-star"></i><span class="p-ideaMouth">4.9(48)</span><span class="p-ideaPrice c-price">10,000円</span>
      </div>
    </div>
    @endfor
  </div>
  <div class="p-btnContainer"><button class="p-btnAll c-btn">全件表示</button></div>
<!--ーーーーーーーーーーーーーーーーーー 購入者からのレビュー見出し（４） ーーーーーーーーーーーーーーーーーー-->
  <p class="p-lead">購入者からのレビュー</p>
  @for($i = 1; $i <= 4; $i++)
  <div class="p-favReviewItem">
    <img src="/images/meadow_card.png" alt="" class="p-favReviewItem__img">
    <div class="p-favReviewItem__text">
      <span class="p-reviewTitle">スッキリ目覚まし！</span>
      <div class="p-reviewContainer">
        <i class="fas fa-star p-reviewContainer__star c-star"></i>
        <i class="fas fa-star p-reviewContainer__star c-star"></i>
        <i class="fas fa-star p-reviewContainer__star c-star"></i>
        <i class="fas fa-star p-reviewContainer__star c-star"></i>
        <i class="fas fa-star p-reviewContainer__star c-star"></i>
      </div>
      <span class="p-reviewDay">2020/03/15</span>
      <p class="p-reviewOutline">
        気温や湿度を入力し、最も目覚めの良いアラームを<br>自動で選択し快適な朝を迎えれrます。
      </p>
    </div>
  </div>
  @endfor
  <div class="p-btnContainer"><button class="p-btnAll c-btn">全件表示</button></div>
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