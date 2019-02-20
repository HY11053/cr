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
                            <span class="block m-t-xs font-bold">David Williams</span>
                        </a>
                    </div>
                    <div class="logo-element">
                        CR+
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-random"></i> <span class="nav-label">内容生成操作</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='"/article/create"')class="active"@endif><a href="/article/create"><i class="fa fa-circle-o"></i> <span class="nav-label">品牌文档生成</span></a></li>
                        <li @if(Request::getRequestUri()=='"/templists"')class="active"@endif><a href="/templists"><i class="fa fa-circle-o"></i> <span class="nav-label"> 普通文档生成</span></a></li>
                    </ul>

                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">模板内容管理</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @foreach(\App\AdminModel\ArticleTemp::all() as $templist)
                        <li @if(Request::getRequestUri()=='/article/list/'.$templist->id)class="active"@endif><a href="/article/list/{{$templist->id}}"><i class="fa fa-circle-o"></i>{{$templist->type}}模板</a></li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-yelp"></i> <span class="nav-label">模板类型添加</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(Request::getRequestUri()=='"/addtemp"')class="active"@endif><a href="/addtemp"><i class="fa fa-circle-o"></i>添加模板分类</a></li>
                        <li @if(Request::getRequestUri()=='"/templists"')class="active"@endif><a href="/templists"><i class="fa fa-circle-o"></i>模板分类列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-joomla"></i> <span class="nav-label">品牌数据管理</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="graph_flot.html"><i class="fa fa-circle-o"></i>导入品牌数据</a></li>
                        <li><a href="graph_morris.html"><i class="fa fa-circle-o"></i>品牌数据列表</a></li>
                        <li><a href="graph_rickshaw.html"><i class="fa fa-circle-o"></i>品牌分类添加</a></li>
                        <li><a href="graph_chartjs.html"><i class="fa fa-circle-o"></i>品牌分类列表</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-cloud-upload"></i> <span class="nav-label">模板数据导入 </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>表单上传导入</a></li>
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>TXT文档导入</a></li>
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>EXCE格式导入</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-arrows-alt"></i> <span class="nav-label">标题内容管理 </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>表单上传导入</a></li>
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>TXT文档导入</a></li>
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>EXCE格式导入</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-spinner"></i> <span class="nav-label">标题类型管理 </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>表单上传导入</a></li>
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>TXT文档导入</a></li>
                        <li><a href="/article/fmimport"><i class="fa fa-circle-o"></i>EXCE格式导入</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user-circle"></i> <span class="nav-label">用户管理中心 </span><span class="label label-warning float-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mailbox.html">用户列表</a></li>
                        <li><a href="mail_detail.html">用户注册</a></li>
                    </ul>
                </li>
                <li>
                    <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">数据报表汇总</span>  </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">工作报表汇总</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="form_basic.html">Basic form</a></li>
                        <li><a href="form_advanced.html">Advanced Plugins</a></li>
                        <li><a href="form_wizard.html">Wizard</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                        <li><a href="form_autocomplete.html">Autocomplete</a></li>
                        <li><a href="form_markdown.html">Markdown</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li style="padding: 20px">
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/inspadmin/img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="float-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/inspadmin/img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="float-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/inspadmin/img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="float-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html" class="dropdown-item">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="profile.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="float-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="grid_options.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html" class="dropdown-item">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="login.html">
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
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
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
