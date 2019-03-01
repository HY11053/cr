<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function Index()
    {
        $users=User::all();
        $articles=Article::latest()->take(15)->get();
        return view('admin.index',compact('users','articles'));
    }
}
