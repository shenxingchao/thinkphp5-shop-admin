<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\phpStudy\admin/application/admin\view\user\login.html";i:1501831810;}*/ ?>
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
    <link rel="stylesheet" href="__CSS__/style.css">
    <style type="text/css">
        section{
            padding-bottom: 10px;/*解决阴影被挡住的问题*/
        }
        body{
            background: -webkit-linear-gradient(45deg,#182647, #1C3759,#265C80, #3792bf); /* Safari 5.1 - 6.0 */
            background: -o-linear-gradient(45deg,#182647, #1C3759,#265C80, #3792bf); /* Opera 11.1 - 12.0 */
            background: -moz-linear-gradient(45deg,#182647, #1C3759,#265C80, #3792bf); /* Firefox 3.6 - 15 */
            background: linear-gradient(45deg,#182647, #1C3759,#265C80, #3792bf); /* 标准的语法 */
        }
        form{
            margin-top: 100px;
            background: rgba(50, 83, 101, 0.2);
            padding: 60px 0;
            box-shadow: 2px 2px 10px #204051;
        }
        .form-group,.login_title,.username,.password,.login_btn{
            height: 45px;
            line-height: 45px;
        }
        .username input,.password input,.login_btn input{
            height: 45px;
            line-height: 45px;
        }
        .login_title{
            color: #fefefe;
            font-size: 1.6em;
            font-weight: bold;
        }
        .login_btn input{
            line-height: 31px;
        }
        .input-group{
            padding-left: 15px !important;
            padding-right: 15px !important;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="col-sm-12 col-xs-12">
        <form action="" method="post" class="col-sm-4 col-xs-12 col-sm-offset-4">
            <div class="form-group form-title">
                <div class="col-sm-12 col-xs-12 text-center login_title">
                    管理员登录
                </div>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <div class="col-sm-12 col-xs-12 username input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="username" id="username" placeholder="用户名 admin">
                </div>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <div class="col-sm-12 col-xs-12 password input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="password"  placeholder="密码 111111">
                </div>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <div class="col-sm-12 col-xs-12 login_btn">
                    <input type="button" class="form-control btn-info btn" value="登录">
                </div>
            </div>
        </form>
</section>

<script src="__SUP__/content/ui/global/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="__SUP__/content/ui/global/bootstrap/js/bootstrap.min.js"></script>
<script src="__JS__/dialog.js"></script>
<script src="__JS__/global.js"></script>
<script type="text/javascript">
    $(function () {
       //验证用户名密码
        $('.login_btn input').click(function () {
            var username = $.trim($('#username').val());
            var password = $.trim($('#password').val());
            if(username == ''){
                showMsg('用户名不能为空','username',1000);
                return false;
            }
            else if(password==''){
                showMsg('密码不能为空','password',1000)
                return false;
            }
            else{
                $(this).attr('type','submit');
            }
        });
    });
</script>
</body>
</html>