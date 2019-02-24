@extends('admin.admin')
@section('title')标题分类添加@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>标题类型添加</h3>
            <hr>
            <p>请添加对应标题分类名称</p>
            {{Form::open(array('route' => 'addtitle','files' => false))}}
            <div class="form-group">
                {{Form::text('type', null, array('class' => 'form-control','id'=>'title','placeholder'=>'标题类型',"required"=>""))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">添加标题内容</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('footer_libs')
@stop