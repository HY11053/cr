<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Brandcontainer;
use App\AdminModel\BrandType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function brandsImport()
    {
        $brandtypes=BrandType::pluck('brandtype');
        return view('admin.import_brands',compact('brandtypes'));
    }

    /**品牌数据导入处理 txt
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postBrandsImport(Request $request)
    {
        $brands=explode(PHP_EOL,trim($request->input('contents')));
        foreach ($brands as $brand)
        {
            if(!empty($brand) && empty(Brandcontainer::where('brand',$brand)->value('brand')))
            {
                Brandcontainer::create(['brand'=>$brand,'type'=>$request->input('type'),'num'=>1]);
            }else{
                Brandcontainer::where('brand',Brandcontainer::where('brand',$brand)->value('brand'))->update(['num'=>Brandcontainer::where('brand',$brand)->value('num')+1]);
            }
        }
        return redirect(action('BrandController@brandListsView'));
    }


    /**品牌视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function brandListsView(Request $request)
    {
        $arguments=$request->all();
        $brandtypes=BrandType::pluck('brandtype');
        $datas=Brandcontainer::when($request->input('type'), function ($query) use ($request) {
            return $query->where('type', $request->input('type'));
        })->when($request->input('status'), function ($query) use ($request) {
            $status=$request->input('status');
            if ($status==2)
            {
                $status=0;
            }
            return $query->where('status', $status);
        })->orderBy('num','desc')->paginate(50);
        return view('admin.brands',compact('datas','arguments','brandtypes'));
    }



    /**品牌状态操作
     * @param Request $request
     * @return string
     */
    public function Status(Request $request)
    {
        Brandcontainer::where('id',$request->id)->update(['status'=>1]);
        return '已使用';
    }

    /**删除品牌
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Delete($id)
    {
        Brandcontainer::where('id',$id)->delete();
        return redirect()->back();
    }
}
