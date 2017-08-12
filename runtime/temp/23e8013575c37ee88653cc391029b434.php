<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\phpStudy\admin/application/admin\view\admin\admin_role_edit.html";i:1502073105;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1502091869;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1501831777;}*/ ?>
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
    #privilege_src td{
        border: 1px solid #ccc;
        line-height: 30px;
    }
    .privilege_checkbox,.privilege_span{
        vertical-align: middle;
        margin: 0 !important;
    }
    table label{
        font-weight: normal;
    }
</style>
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/admin/admin_role_edit" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="role_name" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="role_name" id="role_name" value="<?php echo $admin_role['role_name']; ?>" placeholder="角色名称">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="privilege_src" class="col-sm-2 control-label">分配权限</label>
            <!--分组显示权限checkbox-->
            <table id="privilege_src" class="col-sm-10">
                <?php if(is_array($privilege_lst) || $privilege_lst instanceof \think\Collection || $privilege_lst instanceof \think\Paginator): $i = 0; $__LIST__ = $privilege_lst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td class="col-sm-2 col-xs-2 group_name"><label><input class="privilege_checkbox" type="checkbox"><span class="privilege_span"><?php echo $key; ?></span></label> </td>
                    <td class="col-sm-10 col-xs-10 group_content">
                        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_data): $mod = ($i % 2 );++$i;?>
                            <label><input class="privilege_checkbox" type="checkbox" name="privilege_id[]" value="<?php echo $sub_data['id']; ?>" <?php if(in_array(($sub_data['id']), is_array($admin_role['privilege_id'])?$admin_role['privilege_id']:explode(',',$admin_role['privilege_id']))): ?>checked="checked"<?php endif; ?> ><span class="privilege_span"><?php echo $sub_data['privilege_name']; ?></span></label>&nbsp;&nbsp;
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                <button type="reset" class="col-sm-12 col-xs-12 btn btn-default">重置</button>
            </div>
            <div class="col-sm-3">
                <input type="hidden" name="id" value="<?php echo $admin_role['id']; ?>">
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
        /*判断一组checkbox是否全部选中 是则选中前面的标签*/
        for(var i=0;i<$('.group_name').length;i++){
            for(var j=0;j<$('.group_name').eq(i).next().find('.privilege_checkbox').length;j++){
                if($('.group_name').eq(i).next().find('.privilege_checkbox').eq(j).prop('checked')===false){
                    //若有一个不选中，则跳出
                    break;
                }
                if(j==$('.group_name').eq(i).next().find('.privilege_checkbox').length-1){
                    //全部选中，则选中组checkbox
                    $('.group_name').eq(i).find('.privilege_checkbox').prop("checked", true);
                }
            }
        }

        //改变组checkbox选中
        $('.group_name input').change(function () {
            if($(this).prop('checked')){
                $(this).parent().parent().next().find('.privilege_checkbox').prop("checked", true);
            }
            else{
                $(this).parent().parent().next().find('.privilege_checkbox').prop("checked", false);
            }
        });
        $('.add_btn').on('click',function () {
            //1.提交前验证
            if($.trim($('#role_name').val()) ==''){
                showMsg('角色名称不能为空','role_name',1000);
            }
            else{
                var flag = false;
                for(var i=0;i<$('input[name="privilege_id[]"]').length;i++){
                    if($('input[name="privilege_id[]"]').eq(i).prop('checked')){
                        flag=true;
                        break;
                    }
                }
                if(!flag)
                    showMsg('请先分配权限');
                else{
                    $(this).attr('type','submit');
                }
            }
        });
    });
</script>