@extends('admin.admin')
@section('title')标题数据修改@stop
@section('header_libs')
@stop
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <h1 class="text-center">标题数据修改</h1>
        <hr/>
        <div class="col-md-12">
            {{Form::model($titlelists,array('route' =>array('titlecon_edit','id'=>$content->id) ,'method' => 'put','files' => false))}}
            <div class="form-group col-md-12">
                <select name="typeid" class="form-control">
                    @foreach($titlelists as $titlelist)
                        <option value="{{$titlelist->id}}">{{$titlelist->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <textarea class="form-control" name="contents" rows=3">{{$content->content}}</textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">修改数据提交</button>
            </div>
            {!! Form::close() !!}
        </div>

    </section>
    <!-- /.content -->

@stop
@section('footer_libs')
@stop