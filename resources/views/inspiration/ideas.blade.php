<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="utf-8">

  <title>アイディア一覧</title>
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
  <div class="p-headerLogo"><img src="./images/logo.png" style="width:100px;" alt="" class="p-headerLogo__img"></div>
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
          <li class="p-menuList__item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="p-logout">{{ __('Logout') }}</button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>   
</header>

<main class="l-main">

  <section id="ideas">
  @section('絞り込みバー')
    <div class="p-category">
      <ul class="p-category__items">
        <li class="p-categoryItem">カテゴリー</li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">マッチング</a></li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">掲示板</a></li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">SNS</a></li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">シェアリング</a></li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">ECサイト</a></li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">情報配信</a></li>
        <li class="p-categoryItem"><a href="#" class="p-categoryLink">その他</a></li>
      </ul>
    </div>

    <div class="p-refine">
      <form method="post" action="#" class="p-refineForm">
        <select name="価格" class="p-refineForm__select">
          <option value="1" class="p-selectItem">価格の高い順</option>
          <option value="2" class="p-selectItem">価格の安い順</option>
        </select>
        <select name="投稿日" class="p-refineForm__select">
          <option value="1" class="p-selectItem">新しい順</option>
          <option value="2" class="p-selectItem">古い順</option>
        </select>
        <input type="submit" class="p-searchBtn" placeholder="検索">
      </form>
    </div>
  @show
<!--ーーーーーーーーーーーーーーーーーー アイデア複数表示 ーーーーーーーーーーーーーーーーーー-->
    <div class="p-ideas">
    @for($i = 0; $i < 9; $i++)
      <div class="p-idea">
        <img src="./images/meadow_card.png" alt="" class="p-idea__img">
        
        <div class="p-itemCover">
          <p class="p-itemCover__outline">
            気温や湿度を入力し、最も目覚めの良いアラームを自動で選択し…
          </p>
          <a href="#" class="p-itemCover__link">詳細を見る<i class="fas fa-search-plus p-itemCover__icon"></i></a>
        </div>
          
        <div class="p-idea__wrap">
          <p class="p-ideaTitle">スッキリ目覚まし！</p>
          <span class="p-ideaCategory c-category">マッチング</span><span class="p-ideaDay c-day">2020/3/15</span><br>
          <i class="fas fa-star p-ideaStar c-star"></i><span class="p-ideaMouth">4.9(48)</span><span class="p-ideaPrice c-price">10,000円</span>
        </div>
      </div>
    @endfor

    </div>

<!--ーーーーーーーーーーーーーーーーーー ページネーション ーーーーーーーーーーーーーーーーーー-->
  <ul class="c-pagenation p-ideasPage">
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

  </section>
  
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