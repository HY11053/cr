@extends('admin.admin')
@section('title')文档数据生成@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox ">
                <div class="ibox-title"><h5>文档内容 生成</h5></div>
                <div class="ibox-content ibox-heading">
                    <h3>按需勾选所需生成的模块内容</h3>
                    <small><i class="fa fa-map-marker"></i> 生成之后的数据按需根据需求重新编排</small>
                </div>
                <div class="ibox-content inspinia-timeline">
                    <div class="row">
                        {{Form::open(array('route' => 'articlecreate','files' => false,"class"=>"form-horizontal","style"=>"margin-left: 15%","autocomplete"=>"off"))}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                <input type="text" class="form-control" id="title" name="title" @if(isset($title)) value="{{$title}}" @endif placeholder="请输入要生成的品牌">
                                <button type="submit" class="btn btn-primary">重新生成文档内容</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach(\App\AdminModel\ArticleTemp::all() as $index=>$templist)
                                    <div class="checkbox checkbox-warning" style="display: inline-block">
                                        <input id="checkbox{{$templist->id}}" name="type[]" type="checkbox" value="{{$templist->type}}" @foreach($types as $type) @if($type==$templist->type) checked="checked" @endif @endforeach>
                                        <label for="checkbox{{$templist->id}}">{{$templist->type}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach(\App\AdminModel\Titlesource::all() as $titletmp)
                                    <div class="radio radio-success" style="display: inline-block">
                                        <input type="radio" name="titletype" id="radio{{$titletmp->id}}" value="{{$titletmp->id}}" @if($titletype==$titletmp->id) checked @endif >
                                        <label for="radio{{$titletmp->id}}">{{$titletmp->type}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @if(isset($contents))
                        @if(!empty($titlecontent))
                            <div class="timeline-item" id="sortable-view">
                                <div class="row">
                                    <div class="col-1 date">
                                        <i class="fa fa-tag"></i>
                                    </div>
                                    <div class="col content no-top-border ui-sortable">
                                        <p class="m-b-xs"> <h3>{{str_replace('{}',$title,$titlecontent->content)}}</h3></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($contents as $content)
                            <div class="timeline-item" id="sortable-view">
                                <div class="row">
                                    <div class="col-1 date">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="col content no-top-border ui-sortable">
                                        <p class="m-b-xs"><strong>{{$title}}{{\App\AdminModel\ArticleTemp::where('id',$content->typeid)->value('type')}}</strong></p>
                                        @foreach(explode('@@',$content->content) as $newcontent)
                                            <p>{{$newcontent}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_libs')
@stop