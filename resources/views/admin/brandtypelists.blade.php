@extends('admin.admin')
@section('title')品牌类型列表@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
@stop
@section('main_content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>品牌类型列表</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>分类名称 </th>
                                <th>添加时间 </th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            @foreach($brandtypelists as $brandtypelist)
                                <tr class=" tooltip-demo">
                                    <td>{{$brandtypelist->id}}</td>
                                    <td><small data-toggle="tooltip" data-placement="top"  title="{{$brandtypelist->brandtype}}">{{$brandtypelist->brandtype}}</small></td>
                                    <td>{{$brandtypelist->created_at}}</td>
                                    <td><a href="/brandtype/edit/{{$brandtypelist->id}}"><button class="btn btn-xs btn-primary"><i class="fa fa-file-text-o"></i> 编辑</button></a> <a href="/brandtype/delete/{{$brandtypelist->id}}"><button class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> 删除</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <nav aria-label="...">

                    </nav>
                </div>
            </div>
        </div>

    </div>

@stop
@section('footer_libs')
@stop