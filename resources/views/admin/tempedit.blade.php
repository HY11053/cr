@extends('admin.admin')
@section('title')数据汇总中心@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>内容模板类型添加</h3>
            <hr>
            <p>请添加对应模板分类名称</p>
            {{Form::model($temp,array('route' =>array( 'tempedit','id'=>$temp->id),'method' => 'put','files' => false,))}}
            <div class="form-group">
                {{Form::text('type', null, array('class' => 'form-control','id'=>'type','placeholder'=>'模板名称',"required"=>""))}}
            </div>
            <div class="form-group">
                {{Form::text('sort', null, array('class' => 'form-control','id'=>'sort','placeholder'=>'排序id',"required"=>""))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">修改模板内容</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('footer_libs')
@stop