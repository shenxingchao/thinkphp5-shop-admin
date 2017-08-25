<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"D:\phpStudy\admin/application/admin\view\admin\admin_privilege_add.html";i:1501900625;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1503449791;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1503390357;}*/ ?>
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
<style>
    .bg-primary{
        height: 40px;
        line-height: 40px;
    }
    .privilege_sub_item_1,.privilege_sub_item_2,.privilege_sub_item_3,.privilege_sub_item_4{
        padding: 4px 0;
        border-bottom: 1px solid #ececec;
    }
</style>
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/admin/admin_privilege_add" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="privilege_name" class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="privilege_name">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="controller_name" class="col-sm-2 control-label">控制器</label>
            <div class="col-sm-6">
                <select id="controller_name" class="form-control">
                    <option value="0">请选择控制器</option>
                    <?php if(is_array($controller_name) || $controller_name instanceof \think\Collection || $controller_name instanceof \think\Paginator): $i = 0; $__LIST__ = $controller_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="action_name" class="col-sm-2 control-label">操作</label>
            <div class="col-sm-6">
                <select id="action_name" class="form-control">
                    <option value="0">请选择操作</option>
                </select>
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-5">
                <button type="button" class="col-sm-12 col-xs-12 btn btn-default add_sub">添加</button>
            </div>
        </div>
        <div class="form-group privilege_sub_item">
            <div class="col-sm-12 col-xs-12">
                <div class="col-sm-3 col-xs-3 bg-primary">权限名称</div>
                <div class="col-sm-3 col-xs-3 bg-primary">控制器名</div>
                <div class="col-sm-3 col-xs-3 bg-primary">操作名</div>
                <div class="col-sm-3 col-xs-3 bg-primary">操作</div>
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
        /*改变控制器 ajax 读取操作*/
        $('#controller_name').change(function () {
            $.ajax({
                url:'/admin/admin/ajax_get_action',
                type:'post',
                dataType:'json',
                data:'controller_name='+$(this).val(),
                success:function(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        html+="<option value='"+ data[i] +"'>"+data[i]+"</option>";
                    }
                    $('#action_name').html(html);
                }
            });
        });

        $('.add_sub').on('click',function(){
            //添加前验证
            if($('#privilege_name').val()==''){
                showMsg('权限名称不能为空','privilege_name',1000);
            }
            else if($('#controller_name').val() == 0||$('#controller_name').val() == null){
                showMsg('请选择控制器','controller_name',1000);
            }
            else if($('#action_name').val() == 0||$('#action_name').val() == null){
                showMsg('请选择操作','action_name',1000);
            }
            else{
                //ajax获取权限资源是否存在，减少重复添加，速度快
                $.ajax({
                    url:'/admin/admin/privilege_exist',
                    type:'post',
                    dataType:'json',
                    data:"controller_name="+$('#controller_name').val()+"&action_name="+$('#action_name').val(),
                    success:function (data) {
                        if(data.code == 0){
                            showMsg(data.msg,'privilege_name',1000);
                            return false;
                        }
                        //循环判断权限是否存在 若存在则提示错误
                        for(var i=0;i<$('input[name="privilege_name[]"]').length;i++){
                            if($('#privilege_name').val()==$('input[name="privilege_name[]"]').eq(i).val()
                                &&$('#controller_name').val()==$('input[name="controller_name[]"]').eq(i).val()
                                &&$('#action_name').val()==$('input[name="action_name[]"]').eq(i).val()){ //三者同时成立
                                showMsg("已存在请勿重复添加");
                                return false;
                            }
                        }
                        var html = '<div class="col-sm-12 col-xs-12">' +
                            '<div class="col-sm-3 col-xs-3 privilege_sub_item_1">'+ $('#privilege_name').val() +'</div>'+
                            '<div class="col-sm-3 col-xs-3 privilege_sub_item_2">'+ $('#controller_name').val() +'</div>'+
                            '<div class="col-sm-3 col-xs-3 privilege_sub_item_3">'+ $('#action_name').val() +'</div>'+
                            '<div class="col-sm-3 col-xs-3 privilege_sub_item_4"><i class="fa fa-times btn_delete red"></i></div>'+
                            '<input type="hidden" name="privilege_name[]" value="'+ $('#privilege_name').val() +'">'+
                            '<input type="hidden" name="controller_name[]" value="'+ $('#controller_name').val() +'">'+
                            '<input type="hidden" name="action_name[]" value="'+ $('#action_name').val() +'">'+
                            '</div>';

                        $('.privilege_sub_item').append(html);
                    }
                });
            }
        });

        $('.add_btn').on('click',function () {
            //1.提交前验证
            if($('input[name="privilege_name[]"]').length > 0)
                $(this).attr('type','submit');
            else
                showMsg("请先添加权限");
        });
        
        $('body').on('click','.btn_delete',function () {
            $(this).parent().parent().remove();
        });
    });
</script>