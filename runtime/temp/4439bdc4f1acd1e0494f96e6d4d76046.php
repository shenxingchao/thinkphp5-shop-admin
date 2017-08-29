<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\phpStudy\admin/application/admin\view\goods\goods_attr_add.html";i:1503997085;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1503728480;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1503390357;}*/ ?>
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
    .input_type,.input_type_span{
        vertical-align: middle;
        margin: 0 !important;
    }
</style>
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/goods/goods_attr_add" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="attr_name" class="col-sm-2 control-label">属性名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="attr_name" id="attr_name" placeholder="属性名称">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="type_id" class="col-sm-2 control-label">选择类型</label>
            <div class="col-sm-6">
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">请选择</option>
                    <?php if(is_array($type_info) || $type_info instanceof \think\Collection || $type_info instanceof \think\Paginator): $i = 0; $__LIST__ = $type_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $data['id']; ?>"><?php echo $data['type_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">选择属性值录入方式</label>
            <div class="col-sm-6">
                <label class="control-label"><input class="input_type" type="radio" name="input_type" value="1"><span class="input_type_span">从添加的值中选择</span></label>&nbsp;&nbsp;
                <label class="control-label"><input class="input_type" type="radio" name="input_type" value="2"><span class="input_type_span">从文本框手动输入</span></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                <button type="reset" class="col-sm-12 col-xs-12 btn btn-default">重置</button>
            </div>
            <div class="col-sm-3">
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
            if($('#attr_name').val() == ""){
                showMsg('属性名称不能为空','attr_name',1000);
                return false;
            }
            else{
                $(this).attr('type','submit');
            }
        });
    });
</script>