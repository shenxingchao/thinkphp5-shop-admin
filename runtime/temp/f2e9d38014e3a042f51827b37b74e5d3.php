<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\phpStudy\admin/application/admin\view\admin\admin_log_lst.html";i:1504165878;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1504165655;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1504165666;}*/ ?>
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
    <link rel="stylesheet" href="__ADMIN__/css/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="content-header">
    <h1>
        <?php echo $control; ?>
        <small><?php echo $action; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="javascript:void(0);"><?php echo $control; ?></a></li>
        <li class="active"><?php echo $action; ?></li>
    </ol>
</section>
<style type="text/css">
    tr{height: 50px;}
</style>
<section class="content">
    <div id="toolbar" class="btn-group col-sm-12">
        <button id="btn_refresh" type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>更新日志
        </button>
    </div>
    <table class="table table-bordered table-hover" >
        <thead>
        <tr>
            <th ></th>
            <th data-sortable="true">id</th>
            <th data-sortable="true">账号名</th>
            <th data-sortable="true">操作时间</th>
            <th data-sortable="true">操作内容</th>
            <th data-sortable="true">ip</th>
            <th data-sortable="true">url</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><input type="checkbox"  attr-id="<?php echo $data['id']; ?>"></td>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo date('Y-m-d H:i:s',$data['log_time']); ?></td>
            <td><?php echo $data['log_info']; ?></td>
            <td><?php echo $data['log_ip']; ?></td>
            <td><?php echo $data['log_url']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="fixed-table-pagination" align="center">
        <?php echo $list->render(); ?>
    </div>
</section>

<script src="__SUP__/content/ui/global/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="__SUP__/content/ui/global/bootstrap/js/bootstrap.min.js"></script>
<script src="__SUP__/content/min/js/supershopui.common.js"></script>
<script src="__JS__/dialog.js"></script>
<script src="__JS__/global.js"></script>
</body>
</html>
<script type="text/javascript">
    $(function () {
        $('#btn_refresh').on('click',function () {
            window.location.href = '/admin/admin/admin_log_update';
        });
    });
</script>