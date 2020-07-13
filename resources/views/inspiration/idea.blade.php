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
  <div class="p-headerLogo"><img src="../images/logo.png" style="width:100px;" alt="" class="p-headerLogo__img"></div>
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
<!--ーーーーーーーーーーーーーーーーーー アイディア詳細表示 ーーーーーーーーーーーーーーーーーー-->
  
  <section id="idea">
  @yield('アイディアタイトル')
    <p class="p-ideaTitle">スッキリ目覚まし！</p>
    @section('レビューとお気に入り')
    <i class="fas fa-star p-ideaStar c-star"></i>
    <i class="fas fa-star p-ideaStar c-star"></i>
    <i class="fas fa-star p-ideaStar c-star"></i>
    <i class="fas fa-star p-ideaStar c-star"></i>
    <i class="fas fa-star p-ideaStar c-star"></i><span class="p-review">4.9</span>
    <button class="p-favorite"><i class="fas fa-heart c-heart"></i>気になる</button>
    @show
    <img src="../images/meadow_card.png" alt="" class="p-ideaImg1">
    @section('サブ画像')
    <div class="p-subImg">
      <img src="../images/meadow_card.png" alt=""  class="p-subImg__sub">
      <img src="../images/meadow_sub.png" alt=""  class="p-subImg__sub">
      <img src="../images/meadow_sub2.png" alt=""  class="p-subImg__sub">
      <img src="../images/meadow_sub3.png" alt=""  class="p-subImg__sub">
      <img src="../images/meadow_sub4.png" alt=""  class="p-subImg__sub">
    </div>
    @show
    <div class="p-ideaOutline">
      気温や湿度を入力し、最も目覚めの良いアラームを<br>自動で選択します。
    </div>

  @section('内容')
    <div class="p-ideaContent">
    ✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎<br><br>

    数ある作品の中から<br>
    ご覧いただきありがとうございます♡<br><br>

    ✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎✳︎<br><br>


    アンティークかすみ草とホワイトのかすみ草をシンプルにあしらい<br>
    大人可愛いピアスに仕上げました♡<br><br>

    本物のお花を加工して使用しております❁︎<br><br><br>


    お色味をお選び下さい❁(2ページ目参照おねがいします♥)<br>
    1.ホワイト<br>
    2.ピンク<br>
    3.パープル<br>
    4.ブルー<br>
    5.グリーン
    </div>

  @show
    
    <div class="p-ideaReview">
    @section('口コミ数')
      <div class="p-ideaReview__head">
        <span class="p-ideaMouth">口コミ（331件）</span>
        <i class="fas fa-star p-reviewStar c-star"></i>
        <i class="fas fa-star p-reviewStar c-star"></i>
        <i class="fas fa-star p-reviewStar c-star"></i>
        <i class="fas fa-star p-reviewStar c-star"></i>
        <i class="fas fa-star p-reviewStar c-star"></i><span class="p-review">4.9</span>
        <button class="p-btnPost">投稿</button>
      </div>
    @show

    @for($i = 0; $i < 2; $i++)
      <div class="p-ideaReview__main">
        <i class="fas fa-user p-reviewUser"></i>
        <span class="p-userName">名無し</span>
        <i class="fas fa-star c-star"></i>
        <i class="fas fa-star c-star"></i>
        <i class="fas fa-star c-star"></i>
        <i class="fas fa-star c-star"></i>
        <i class="fas fa-star c-star"></i>
        @yield('レビュー投稿日')
        <p class="p-reviewText">
          色々とわがままな要望をしましたが、<br>真摯に対応して下さりました。とても満足です。
        </p>
      </div>
    @endfor
     
      <button class="p-reviewMore c-btn">＋もっと見る</button>
    </div>
  </section>
<!--ーーーーーーーーーーーーーーーーーー サイドバー（値段部分）表示 ーーーーーーーーーーーーーーーーーー-->
@section('サイドバー')
  <div class="p-buyProfWrap">
    <section class="" id="buy">
        <p class="p-buyPrice">10,000円</p>
        <button class="p-buyBtn c-btn">購入</button>
    </section>
  <!--ーーーーーーーーーーーーーーーーーー サイドバー（プロフィール部分）表示 ーーーーーーーーーーーーーーーーーー-->
    <section class="" id="profile">
      <p class="p-profileTitle">プロフィール</p>
      <div class="p-profileIcon">
        <i class="fas fa-user p-profileIcon__icon c-userIcon"></i>
      </div>
      <div class="p-profileReview">
        <i class="fas fa-star p-profileReview__star c-star"></i><span>4.9(48)</span>
      </div>
      <p class="p-profileContent">
      名無し<br>
      血液型：A型<br>
      世の中を常に観察し、<br>
      何が求められているか、<br>
      これから何が流行るかを<br>
      考えるのが得意です。<br>
      </p>
    </section>
  </div>
@show
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