<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link href="/inspadmin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/inspadmin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/inspadmin/css/animate.css" rel="stylesheet">
    <link href="/inspadmin/css/style.css" rel="stylesheet">
    @yield('header_libs')
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="/inspadmin/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                    </div>
                    <div class="logo-element">
                        CR+
                    </div>
                </li>
                <li @if(Request::getRequestUri()=='/article/create')class="active"@endif><a href="/article/create"><i class="fa fa-random"></i> <span class="nav-label">内容生成操作</span>  </a></li>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">内容模板列表</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @foreach(\App\AdminModel\ArticleTemp::all() as $templist)
                        <li @if(Request::getRequestUri()=='/article/list/'.$templist->id)class="active"@endif><a href="/article/list/{{$templist->id}}"><i class="fa fa-circle-o"></i>{{$templist->type}}模板</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-yelp"></i> <span class="nav-label">内容模板管理</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='/addtemp')class="active"@endif><a href="/addtemp"><i class="fa fa-circle-o"></i>添加模板分类</a></li>
                        <li @if(Request::getRequestUri()=='/templists')class="active"@endif><a href="/templists"><i class="fa fa-circle-o"></i>模板分类列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cloud-upload"></i> <span class="nav-label">内容数据导入 </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='/article/fmimport')class="active"@endif><a href="/article/fmimport"><i class="fa fa-circle-o"></i>表单上传导入</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-joomla"></i> <span class="nav-label">品牌数据管理</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='/importbrands')class="active"@endif><a href="/importbrands"><i class="fa fa-circle-o"></i>导入品牌数据</a></li>
                        <li @if(Request::getRequestUri()=='/brandlists')class="active"@endif><a href="/brandlists"><i class="fa fa-circle-o"></i>品牌数据列表</a></li>
                        <li @if(Request::getRequestUri()=='/brandtypecreate')class="active"@endif><a href="/brandtypecreate"><i class="fa fa-circle-o"></i>品牌分类添加</a></li>
                        <li @if(Request::getRequestUri()=='/brandtypelist')class="active"@endif><a href="/brandtypelist"><i class="fa fa-circle-o"></i>品牌分类列表</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-arrows-alt"></i> <span class="nav-label">标题模板列表 </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @foreach(\App\AdminModel\Titlesource::all() as $titlelist)
                            <li @if(Request::getRequestUri()=='/title/list/'.$titlelist->id)class="active"@endif><a href="/title/list/{{$titlelist->id}}"><i class="fa fa-circle-o"></i>{{$titlelist->type}}标题</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-spinner"></i> <span class="nav-label">标题类型管理</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='/addtitle')class="active"@endif><a href="/addtitle"><i class="fa fa-circle-o"></i>标题分类添加</a></li>
                        <li @if(Request::getRequestUri()=='/titlelists')class="active"@endif><a href="/titlelists"><i class="fa fa-circle-o"></i>标题分类列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-codepen"></i> <span class="nav-label">标题数据导入</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='/title/fmimport')class="active"@endif><a href="/title/fmimport"><i class="fa fa-circle-o"></i>标题表单上传导入</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user-circle"></i> <span class="nav-label">用户管理中心 </span><span class="label label-warning float-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="#"><i class="fa fa-circle-o"></i>用户列表</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>用户注册</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/"><i class="fa fa-pie-chart"></i> <span class="nav-label">数据报表汇总</span>  </a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="搜索功能暂时不可用" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li style="padding: 20px">
                        <span class="m-r-sm text-muted welcome-message">数据内容生成管理系统</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">0</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">0</span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

        @yield('main_content')

        <div class="footer">
            <div>
                <strong>Copyright</strong> Dry Cleaning Snacks Division &copy; 2019
            </div>
        </div>
    </div>
 </div>
<!-- Mainly scripts -->
<script src="/inspadmin/js/jquery-3.1.1.min.js"></script>
<script src="/inspadmin/js/popper.min.js"></script>
<script src="/inspadmin/js/bootstrap.js"></script>
<script src="/inspadmin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/inspadmin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="/inspadmin/js/inspinia.js"></script>
<script src="/inspadmin/js/plugins/pace/pace.min.js"></script>
@yield('footer_libs')
</body>
</html>
