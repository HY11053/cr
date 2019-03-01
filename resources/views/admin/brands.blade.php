@extends('admin.admin')
@section('title')品牌类型列表@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/inspadmin/css/plugins/iCheck/custom.css" rel="stylesheet">
@stop
@section('main_content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>品牌类型列表 <small>数据总计：{{$datas->total()}}</small></h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#ID</th>
                                <th>品牌</th>
                                <th>类型</th>
                                <th>热度</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->id}}.</td>
                                    <td>{{$data->brand}}</td>
                                    <td>{{$data->type}}</td>
                                    <td>{{$data->num}}</td>
                                    <td>
                                        @if($data->status)
                                            <button class="btn btn-xs btn-primary" style=" font-weight: normal;">已使用</button>
                                        @else
                                            <button class="btn btn-xs btn-danger" style="cursor: pointer; font-weight: normal;" id="status{{$data->id}}" onclick="statuschick('status{{$data->id}}',{{$data->id}})">未使用</button>
                                        @endif
                                    </td>
                                    <td><a href="/branddatas/del/{{$data->id}}">删除</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <nav aria-label="...">
                        {{$datas->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@stop
@section('footer_libs')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        function statuschick(element,id) {
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/brandstatus/"+id,
                //提交的数据
                data:{"id":id},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".
                success:function (response, stutas, xhr) {
                    //$(".modal-s-m"+id+" .modal-body").html(response);
                    $('#'+element).text(response);
                    $('#'+element).removeClass( "btn-danger" );
                    $('#'+element).addClass( "btn-primary" );

                }
            });
        }
    </script>
@stop