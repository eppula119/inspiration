<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// APIのURL以外のリクエストに対してはindexテンプレートを返す
// 画面遷移はフロントエンドのVueRouterが制御する
    Route::get('/{any?}', function () {
        return view('index');
    })->where('any', '.+');
// ーーーーーーーーーー認証系画面ーーーーーーーーーーーーーー

Route::get('/register1', function () {
    return view('auth/register1');
});
Route::get('/login1', function () {
    return view('auth/login1');
});
Route::get('/reminder', function () {
    return view('auth/reminder');
})->name('reminder');
Route::get('/authkey', function () {
    return view('auth/auth_key');
});
Route::get('/password/reset1', function () {
    return view('auth/passwords/reset1');
});



// ーーーーーーーーーー　ログイン必要　ーーーーーーーーー
Route::get('/inspiration/new', 'InspirationController@newFormShow')->name('inspiration.new'); //アイディア登録画面表示 
Route::get('/inspiration/{id}/edit', 'InspirationController@editFormShow')->name('inspiration.edit'); //アイディア登録画面表示 


// Route::post('/inspiration/create', 'InspirationController@ideaCreate')->name('inspiration.create'); //アイディア登録 





// ーーーーーーーーーーTOP画面ーーーーーーーーーーーーーー
Route::get('/', function () {
    return view('inspiration/index');
});
// ーーーーーーーーーーアイディア一覧画面ーーーーーーーーーーーーーー
Route::get('/ideas/show', function () {
    return view('inspiration/ideas');
});
// ーーーーーーーーーー購入済みアイディア一覧画面ーーーーーーーーーーーーーー
Route::get('/ideas/buy', function () {
    return view('inspiration/buy_ideas');
});
// ーーーーーーーーーー投稿したアイディア一覧画面ーーーーーーーーーーーーーー
Route::get('/ideas/my', function () {
    return view('inspiration/my_ideas');
});
// ーーーーーーーーーー気になるリスト一覧画面ーーーーーーーーーーーーーー
Route::get('/ideas/favorite', function () {
    return view('inspiration/favorites');
});
// ーーーーーーーーーーアイディア詳細画面ーーーーーーーーーーーーーー
Route::get('/ideas/idea', function () {
    return view('inspiration/idea');
});
// ーーーーーーーーーーアイディア投稿画面ーーーーーーーーーーーーーー
Route::get('/ideas/new', function () {
    return view('inspiration/new_idea');
});
// ーーーーーーーーーーアイディア編集画面ーーーーーーーーーーーーーー
Route::get('/ideas/edit', function () {
    return view('inspiration/edit_idea');
});
// ーーーーーーーーーープロフィール編集画面ーーーーーーーーーーーーーー
Route::get('/ideas/profile', function () {
    return view('inspiration/profile');
});
// ーーーーーーーーーーマイページ画面ーーーーーーーーーーーーーー
Route::get('/ideas/mypage', function () {
    return view('inspiration/mypage');
});
// ーーーーーーーーーーレビュー一覧画面ーーーーーーーーーーーーーー
Route::get('/ideas/reviews', function () {
    return view('inspiration/reviews');
});

// Auth::routes(['verify' => true]); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');