<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\phpStudy\admin/application/admin\view\goods\goods_cat_lst.html";i:1504083218;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1503728480;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1503390357;}*/ ?>
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
<style type="text/css">
    #tree{
        font-size: 18px;
    }
    .cat_hide{
        display: none;
    }
</style>
<section class="content">
    <div id="toolbar" class="btn-group col-sm-12">
        <button id="btn_add" type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
        </button>
    </div>
    <div class="table-scrollable">
        <table class="table-hover" data-toggle="table" >
            <thead>
            <tr>
                <th></th>
                <th data-sortable="true">id</th>
                <th data-sortable="true">分类名</th>
                <th data-sortable="true">parent_id</th>
                <th data-sortable="true">是否显示</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
            <tr class="parent_<?php echo $data['parent_id']; if($data['level'] > 0): ?> cat_hide<?php endif; ?>">
                <td><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button></td>
                <td><?php echo $data['cat_id']; ?></td>
                <td><?php echo $data['cat_name']; ?></td>
                <td><?php echo $data['parent_id']; ?></td>
                <td>---<?php echo $data['level']; ?></td>
                <td>
                    <a href="/admin/goods/goods_cat_edit/id/<?php echo $data['cat_id']; ?>" class="btn btn-icon-only purple"><i class="fa fa-edit"></i></a>
                    <a href="/admin/goods/goods_cat_delete/id/<?php echo $data['cat_id']; ?>" class="btn btn-icon-only red btn_delete"> <i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
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
<script type="text/javascript">
$(function () {

    $('#btn_delete').on('click',function () {
        if($('.jstree-clicked').length){
            if(confirm('确定要删除吗')){
                var cat_id = $('.jstree-clicked').parent('li').attr('cat-id');
                window.location.href ='/admin/goods/goods_cat_delete/cat_id/'+cat_id;
            }
        }
    });
});
</script>