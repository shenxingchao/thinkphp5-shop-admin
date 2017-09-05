<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"D:\phpStudy\admin/application/admin\view\admin\admin_edit.html";i:1502090113;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1504167412;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1504165666;}*/ ?>
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
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/admin/admin_edit" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">管理员账号</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" id="username" placeholder="管理员账号" value="<?php echo $admin['username']; ?>">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">设置密码</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="password" id="password" placeholder="设置密码">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="role_id" class="col-sm-2 control-label">选择角色类型</label>
            <div class="col-sm-6">
                <select name="role_id" id="role_id" class="form-control">
                    <option value="0">请选择</option>
                    <?php if(is_array($admin_role) || $admin_role instanceof \think\Collection || $admin_role instanceof \think\Paginator): $i = 0; $__LIST__ = $admin_role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $data['id']; ?>" <?php if($admin['role_id'] == $data['id']): ?>selected="selected"<?php endif; ?>><?php echo $data['role_name']; ?></option>
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
                <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
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
        $('.add_btn').on('click',function () {
            //1.提交前验证
            if($('#username').val() == ""){
                showMsg("管理员账号不能为空","username",1000);
                return false;
            }
            else if($('#role_id').val() == 0){
                showMsg("请选择角色类型","role_id",1000);
                return false;
            }
            else{
                $(this).attr('type','submit');
            }
        });
    });
</script>