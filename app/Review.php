<?php

namespace App;
use Illuminate\Support\Facades\Auth; // 認証系インスタンス
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //fillableで紐つけ
    protected $fillable = ['user_id', 'idea_id', 'star', 'title', 'content'];
}
