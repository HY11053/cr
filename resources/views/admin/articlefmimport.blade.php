@extends('admin.admin')
@section('title')模板数据导入--表单上传@stop
@section('header_libs')
@stop
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <h1 class="text-center">模板数据导入</h1>
        <hr/>
        <div class="col-md-12">
                {{Form::open(array('route' => 'atfmimport','files' => false))}}
                <div class="form-group col-md-12">
                    <select name="typeid" class="form-control">
                        @foreach($templists as $templist)
                            <option value="{{$templist->id}}">{{$templist->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <h3 class="timeline-header"><a href="">内容提交区域 一条一行</a></h3>
                </div>
                <div class="form-group col-md-12">
                    <textarea class="form-control" name="contents" rows="10"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">提交数据</button>
                </div>
            {!! Form::close() !!}
        </div>

    </section>
    <!-- /.content -->

@stop
@section('footer_libs')
@stop