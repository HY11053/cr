<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded =['_token','_method'];
    public function arctype()
    {
        return $this->belongsTo('App\AdminModel\ArticleTemp','typeid');
    }
}
