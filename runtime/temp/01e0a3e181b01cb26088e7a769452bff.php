<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\phpStudy\admin/application/admin\view\goods\goods_cat_lst.html";i:1500083604;s:59:"D:\phpStudy\admin/application/admin\view\public\header.html";i:1503449791;s:57:"D:\phpStudy\admin/application/admin\view\public\menu.html";i:1499759447;s:59:"D:\phpStudy\admin/application/admin\view\public\footer.html";i:1503390357;}*/ ?>
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
<link href="__SUP__/content/plugins/jstree/dist/themes/default/style.min.css?713" rel="stylesheet" />
<style type="text/css">
    #tree{
        font-size: 18px;
    }
</style>
<section class="content">
    <div id="toolbar" class="btn-group col-sm-12">
        <button id="btn_add" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
        </button>
        <button id="btn_edit" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
        </button>
        <button id="btn_delete" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
        </button>
    </div>
    <div id="tree" class="col-sm-12">
        <ul><!--输出4级-->
            <?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <li cat-name="<?php echo $data['cat_name']; ?>" parent-id="<?php echo $data['parent_id']; ?>" cat-id="<?php echo $data['cat_id']; ?>" ><?php echo $data['cat_name']; if(isset($data['sub_cat'])){ ?>
                        <ul>
                            <?php if(is_array($data['sub_cat']) || $data['sub_cat'] instanceof \think\Collection || $data['sub_cat'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['sub_cat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$datas): $mod = ($i % 2 );++$i;?>
                                <li cat-name="<?php echo $datas['cat_name']; ?>" parent-id="<?php echo $datas['parent_id']; ?>" cat-id="<?php echo $datas['cat_id']; ?>"><?php echo $datas['cat_name']; if(isset($datas['sub_cat'])){ ?>
                                            <ul>
                                                <?php if(is_array($datas['sub_cat']) || $datas['sub_cat'] instanceof \think\Collection || $datas['sub_cat'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datas['sub_cat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$datass): $mod = ($i % 2 );++$i;?>
                                                    <li cat-name="<?php echo $datass['cat_name']; ?>" parent-id="<?php echo $datass['parent_id']; ?>" cat-id="<?php echo $datass['cat_id']; ?>"><?php echo $datass['cat_name']; if(isset($datass['sub_cat'])){ ?>
                                                        <ul>
                                                            <?php if(is_array($datass['sub_cat']) || $datass['sub_cat'] instanceof \think\Collection || $datass['sub_cat'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datass['sub_cat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$datasss): $mod = ($i % 2 );++$i;?>
                                                            <li cat-name="<?php echo $datasss['cat_name']; ?>" parent-id="<?php echo $datasss['parent_id']; ?>" cat-id="<?php echo $datasss['cat_id']; ?>"><?php echo $datasss['cat_name']; ?></li>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                    <?php } ?>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
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
<script src="__SUP__/content/plugins/jstree/dist/jstree.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#tree').jstree({
        "core": {
            "themes": {
                "responsive": false
            }
        },
        "types": {
            "default": {
                "icon": "fa fa-folder icon-state-warning icon-lg"
            },
        },
        "plugins": ["types"]
    });
    $('#btn_add').on('click',function () {
        var d = dialog({
            title: '添加分类',
            content: '<form class="form-horizontal" action="/admin/goods/goods_cat_add" method="post">' +
                        '<div class="form-group">' +
                            '<label for="cat_name" class="col-sm-4 control-label">分类名</label>' +
                                '<div class="col-sm-8">' +
                                    '<input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="分类名">' +
                                '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                            '<label for="parent_id" class="col-sm-4 control-label">上级分类</label>' +
                            '<div class="col-sm-8" >' +
                                '<select name="parent_id"  id="parent_id" class="form-control">' +
                                    '<option value="0">顶级分类</option>' +
            '<?php if(is_array($cat_info) || $cat_info instanceof \think\Collection || $cat_info instanceof \think\Paginator): $i = 0; $__LIST__ = $cat_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo $data['cat_id']; ?>"><?php echo str_repeat("&nbsp;",5*$data["level"]); ?><?php echo $data['cat_name']; ?></option><?php endforeach; endif; else: echo "" ;endif; ?>' +
                                '</select>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm-8 col-sm-push-4">' +
                            '<button type="button" class="btn btn-primary add_btn">添加分类</button>' +
                        '</div>' +
                    '</form>'
        });
        d.show();
    });
    $('body').on('click','.add_btn',function () {
        //添加分类验证
        if($('#cat_name').val() == ""){
            alert("分类名不能为空");
            return false;
        }
        else{
            $(this).attr('type','submit');
        }
    });
    $('#btn_edit').on('click',function () {
        if($('.jstree-clicked').length){
            var cat_name = $('.jstree-clicked').parent('li').attr('cat-name');
            var parent_id = $('.jstree-clicked').parent('li').attr('parent-id');
            var cat_id = $('.jstree-clicked').parent('li').attr('cat-id');

            var html = '<form class="form-horizontal" action="/admin/goods/goods_cat_edit" method="post">' +
                            '<div class="form-group">' +
                                '<label for="cat_name" class="col-sm-4 control-label">分类名</label>' +
                                '<div class="col-sm-8">' +
                                    '<input type="text" class="form-control" value="'+ cat_name +'" name="cat_name" id="cat_name" placeholder="分类名">' +
                                '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                                '<label for="parent_id" class="col-sm-4 control-label">上级分类</label>' +
                                '<div class="col-sm-8" >' +
                                    '<select name="parent_id"  id="parent_id" class="form-control">' +
                                        '<option value="0">顶级分类</option>' +
                                        '<?php if(is_array($cat_info) || $cat_info instanceof \think\Collection || $cat_info instanceof \think\Paginator): $i = 0; $__LIST__ = $cat_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo $data['cat_id']; ?>"  ';
                if(parseInt(parent_id) == parseInt('<?php echo $data['cat_id']; ?>')){
                    html+=' selected="selected"';
                }
                html+=' ><?php echo str_repeat("&nbsp;",5*$data["level"]); ?><?php echo $data['cat_name']; ?></option><?php endforeach; endif; else: echo "" ;endif; ?>' +
                                    '</select>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-sm-8 col-sm-push-4">' +
                                '<input  type="hidden" value="'+ cat_id +'" name="cat_id">' +
                                '<button type="button" class="btn btn-primary edit_btn">确认修改</button>' +
                            '</div>' +
                        '</form>';
            var d = dialog({
                title: '修改分类',
                content: html,
            });
            d.show();
        }
    });
    $('body').on('click','.edit_btn',function () {
        //编辑分类验证
        if($('#cat_name').val() == ""){
            alert("分类名不能为空");
            return false;
        }
        else{
            $(this).attr('type','submit');
        }
    });
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