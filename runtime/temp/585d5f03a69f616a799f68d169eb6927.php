<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\phpStudy\admin/application/admin\view\index\welcome.html";i:1502499276;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1502091869;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1501831777;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>title</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="__SUP__/content/ui/global/bootstrap/css/bootstrap.min.css">
    <link href="__SUP__/content/ui/global/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="__SUP__/content/adminlte/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="__SUP__/content/adminlte/dist/css/skins/_all-skins.css">
    <link href="__SUP__/content/min/css/supershopui.common.min.css" rel="stylesheet" />
    <link href="__SUP__/content/plugins/bootstrap-table/bootstrap-table.css" rel="stylesheet" />
    <link rel="stylesheet" href="__ADMIN__/css/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-archon">
            <div class="panel-heading">
                <h3 class="panel-title">服务器信息
                    <span class="pull-right">
                                    <a  href="#" class="panel-minimize"><i class="icon-chevron-up"></i></a>
                                    <a  href="#"  class="panel-settings"><i class="icon-cog"></i></a>
                                    <a  href="#"  class="panel-close"><i class="icon-remove"></i></a>
                                </span>
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                    <?php if(is_array($server) || $server instanceof \think\Collection || $server instanceof \think\Paginator): $i = 0; $__LIST__ = $server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $v; ?></td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="__SUP__/content/ui/global/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="__SUP__/content/ui/global/bootstrap/js/bootstrap.min.js"></script>
<script src="__SUP__/content/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="__SUP__/content/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js"></script>
<script src="__SUP__/content/min/js/supershopui.common.js"></script>
<script src="__JS__/dialog.js"></script>
<script src="__JS__/global.js"></script>
</body>
</html>