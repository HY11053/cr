<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ArticleTemp extends Model
{
    protected $guarded =['_token','_method'];
    protected function articles()
    {
        return $this->hasMany('App\AdminModel\Archive','typeid');
    }
}
