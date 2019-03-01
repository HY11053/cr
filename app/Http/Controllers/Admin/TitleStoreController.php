<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Titlecontent;
use App\AdminModel\Titlesource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TitleStoreController extends Controller
{
    /**标题模板数据汇总
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AllTitleLists()
    {
        $titles=Titlecontent::orderBy('id','desc')->paginate(30);
        return view('admin.titleconlists',compact('titles'));
    }

    /**标题模板数据分类汇总
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleLists($id)
    {
        $titles=Titlecontent::where('typeid',$id)->orderBy('id','desc')->paginate(30);
        return view('admin.titleconlists',compact('titles'));
    }

    /**内容模板数据导入 FORM
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleFmImport()
    {
        $titlelists=Titlesource::all();
        return view('admin.titlefmimport',compact('titlelists'));
    }

    /**文档编辑视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleEdit($id)
    {
        $titlelists=Titlesource::all();
        $content=Titlecontent::findOrFail($id);
        return view('admin.titlecontent_edit',compact('titlelists','content'));
    }

    /**文档编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostTitleEdit(Request $request,$id)
    {
        Titlecontent::where('id',$id)->update(['typeid'=>$request->typeid,'content'=>$request->contents]);
        return redirect((action('TitleStoreController@AllTitleLists')));
    }

    public function TitleDelete($id)
    {
        Titlecontent::where('id',$id)->delete();
        return redirect((action('TitleStoreController@AllTitleLists')));
    }
    /**模板数据导入处理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostTitleFmImport(Request $request)
    {
        $contents=array_filter(explode(PHP_EOL,$request->contents));
        foreach ($contents as $content) {
            if (!Titlecontent::where('content',$content)->value('id'))
            {
                Titlecontent::create(['typeid'=>$request->typeid,'content'=>$content,'editor'=>Auth::user()->name]);
            }
        }
        return redirect((action('TitleStoreController@AllTitleLists')));
    }
}
