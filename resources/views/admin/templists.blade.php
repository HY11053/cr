@extends('admin.admin')
@section('title')模板分类列表@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>模板分类列表</h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>分类名称</th>
                            <th>创建时间</th>
                            <th>排序id</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($templists as $templist)
                            <tr>
                                <td><small>{{$templist->id}}</small></td>
                                <td><i class="fa fa-file-text"></i> {{$templist->type}}</td>
                                <td><i class="fa fa-clock-o"></i>{{$templist->created_at}}</td>
                                <td><i class="fa fa-file-sound-o"></i> {{$templist->sort}}</td>
                                <td class="text-navy"> <span class="label label-primary"><a style="color: #fff; font-weight: normal;" href="/tempedit/{{$templist->id}}">编辑</a></span> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_libs')
@stop