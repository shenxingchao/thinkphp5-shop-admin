<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\phpStudy\admin/application/admin\view\goods\goods_spec_edit.html";i:1505278808;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1504167412;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1504165666;}*/ ?>
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
    .value_list{
        margin-top: 10px;
    }
</style>
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/goods/goods_spec_edit" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="spec_name" class="col-sm-2 control-label">规格名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="spec_name" id="spec_name" placeholder="规格名称" value="<?php echo $spec_info['spec_name']; ?>">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="type_id" class="col-sm-2 control-label">选择类型</label>
            <div class="col-sm-6">
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">请选择</option>
                    <?php if(is_array($type_info) || $type_info instanceof \think\Collection || $type_info instanceof \think\Paginator): $i = 0; $__LIST__ = $type_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $data['id']; ?>" <?php if($data['id'] == $spec_info['type_id']): ?>selected="selected"<?php endif; ?>><?php echo $data['type_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">添加规格项</label>
            <div class="col-sm-6">
                <button type="button" class="add_value btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
                <div class="value_list">
                    <?php if(is_array($spec_item) || $spec_item instanceof \think\Collection || $spec_item instanceof \think\Paginator): $i = 0; $__LIST__ = $spec_item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <p class="col-sm-10 col-xs-10"><input class="form-control" type="text" name="item[]" value="<?php echo $data['spec_item']; ?>"></p>
                    <p class="col-sm-2 col-xs-2"><button class="delete_value btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button></p>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                <button type="reset" class="col-sm-12 col-xs-12 btn btn-default">重置</button>
            </div>
            <div class="col-sm-3">
                <input type="hidden" name="id" value="<?php echo $spec_info['id']; ?>">
                <button type="button" class="col-sm-12 col-xs-12 btn btn-info add_btn">提交</button>
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
        $('.add_value').on('click',function () {
            var list_item = '<p class="col-sm-10 col-xs-10"><input class="form-control" type="text" name="item[]"></p>' +
                '<p class="col-sm-2 col-xs-2"><button class="delete_value btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button></p>';
            $('.value_list').append(list_item);
        });
        $('body').on('click','.delete_value',function () {
            $(this).parent().prev().remove();
            $(this).parent().remove();
        });

        $('.add_btn').on('click',function () {
            //1.提交前验证
            if($('#spec_name').val() == ""){
                showMsg('规格名称不能为空','spec_name',1000);
                return false;
            }
            else if($('#type_id').val() == ""){
                showMsg('请选择类型','type_id',1000);
                return false;
            }
            else{
                //规格值为空
                var is_null = true;
                for(var i=0;i<$('input[name="item[]"]').length;i++){
                    if( $('input[name="item[]"]').eq(i).val()!=""){
                        is_null = false;
                        break;
                    }
                }
                if(is_null){
                    showMsg('请设置至少一个规格项','',1000);
                    return false;
                }
                $(this).attr('type','submit');
            }
        });
    });
</script>