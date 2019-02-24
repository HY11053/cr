<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Titlesource extends Model
{
    protected $guarded =['_token','_method'];
    protected function titles()
    {
        return $this->hasMany('App\AdminModel\Titlecontent','typeid');
    }
}
