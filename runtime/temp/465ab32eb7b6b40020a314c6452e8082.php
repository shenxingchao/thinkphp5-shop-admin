<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\phpStudy\admin/application/admin\view\goods\goods_brand_edit.html";i:1502505257;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1502091869;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1501831777;}*/ ?>
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
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/goods/goods_brand_edit" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="brand_name" class="col-sm-2 control-label">品牌名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="品牌名称" value="<?php echo $brand_info['brand_name']; ?>">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="brand_img" class="col-sm-2 control-label">品牌图片</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="brand_img" id="brand_img" onchange="change_file_name(this)">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                <button type="reset" class="col-sm-12 col-xs-12 btn btn-default">重置</button>
            </div>
            <div class="col-sm-3">
                <input type="hidden" value="<?php echo $brand_info['id']; ?>" name="id">
                <button type="button" class="col-sm-12 col-xs-12 btn btn-info add_btn">提交</button>
            </div>
        </div>
    </div>
</form>
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
        $('.add_btn').on('click',function () {
            //1.提交前验证
            if($('#brand_name').val() == ""){
                showMsg('品牌名称不能为空','brand_name',1000);
                return false;
            }
            else{
                $(this).attr('type','submit');
            }
        });
    });
</script>