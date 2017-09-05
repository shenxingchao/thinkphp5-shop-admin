<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"D:\phpStudy\admin/application/admin\view\admin\admin_privilege_lst.html";i:1504583288;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1504167412;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1504165666;}*/ ?>
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
<section class="content">
    <div id="toolbar" class="btn-group col-sm-12">
        <button id="btn_add" type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
        </button>
    </div>
    <table class="table table-bordered table-hover" >
        <thead>
        <tr>
            <th data-sortable="true">分组</th>
            <th data-sortable="true">菜单名</th>
            <th data-sortable="true">权限码</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($privilege_lst) || $privilege_lst instanceof \think\Collection || $privilege_lst instanceof \think\Paginator): $i = 0; $__LIST__ = $privilege_lst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $key; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_data): $mod = ($i % 2 );++$i;?>
            <tr>
                <td></td>
                <td><?php echo $sub_data['privilege_name']; ?></td>
                <td>
                    <?php if(is_array($sub_data['privilege_code']) || $sub_data['privilege_code'] instanceof \think\Collection || $sub_data['privilege_code'] instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_data['privilege_code'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$code_data): $mod = ($i % 2 );++$i;?>
                        <?php echo $code_data['controller_name']; ?>
                        <?php echo $code_data['action_name']; ?> @
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </td>
                <td> <a href="/admin/admin/admin_privilege_edit/id/<?php echo $sub_data['id']; ?>" class="btn btn-icon-only purple"><i class="fa fa-edit"></i></a>
                    <a href="/admin/admin/admin_privilege_delete/id/<?php echo $sub_data['id']; ?>" class="btn btn-icon-only red btn_delete"> <i class="fa fa-times"></i></a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="fixed-table-pagination" align="center">
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
        $('#btn_add').on('click',function () {
            window.location.href = '/admin/admin/admin_privilege_add';
        });
        $('.btn_delete').on('click',function () {
            return confirm('确定要删除吗?');
        });
    });
</script>