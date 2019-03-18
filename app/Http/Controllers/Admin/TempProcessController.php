<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleTemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TempProcessController extends Controller
{
    /**模板分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TempList()
    {
        $templists=ArticleTemp::orderBy('sort','desc')->get();
        return view('admin.templists',compact('templists'));
    }

    /**模板分类添加界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TempAdd()
    {
        return view('admin.tempadd');
    }

    /**模板添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostTempAdd(Request $request)
    {
        ArticleTemp::create($request->all());
        return redirect((action('TempProcessController@TempList')));
    }

    /**模板类型编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TempEdit($id)
    {
        $temp=ArticleTemp::findOrFail($id);
        return view('admin.tempedit',compact('temp'));
    }

    public function PostTempEdit(Request $request,$id)
    {
        ArticleTemp::where('id',$id)->update(['type'=>$request->type,'sort'=>$request->sort]);
        return redirect((action('TempProcessController@TempList')));
    }
}
