<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /** JSONに含める属性 */
    protected $visible = [
        'id', 'name'
    ];

    public function ideas()
    {
        return $this->hasMany('App\Idea');
    }
}
