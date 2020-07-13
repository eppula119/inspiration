<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class idea_user extends Model
{
    //テーブル名複数形ではない為、設定
    protected $table = 'idea_user';
    //fillableで紐つけ
    protected $fillable = ['user_id','idea_id','created_at'];

    //usersテーブルと紐付ける   (１対多)
    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
    
}
