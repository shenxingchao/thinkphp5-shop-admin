<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"D:\phpStudy\admin/application/admin\view\system\setting.html";i:1501487679;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1502091869;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1501831777;}*/ ?>
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
<section class="content">
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">基本设置</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">设置二</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">设置三</a></li>
    </ul>
    <div class="tab-content col-sm-12 col-xs-12">
        <!--基本设置-->
        <div class="tab-pane active" id="tab_1">
            <form action="/admin/system/setting/type/base" class="col-sm-8 form-horizontal" method="post">
                <div class="form-group">
                    <label for="home_pagesize" class="col-sm-2 control-label">分页数(商城)</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="home_pagesize" id="home_pagesize" value="<?php echo (isset($setting_info['home_pagesize']) && ($setting_info['home_pagesize'] !== '')?$setting_info['home_pagesize']:''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="admin_pagesize" class="col-sm-2 control-label">分页数(后台)</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="admin_pagesize" id="admin_pagesize" value="<?php echo (isset($setting_info['admin_pagesize']) && ($setting_info['admin_pagesize'] !== '')?$setting_info['admin_pagesize']:''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="goods_number" class="col-sm-2 control-label">库存</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="goods_number" id="goods_number" value="<?php echo (isset($setting_info['goods_number']) && ($setting_info['goods_number'] !== '')?$setting_info['goods_number']:''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-2">
                        <button class="btn btn-info col-sm-12 col-xs-12" type="submit">确认</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <form action="#">
                <button class="btn" type="submit">确认</button>
            </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <form action="#">
                <button class="btn" type="submit">确认</button>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
</section>
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