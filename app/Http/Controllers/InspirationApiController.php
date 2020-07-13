<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //認証に関わる物を使う
use App\Mail\SampleMail;
use App\Mail\SellerMail;
use App\Mail\ReviewMail;
use Illuminate\Support\Facades\Mail;
use App\Idea;
use App\Category;
use App\Review;
use App\idea_user;
use Illuminate\Support\Facades\Log; //ログを取る

class InspirationApiController extends Controller
{
    public function __construct()
    {
      // 認証が必要
      $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // アイディア一覧取得
    {
        $ideas = Idea::with(['category', 'favorites'])->withCount('reviews')->orderBy('created_at', 'desc')->get(); // 新しい順にアイディア全て取得      
        return $ideas;
    }
    public function buyIdeasShow() // 購入済みアイディア一覧取得
    {
      $buyIdeas = [];
      $buyData = Auth::user()->idea_users()->get(); // ログインユーザーの購入データ取得

      foreach($buyData as $idea)
      {
           $buyIdeas[] = $idea->idea->id;  // 購入データーのアイディアIDのみ取得
      }
      // アイディアIDに基づくアイディア情報とカテゴリー情報を最新順に取得
      $buyData = Idea::whereIn('id', $buyIdeas)->with('category')->orderBy('created_at', 'desc')->get();

      return $buyData;
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ideaCreate(Request $request)
    {
        Log::debug('バリデーション開始');
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'photo1' => 'required|file|max:1000',
            'photo2' => 'file|max:1000',
            'photo3' => 'file|max:1000',
            'photo4' => 'file|max:1000',
            'photo5' => 'file|max:1000',
            'outline' => 'required|string|max:300',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'price' => 'required|integer'
        ]);
        Log::debug('バリデーションok');

        $idea = new idea();
        $user_id = Auth::id();
        $file_name = [];

        for($val = 1; $val <= 5; $val++){
 
          if ($request['photo'.$val]){
            // ファイルの名前をタイムスタンプに付与し、ファイル名を作成。
            $file_name[$val] = time() . '.' . $request['photo'.$val]->getClientOriginalName();
            $request['photo'.$val]->storeAs('public', $file_name[$val]);
            // プロジェクト内にファイルを保存
            $idea['photo'.$val] = '/storage/' . $file_name[$val];
          }
        }

            $idea->name = $request->name;
            $idea->outline = $request->outline;
            $idea->content = $request->content;
            $idea->category_id = $request->category_id;
            $idea->price = $request->price;
            $idea->user_id = $user_id;
            $idea->save();
            Log::debug(print_r($idea, true));
 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // アイディア詳細ページ表示
    public function show($id) 
    {
        $idea = Idea::where('id', $id)->with(['user', 'favorites', 'reviews', 'idea_users'])->withCount('reviews')->first();
        $buyData = Auth::user()->idea_users()->get(); // ログインユーザーの購入データ取得
        Log::debug($buyData);

        return ["idea" => $idea, "buyData" => $buyData] ?? abort(404);
        // return $idea ?? abort(404);
    }

    // お気に入り登録
    public function favorite($id)
    {
        $idea = Idea::where('id', $id)->with('favorites')->first();

        if (!$idea) {
            abort(404);
        }

        $idea->favorites()->detach(Auth::user()->id);
        $idea->favorites()->attach(Auth::user()->id);

        return ["idea_id" => $id];
    }

    // お気に入り解除
    public function unfavorite($id)
    {
        $idea = Idea::where('id', $id)->with('favorites')->first();

        if (!$idea) {
            abort(404);
        }

        $idea->favorites()->detach(Auth::user()->id);

        return ["idea_id" => $id];
    }

    // 各カテゴリー取得
    public function indexCategory()
    {
        $allCategory = Category::get();

        $categorys = array('category' => $allCategory);
        return $categorys;
    }

    // レビュー登録
    public function reviewCreate(Request $request)
    {
      Log::debug('バリデーション開始');
        // バリデーション
        // $request->validate([
        //     'star' => 'required|integer',
        //     'title' => 'required|string|max:30',
        //     'text' => 'required|string|'
        // ]);
        Log::debug('バリデーションok');

        $review = new review();
        $user_id = Auth::id();

        $review->user_id = $user_id;
        $review->idea_id = $request->id;
        $review->star = $request->star;
        $review->title = $request->title;
        $review->content = $request->text;
        $review->save();
        // ==================== アイディアの星評価平均値を更新 ===================
        $idea = Idea::find($request->id);
        $reviews = $idea->reviews;  // アイディアに登録された複数のレビューを取得
        $star_array = [];

        foreach($reviews as $item)
        {
          $star_array[] = $item->star;  // それぞれの星評価値のみ配列へ追加
        }

        $total = array_sum($star_array); // それぞれの星評価値の合計値
        $avg = round($total/count($star_array), 2);  // 合計値 ÷ 星評価の個数を少数第一位まで取得
        $idea->review_star = $avg;
        $idea->update();


        return $review;
        Log::debug(print_r($review, true));
    }

    // アイディア購入
    public function buy(Request $request)
    {
      Log::debug('バリデーション開始');
        // バリデーション
        // $request->validate([
        //     'star' => 'required|integer',
        //     'title' => 'required|string|max:30',
        //     'text' => 'required|string|'
        // ]);
        Log::debug('バリデーションok');
        Log::debug(print_r($request->id, true));

        $idea = Idea::where('id', $request->id)->with('users')->first();
        
        Log::debug('アイディアの中身確認');
        Log::debug(print_r($idea, true));

        if (!$idea) {
            abort(404);
        }
        Log::debug('アイディア発見');

        $idea->users()->detach(Auth::user()->id);
        $idea->users()->attach(Auth::user()->id);

        return ["idea_id" => $request->id];    
        // Log::debug(print_r($idea, true));
         Log::debug('登録完了');
    }

    // アイディア購入後メール送信
    public function store(Request $request)
    {
      Log::debug('u');
      Log::debug($request->only(['buy']));
      Log::debug($request->only(['sell']));
      $name = [];
      $text = [];
      $to = [];

      $sellTo = $request->only(['sell']);
      $buyTo = $request->only(['buy']);

      $name = ['buy' => 'ララベル太郎', 'sell' => '購入された太郎'];
      $text = ['buy' => 'これからもよろしくお願いいたします。', 'sell' => '購入されました'];
      $to = ['buy' => $sellTo, 'sell' => $buyTo];

      // // データの入った変数を渡す場合
      Mail::to($to["buy"])->send(new SampleMail($name["buy"], $text["buy"]));
      Mail::to($to["sell"])->send(new SellerMail($name["sell"], $text["sell"]));
    }

    //　レビュー投下後、メール送信
    public function reviewMail(Request $request) {
      Log::debug('u');
      Log::debug($request->buy);
      Log::debug($request->only(['sell']));
      Log::debug($request->only(['idea']));
      $name = [];
      $text = [];
      $to = [];

      // $buyEmail = $request->only(['buy']);
      $name = $request->buy;

      // $name = $request->only(['buy']);
      $text = $request->idea;
      $to = $request->only(['sell']);

      // // データの入った変数を渡す場合
      Mail::to($to)->send(new ReviewMail($name, $text));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
