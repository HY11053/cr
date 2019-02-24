@extends('admin.admin')
@section('title')标题数据导入@stop
@section('header_libs')
@stop
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <h1 class="text-center">标题数据导入</h1>
        <hr/>
        <div class="col-md-12">
            {{Form::open(array('route' => 'tifmimport','files' => false))}}
            <div class="form-group col-md-12">
                <select name="typeid" class="form-control">
                    @foreach($titlelists as $titlelist)
                        <option value="{{$titlelist->id}}">{{$titlelist->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <h3 class="timeline-header"><a href="">标题提交区域 一条一行</a></h3>
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