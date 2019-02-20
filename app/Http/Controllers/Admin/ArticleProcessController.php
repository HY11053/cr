<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Article;
use App\AdminModel\ArticleTemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleProcessController extends Controller
{
    public function ArticleLists($id)
    {
        $articles=Article::where('typeid',$id)->orderBy('id','desc')->paginate(30);
        return view('admin.articlelist',compact('articles'));
    }

    /**内容模板数据导入 FORM
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleFmImport()
    {
        $templists=ArticleTemp::all();
        return view('admin.articlefmimport',compact('templists'));
    }

    /**文档编辑视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleEdit($id)
    {
        $templists=ArticleTemp::all();
        $content=Article::findOrFail($id);
        return view('admin.article_edit',compact('templists','content'));
    }

    /**文档编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostArticleEdit(Request $request,$id)
    {
        Article::where('id',$id)->update(['typeid'=>$request->typeid,'content'=>$request->contents]);
        return redirect((action('TempProcessController@TempList')));
    }

    public function ArticleDelete($id)
    {
        Article::where('id',$id)->delete();
        return redirect((action('TempProcessController@TempList')));
    }
    /**模板数据导入处理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostArticleFmImport(Request $request)
    {
        $contents=array_filter(explode(PHP_EOL,$request->contents));
        foreach ($contents as $content) {
            if (!Article::where('content',$content)->value('id'))
            {
                Article::create(['typeid'=>$request->typeid,'content'=>$content,'editor'=>Auth::user()->name]);
            }
        }
        $templists=ArticleTemp::all();
        return view('admin.articlefmimport',compact('templists'));
    }

    /**文档生成视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleCreate()
    {
        return view('admin.articlecreate');
    }

    /**文档生成处理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostArticleCreate(Request $request)
    {
        foreach ($request->all() as $key=>$type)
        {
            //dd($request->all());
            if ($key!="title" && $key!="_token")
            {
                $contents[]=Article::where('typeid',$key)->inRandomOrder()->first();
            }
        }
        $contents=array_filter($contents);
        $title=$request->title;
        return view('admin.articlecreate',compact('title','contents'));
    }
}
