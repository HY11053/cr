@extends('admin.admin')
@section('title')数据汇总中心@stop
@section('header_libs')
    <link href="/inspadmin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-right">Articles</span>
                        <h5>内容总量</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{\App\AdminModel\Article::all()->count()}}</h1>
                        <small>内容模板总计</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-info float-right">Titles</span>
                        <h5>标题总量</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{\App\AdminModel\Titlecontent::all()->count()}}</h1>
                        <small>标题总计</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-right">Users</span>
                        <h5>用户数</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{\App\User::all()->count()}}</h1>
                        <small>用户总计</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-danger float-right">Brands</span>
                        <h5>品牌数</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{\App\AdminModel\Brandcontainer::all()->count()}}</h1>
                        <small>品牌总计</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div>
                        <span class="float-right text-right">
                        <small>内容模板数据导入完成: <strong>百分比</strong></small>
                            <br/>
                            总用户数: {{\App\User::all()->count()}}
                        </span>
                        <h3 class="font-bold no-margins font-normal">
                            内容数据前后两周添加对比图
                        </h3>
                        <small>Article Template Create.</small>
                    </div>

                    <div class="m-t-sm">
                        <div class="row">
                            <div class="col-md-8">
                                <div>
                                    <canvas id="lineChart" height="114"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="stat-list m-t-lg">
                                    @foreach($users as $user)
                                    <li>
                                        <h2 class="no-margins">2,346</h2>
                                        <small>{{$user->name}}</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: 48%;"></div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-md">
                        <small class="float-right">
                            <i class="fa fa-clock-o"> </i>
                            更新时间： {{\Carbon\Carbon::now()}}
                        </small>
                        <small>
                            <strong>备注信息:</strong> 图表中不包含标题模板的统计数据.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>最新内容添加信息</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th>id</th>
                                <th>内容详情 </th>
                                <th>所属分类 </th>
                                <th>信息添加人 </th>
                                <th>添加时间 </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td title="{{$article->content}}" style="cursor:pointer;">{{str_limit($article->content,80,'...')}}</td>
                                    <td>{{$article->arctype->type}}</td>
                                    <td>{{$article->editor}}</td>
                                    <td> <i class="fa fa-clock-o"> </i> {{$article->created_at}}</td>
                                    <td><span class="pie">0.52/1.561</span></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

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

    <script>
        $(document).ready(function() {
            var lineData = {
                labels: [
                    "星期{{\Carbon\Carbon::parse(date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now())-3600*24*7))->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::parse(date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now())-3600*24*6))->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::parse(date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now())-3600*24*5))->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::parse(date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now())-3600*24*4))->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::parse(date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now())-3600*24*3))->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::parse(date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now())-3600*24*2))->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::yesterday()->dayOfWeek?:'日'}}",
                    "星期{{\Carbon\Carbon::now()->dayOfWeek?:'日'}}"
                ],
                datasets: [
                    {
                        label: "本周数据",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(7))->where('created_at','<',\Carbon\Carbon::today()->subDays(6))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(6))->where('created_at','<',\Carbon\Carbon::today()->subDays(5))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(5))->where('created_at','<',\Carbon\Carbon::today()->subDays(4))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(4))->where('created_at','<',\Carbon\Carbon::today()->subDays(3))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(3))->where('created_at','<',\Carbon\Carbon::today()->subDays(2))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(2))->where('created_at','<',\Carbon\Carbon::today()->subDays(1))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::today())->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today())->count()}}
                        ]
                    },
                    {
                        label: "同比上周",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(14))->where('created_at','<',\Carbon\Carbon::today()->subDays(13))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(13))->where('created_at','<',\Carbon\Carbon::today()->subDays(12))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(12))->where('created_at','<',\Carbon\Carbon::today()->subDays(11))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(11))->where('created_at','<',\Carbon\Carbon::today()->subDays(10))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(10))->where('created_at','<',\Carbon\Carbon::today()->subDays(9))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(9))->where('created_at','<',\Carbon\Carbon::today()->subDays(8))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(8))->where('created_at','<',\Carbon\Carbon::today()->subDays(7))->count()}},
                            {{\App\AdminModel\Article::where('created_at','>',\Carbon\Carbon::today()->subDays(7))->where('created_at','<',\Carbon\Carbon::today()->subDays(6))->count()}},
                        ]
                    }
                ]
            };
            var lineOptions = {
                responsive: true
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
        });
    </script>

@stop