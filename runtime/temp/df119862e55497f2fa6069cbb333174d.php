<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\phpStudy\admin/application/admin\view\index\index.html";i:1503729126;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>主页</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="__SUP__/content/ui/global/bootstrap/css/bootstrap.min.css">
    <link href="__SUP__/content/ui/global/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="__CSS__/iconfont/iconfont.css" rel="stylesheet" />
    <link rel="stylesheet" href="__SUP__/content/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="__SUP__/content/adminlte/dist/css/skins/_all-skins.css">
    <link href="__SUP__/content/min/css/supershopui.common.min.css" rel="stylesheet" />
    <style type="text/css">
        html {
            overflow: hidden;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <span class="logo-lg"><b>后台管理系统</b></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">切换导航</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="__ADMIN__/images/girl2.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo \think\Session::get('admin.username'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="__ADMIN__/images/girl2.png" class="img-circle" alt="User Image">
                                <p style="margin: 0;">
                                    <?php echo \think\Session::get('admin.username'); ?>
                                    <small>注册时间<?php echo date('Y-m-d',\think\Session::get('admin.add_time')); ?></small>
                                    <small>上次登录时间<?php echo date('Y-m-d',\think\Session::get('admin.login_time')); ?></small>
                                    <small>上次登录ip<?php echo \think\Session::get('admin.ip'); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="/admin/User/logout" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
            </ul>
        </section>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"  id="content-wrapper">
        <div class="content-tabs">
            <button class="roll-nav roll-left tabLeft" onclick="scrollTabLeft()">
                <i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs menuTabs tab-ui-menu" id="tab-menu">
                <div class="page-tabs-content" style="margin-left: 0px;">
                </div>
            </nav>
            <button class="roll-nav roll-right tabRight" onclick="scrollTabRight()">
                <i class="fa fa-forward" style="margin-left: 3px;"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown tabClose" data-toggle="dropdown">
                    页签操作<i class="fa fa-caret-down" style="padding-left: 3px;"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 128px;">
                    <li><a class="tabReload" href="javascript:refreshTab();">刷新当前</a></li>
                    <li><a class="tabCloseCurrent" href="javascript:closeCurrentTab();">关闭当前</a></li>
                    <li><a class="tabCloseAll" href="javascript:closeOtherTabs(true);">全部关闭</a></li>
                    <li><a class="tabCloseOther" href="javascript:closeOtherTabs();">除此之外全部关闭</a></li>
                </ul>
            </div>
            <button class="roll-nav roll-right fullscreen" ><i class="fa fa-arrows-alt"></i></button>
        </div>
        <div class="content-iframe " style="background-color: #ffffff; ">
            <div class="tab-content " id="tab-content">
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            864318466@qq.com
        </div>
        版权所有 &copy;shenxingchao
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <!-- /.control-sidebar-menu -->
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">状态面板设置</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.3 -->
<script src="__SUP__/content/ui/global/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="__SUP__/content/ui/global/bootstrap/js/bootstrap.min.js"></script>
<script src="__SUP__/content/min/js/supershopui.common.js?555"></script>
<script type="text/javascript">
    $(function() {
        addTabs(({ id: '10008', title: '欢迎页', close: false, url: '/admin/index/welcome' }));
        App.fixIframeCotent();
        $.ajax({ //获取菜单
            url:'/admin/index/menu',
            type:'post',
            dataType:'json',
            success:function (data) {
                var menus = [{ id: "99999", text: "我的工作台", isHeader: true }];
                for(var i=0;i<data.length;i++){
                    var menu = {};
                    menu.id=data[i].id;
                    menu.text=data[i].text;
                    menu.icon=data[i].icon;
                    menu.children = [];
                    for(var j=0;j<data[i].children.length;j++){
                        var submenu = {};
                        submenu.id = data[i].children[j].id;
                        submenu.text = data[i].children[j].text;
                        submenu.url = data[i].children[j].url;
                        submenu.targetType = data[i].children[j].targetType;
                        submenu.icon = data[i].children[j].icon;
                        menu.children.push(submenu);
                    }
                    menus.push(menu);
                }
                $('.sidebar-menu').sidebarMenu({ data: menus, param: { strUser: 'admin' } });
            }
        });
    });
</script>
</body>
</html>
