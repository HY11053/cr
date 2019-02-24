@extends('admin.admin')
@section('title')标题类型修改@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>标题类型修改</h3>
            <hr>
            <p>请修改对应标题分类名称</p>
            {{Form::model($title,array('route' =>array( 'title_edit','id'=>$title->id),'method' => 'put','files' => true,))}}
            <div class="form-group">
                {{Form::text('type', null, array('class' => 'form-control','id'=>'title','placeholder'=>'标题分类',"required"=>""))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">修改标题分类</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('footer_libs')
@stop