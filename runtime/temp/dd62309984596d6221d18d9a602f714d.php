<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"D:\phpStudy\admin/application/admin\view\goods\goods_lst.html";i:1501487183;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1503389726;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1503389681;}*/ ?>
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
    <link rel="stylesheet" href="__CSS__/sweetalert.css">
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
        <button id="btn_add" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
        </button>
    </div>
    <div class="table-scrollable">
        <table class="table-striped table-hover" data-toggle="table" >
            <thead>
            <tr>
                <th></th>
                <th data-sortable="true">商品编号</th>
                <th data-sortable="true">缩略图</th>
                <th data-sortable="true">商品名称</th>
                <th data-sortable="true">价格</th>
                <th data-sortable="true">库存</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox"  attr-id="<?php echo $data['goods_id']; ?>"></td>
                <td><?php echo $data['goods_id']; ?></td>
            <td><img src="<?php echo $data['goods_thumb_img']; ?>" alt="<?php echo $data['goods_name']; ?>" title="<?php echo $data['goods_name']; ?>" width="50"  height="50"></td>
                <td><?php echo $data['goods_name']; ?></td>
                <td><?php echo $data['goods_price']; ?></td>
                <td><?php echo $data['goods_number']; ?></td>
                <td>
                    <a href="/admin/goods/goods_edit/goods_id/<?php echo $data['goods_id']; ?>" class="btn btn-icon-only purple"><i class="fa fa-edit"></i></a>
                    <a href="/admin/goods/goods_delete/goods_id/<?php echo $data['goods_id']; ?>" class="btn btn-icon-only red btn_delete"> <i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="fixed-table-pagination" align="center">
            <?php echo $list->render(); ?>
        </div>
    </div>
</section>

<script src="__SUP__/content/ui/global/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="__SUP__/content/ui/global/bootstrap/js/bootstrap.min.js"></script>
<script src="__SUP__/content/plugins/bootstrap-table/bootstrap-table.js"></script>
<script src="__SUP__/content/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.js"></script>
<script src="__SUP__/content/min/js/supershopui.common.js"></script>
<script src="__JS__/dialog.js"></script>
<script src="__JS__/sweetalert.min.js"></script>
<script src="__JS__/global.js"></script>
</body>
</html>
<script type="text/javascript">
    $(function () {
        $('#btn_add').on('click',function () {
           window.location.href = '/admin/goods/goods_add';
        });
        $('.btn_delete').on('click',function () {
           return confirm('确定要删除吗?');
        });
    });
</script>