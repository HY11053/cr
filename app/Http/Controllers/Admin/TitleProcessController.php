<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Titlesource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TitleProcessController extends Controller
{
    /**标题分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleList()
    {
        $titlelists=Titlesource::all();
        return view('admin.titlelists',compact('titlelists'));
    }

    /**标题分类添加界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleAdd()
    {
        return view('admin.titleadd');
    }

    /**标题添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostTitleAdd(Request $request)
    {
        Titlesource::create($request->all());
        return redirect((action('TitleProcessController@TitleList')));
    }

    /**标题类型编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleEdit($id)
    {
        $title=Titlesource::findOrFail($id);
        return view('admin.title_edit',compact('title'));
    }

    /**标题类型编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostTitleEdit(Request $request,$id)
    {
        Titlesource::where('id',$id)->update(['type'=>$request->type]);
        return redirect((action('TitleProcessController@TitleList')));
    }

}
