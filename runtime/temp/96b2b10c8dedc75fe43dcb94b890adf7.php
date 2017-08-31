<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\phpStudy\admin/application/admin\view\goods\goods_cat_edit.html";i:1504159046;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1504167331;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1504165666;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>title</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--<link rel="stylesheet" href="__SUP__/content/ui/global/bootstrap/css/bootstrap.min.css">-->
    <link href="https://cdn.bootcss.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
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
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/goods/goods_cat_edit" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="cat_name" class="col-sm-2 control-label">分类名</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="分类名" value="<?php echo $cat_info['cat_name']; ?>">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="parent_id" class="col-sm-2 control-label">上级分类</label>
            <div class="col-sm-6">
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="0">顶级分类</option>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <option  <?php if($cat_info['parent_id'] == $data['cat_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $data['cat_id']; ?>"><?php echo str_repeat("&nbsp;",5*$data["level"]); ?><?php echo $data['cat_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                <button type="reset" class="col-sm-12 col-xs-12 btn btn-default">重置</button>
            </div>
            <div class="col-sm-3">
                <input type="hidden" name="id" value="<?php echo $cat_info['cat_id']; ?>">
                <button type="button" class="col-sm-12 col-xs-12 btn btn-info edit_btn">提交</button>
            </div>
        </div>
    </div>
</form>
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
        $('.edit_btn').on('click',function () {
            //1.提交前验证
            if($('#cat_name').val() == ""){
                showMsg('分类名称不能为空','cat_name',1000);
                return false;
            }
            else{
                $(this).attr('type','submit');
            }
        });
    });
</script>