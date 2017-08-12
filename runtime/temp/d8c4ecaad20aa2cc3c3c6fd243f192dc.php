<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"D:\phpStudy\admin/application/admin\view\goods\goods_add.html";i:1501481959;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1501481280;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1501831777;}*/ ?>
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
    <link rel="stylesheet" href="__CSS__/style.css">
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
<form class="form-horizontal col-sm-8 col-sm-offset-2" action="/admin/goods/goods_add" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="goods_name" class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="goods_name" id="goods_name" placeholder="商品名称">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="goods_price" class="col-sm-2 control-label">商品价格</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="goods_price" id="goods_price" placeholder="商品价格">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="cat_id" class="col-sm-2 control-label">选择分类</label>
            <div class="col-sm-6">
                <select name="cat_id" id="cat_id" class="form-control">
                    <?php if(is_array($cat_info) || $cat_info instanceof \think\Collection || $cat_info instanceof \think\Paginator): $i = 0; $__LIST__ = $cat_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $data['cat_id']; ?>"><?php echo str_repeat("&nbsp;",5*$data["level"]); ?><?php echo $data['cat_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="goods_img" class="col-sm-2 control-label">商品图片</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="goods_img" id="goods_img" onchange="change_file_name(this)">
            </div>
            <div class="col-sm-1 red">*</div>
        </div>
        <div class="form-group">
            <label for="goods_number" class="col-sm-2 control-label">库存</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="goods_number" id="goods_number">
            </div>
        </div>
        <div class="form-group">
            <label for="goods_detail" class="col-sm-2 control-label">商品详情</label>
            <div class="col-sm-10">
                <div class="goods_detail" id="goods_detail" name="goods_detail">
                </div>
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
<script type="text/javascript" charset="utf-8" src="__STA__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__STA__/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript">
    $(function () {
        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('goods_detail');
        $('.add_btn').on('click',function () {
            //1.提交前验证
            if($('#goods_name').val() == ""){
                alert("商品名称不能为空");
                return false;
            }
            else if($('#goods_price').val() == ""){
                alert("商品价格不能为空");
                return false;
            }
            else if(defualt_pic_name ==''){
                alert("图片未选择或格式不正确");
            }
            else{
                $(this).attr('type','submit');
            }
        });
    });


    /*判断图片是否选择*/
    var defualt_pic_name = '';
    function change_file_name(file){
        var str = file.files[0].name;
        if( checkFileExt(str)){
            defualt_pic_name = str;
        }else{
            defualt_pic_name = '';
        }
    }
    function checkFileExt(filename)
    {
        var flag = false; //状态
        var arr = ["jpg","png","gif","jpeg"];
        //取出上传文件的扩展名
        var index = filename.lastIndexOf(".");
        var ext = filename.substr(index+1);
        //循环比较
        for(var i=0;i<arr.length;i++)
        {
            if(ext == arr[i])
            {
                flag = true; //一旦找到合适的，立即退出循环
                break;
            }
        }
        //条件判断
        if(flag)
        {
            return true;
        }else
        {
            return false;
        }
    }
</script>