<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', 'inspirationController@isLogin')->name('user'); // ログインユーザー
Route::get('/ideas', 'inspirationApiController@index')->name('idea.index'); // アイディア一覧
Route::get('/ideas/{id}', 'inspirationApiController@show')->name('idea.show'); // アイディア詳細
Route::get('/buy', 'inspirationApiController@buyIdeasShow')->name('buyIdeas.show'); // 購入済みアイディア一覧

Route::post('/register', 'Auth\RegisterController@register')->name('register'); //ユーザー登録
Route::post('/login', 'Auth\LoginController@login')->name('login'); //ログイン
Route::post('/logout', 'Auth\LoginController@logout')->name('logout'); //ログアウト
Route::post('/inspiration/create', 'inspirationApiController@ideaCreate'); // アイディア登録
Route::post('/category/search', 'inspirationApiController@indexCategory'); // 各カテゴリー取得
Route::post('/review/create', 'inspirationApiController@reviewCreate'); // レビュー登録
Route::post('/mail/review', 'inspirationApiController@reviewMail'); // レビュー投稿メール送信
Route::post('/buy', 'inspirationApiController@buy'); // アイディア購入
Route::post('/mail/buy', 'inspirationApiController@store'); // 購入メール送信

Route::put('/ideas/{id}/favorite', 'inspirationApiController@favorite')->name('idea.favorite'); // お気に入り
Route::delete('/ideas/{id}/favorite', 'inspirationApiController@unfavorite'); // お気に入り解除
