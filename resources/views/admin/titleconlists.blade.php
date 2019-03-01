@extends('admin.admin')
@section('title')标题类型分类列表@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/inspadmin/css/plugins/iCheck/custom.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>模板文档分类列表 <small>数据总计：{{$titles->total()}}</small></h5>
                    <div class="mail-tools tooltip-demo m-t-md">
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" id="allcheck" checked="checked"  data-placement="top" title="全选"><i class="fa fa-check-circle"></i> 全选</button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="预览 暂时不可用"><i class="fa fa-eye"></i> </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="重点标记 暂时不可用"><i class="fa fa-exclamation"></i> </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="批量删除"><i class="fa fa-trash-o"></i> </button>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>选择</th>
                                <th>ID</th>
                                <th>模板内容 </th>
                                <th>发布者 </th>
                                <th>发布时间 </th>
                                <th>所属分类 </th>
                                <th>Completed </th>
                                <th>Task</th>
                                <th>编辑</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            @foreach($titles as $title)
                                <tr class=" tooltip-demo">
                                    <td><input type="checkbox"  class="i-checks" name="input"></td>
                                    <td>{{$title->id}}</td>
                                    <td><small data-toggle="tooltip" data-placement="top"  title="{{$title->content}}">{{str_limit($title->content,100,'...')}}</small></td>
                                    <td>{{$title->editor}}</td>
                                    <td>{{$title->created_at}}</td>
                                    <td>{{$title->arctype->type}}</td>
                                    <td><span class="pie text-center">0.52/1.561</span></td>
                                    <td>20%</td>
                                    <td><a href="/title/edit/{{$title->id}}"><button class="btn btn-xs btn-primary"><i class="fa fa-file-text-o"></i> 编辑</button></a></td>
                                    <td><a href="/title/delete/{{$title->id}}"><button class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> 删除</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <nav aria-label="...">
                        {{$titles->links()}}
                    </nav>
                </div>
            </div>
        </div>

    </div>

@stop
@section('footer_libs')
    <!-- Peity -->
    <script src="/inspadmin/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/inspadmin/js/demo/peity-demo.js"></script>
    <!-- ChartJS-->
    <script src="/inspadmin/js/plugins/chartJs/Chart.min.js"></script>
    <!-- iCheck -->
    <script src="/inspadmin/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $("#allcheck").click(function() {
                if ($(this).attr("checked")=="checked"){
                    $("input[name='input']:checkbox").each(function(){
                        $(this).attr("checked", true);
                    });
                } else {
                    $("input[name='input']:checkbox").each(function() {
                        $(this).attr("checked", false);
                    });
                }});
        });
    </script>


@stop