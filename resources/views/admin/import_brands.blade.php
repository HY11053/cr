@extends('admin.admin')
@section('title')品牌数据导入@stop
@section('header_libs')
@stop
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <h1 class="text-center">品牌数据导入</h1>
        <hr/>
        <div class="col-md-12">
            {{Form::open(array('route' => 'importbd','files' => false))}}
            <div class="form-group col-md-12">
                <select name="type" class="form-control">
                    @foreach($brandtypes as $index=>$brandtype)
                        <option value="{{$brandtype}}">{{$brandtype}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <h3 class="timeline-header"><a href="">内容提交区域 一条一行</a></h3>
            </div>
            <div class="form-group col-md-12">
                <textarea class="form-control" name="contents" rows="30"></textarea>
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