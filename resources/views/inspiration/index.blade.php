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
    <!--ーーーーーーーーーーーーーーーーーーー ヒーローバナー ーーーーーーーーーーーーーーーーーーーーーー-->
    <section class="l-hero">
      <img src="./images/logo.png" alt="" class="p-heroImg">
      <p class="p-heroTitle">あなたのアイディアをお金に換えませんか</p>
    </section>
    <!--ーーーーーーーーーーーーーーーーーーー Service ーーーーーーーーーーーーーーーーーーーーーー-->
    <section class="l-service">
      <p class="p-serviceTitle">SERVICE</p>

      <img src="./images/top_pen.png" alt="" class="p-serviceImg1">
      <div class="p-serviceWrap1">
        <p class="p-serviceWrap1__heading">１アイディア500円から買取可能</p>
        <span class="p-serviceWrap1__text">
          何気ない日常でふと思いついたアイディア。<br>
          そのアイディアを実現可能な人へ繋ぎます。<br>
          完全オンラインで完結が可能です
        </span>
      </div>

      <div class="p-serviceWrap2">
        <p class="p-serviceWrap2__heading">どんなアイディアにも対応</p>
        <span class="p-serviceWrap2__text">
          ディズニー好き出会い系アプリが欲しい。<br>
          税金だけに特化したクイズ形式のサービスが欲しい<br>
          行列に代わりに並んでもらえるお手軽アプリが欲しい<br>
          業界、業種問わず、購入者がいればどんなアイディアも<br>
          投稿が可能です。
        </span>
      </div>
      <img src="./images/top_smartphone.png" alt="" class="p-serviceImg2">

    </section>
    
    <!--ーーーーーーーーーーーーーーーーーーー Service2 ーーーーーーーーーーーーーーーーーーーーーー-->
    <section class="l-register">
    <div class="p-registerWrap">
        <p class="p-registerWrap__heading">スマートフォン１つで簡単登録</p>
        <span class="p-registerWrap__text">
          必要なのは、メールとパスワードのみ<br>
          登録後、審査なしに即日アイディア登録<br>
          アイディアを買うことができます。
        </span>
      </div>
      <img src="./images/top_girlsphone.png"  alt="" class="p-registerImg">
    </section>
    
    
    <!--ーーーーーーーーーーーーーーーーーーー Service3 ーーーーーーーーーーーーーーーーーーーーーー-->
    <section class="l-step">
      <div class="p-stepWrap">
        <p class="p-stepWrap__heading">カテゴリーで簡単検索</p>
        <span class="p-stepWrap__text">
          シンプルで見やすいレイアウト。<br>
          難しい操作は一切必要なし。<br>
          カテゴリーや価格、登校日によって<br>
          簡単に求めているアイディアに<br>
          たどり着きます。
        </span>
      </div>
      <img src="./images/top_smartphone.png"  alt="" class="p-stepImg">
    </section>

    <!--ーーーーーーーーーーーーーーーーーーー 「今すぐ始める」ボタン ーーーーーーーーーーーーーーーーーーーーーー-->
    <section class="l-start">
      <img src="./images/logo.png"  alt="" class="p-startImg">
      <button class="p-startBtn">今すぐ始める</button>
    </section>



  <!--ーーーーーーーーーーーーーーーーーーー Footer ーーーーーーーーーーーーーーーーーーーーーー-->
<div class="l-footer">
    <ul class="p-footerMenu">
      <li class="p-footerMenu__list">特定商取引法</li>
      <li class="p-footerMenu__list">プライバシーポリシー</li>
      <li class="p-footerMenu__list">Inspiration</li>
    </ul>
</div>

</body>
</html>
