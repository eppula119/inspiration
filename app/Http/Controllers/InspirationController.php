<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdea; // 画像ファイルの拡張子ルールを適用
use App\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //認証に関わる物を使う
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; //ログを取る


class InspirationController extends Controller
{
    public function __construct()
    {
      // 認証が必要
      $this->middleware('auth');
    }
    // ログイン中のユーザー情報を取得
    public function isLogin()
    {
		return Auth::user();
    }

    // アイディア登録画面表示
    public function newFormShow()
    {
        return view('inspiration.new_idea');
    }

    // アイディア登録
    public function ideaCreate(Request $request)
    { 
        
        Log::debug('バリデーション開始');
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'photo1' => 'required|string|max:255',
            'photo2' => 'string|max:255',
            'photo3' => 'string|max:255',
            'photo4' => 'string|max:255',
            'photo5' => 'string|max:255',
            'outline' => 'required|string|max:300',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'price' => 'required|integer'
        ]);

        Log::debug('バリデーションok');
        
        //モデルのアイディアインスタンス作成
        $idea = new Idea;

        //　入力データをDBへ全て保存
        $idea->fill($request->all());
        $idea->user_id = Auth::id();
        $idea->save();
        Log::debug(print_r($idea, true));

        // 登録後、フラッシュにメッセージを表示しリダイレクトする。
        return redirect()->route('inspiration.new')->with('flash_message', __('Registered.'));
    }

    // アイディア編集画面表示
    public function editFormShow($id)
    {
			  // $idが数値でない場合、アイディア登録画面へリダイレクト
        if(!ctype_digit($id)) {
        	return redirect()->route('inspiration.new')->with('flash_message', __('Invalid operation was performed.'));
        }
				
        return view('inspiration/edit_idea');
    }
}
