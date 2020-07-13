<?php

namespace App;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // 認証系インスタンス
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    //データを取得時、Carbonクラスのデータに置き換え
    protected $dates = ['created_at'];

    // jsonに含めるアクセサ
    protected $appends = [
      'favorited_by_user',
    ];

    //fillableで紐つけ
    protected $fillable = ['name','photo1','photo2','photo3','photo4','photo5','outline','content','category_id','price','created_at','user_id'];
    
    // 1ページあたりの表示アイディア数
    // protected $perPage = 2;

    //categoriesテーブルと紐付ける   
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //ideasテーブルと紐付ける   (多対１)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //usersテーブルと紐付ける   (多対多)
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    // ideaに結びつくuserを複数取得
    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }

    // ideaに結びつくuserを複数取得
    public function idea_users()
    {
        return $this->belongsToMany('App\User', 'idea_user')->withTimestamps();
    }

    // アイディアに投稿されたレビューを複数取得
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    // 
    public function getFavoritedByUserAttribute()
    {
        if (Auth::guest()) {
            return false;
        }

        return $this->favorites->contains(Auth::user());
    }

    // 作成日のフォーマットを変更し取得
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
