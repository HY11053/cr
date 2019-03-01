@extends('admin.admin')
@section('title')品牌分类添加@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>品牌分类添加</h3>
            <hr>
            <p>请添加对应品牌分类名称</p>
            {{Form::open(array('route' => 'addbrandtype','files' => false))}}
            <div class="form-group">
                {{Form::text('brandtype', null, array('class' => 'form-control','id'=>'title','placeholder'=>'品牌分类',"required"=>""))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">添加品牌分类</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('footer_libs')
@stop