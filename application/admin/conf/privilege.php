<?php
/**
 * Created by PhpStorm.
 * User: 86431
 * Date: 2017/8/4
 * Time: 13:13
 */
//菜单 ---权限

return [
    'privilege'=>[
        [
            'id'=>'10000',
            'text'=>'系统',
            'icon'=>'<i class="iconfont">&#xe630;</i>',
            'children'=>[
                [
                    'id'=>'100001',
                    'text'=>'设置',
                    'url'=>'/admin/system/setting',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe62e;</i>'
                ],
            ],
        ],
        [
            'id'=>'10001',
            'text'=>'商品',
            'icon'=>'<i class="iconfont">&#xe701;</i>',
            'children'=>[
                [
                    'id'=>'100011',
                    'text'=>'商品分类',
                    'url'=>'/admin/goods/goods_cat_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe635;</i>'
                ],
                [
                    'id'=>'100012',
                    'text'=>'商品列表',
                    'url'=>'/admin/goods/goods_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe656;</i>'
                ],
                [
                    'id'=>'100013',
                    'text'=>'品牌列表',
                    'url'=>'/admin/goods/goods_brand_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe636;</i>'
                ],
                [
                    'id'=>'100014',
                    'text'=>'类型列表',
                    'url'=>'/admin/goods/goods_type_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe690;</i>'
                ],
                [
                    'id'=>'100015',
                    'text'=>'属性列表',
                    'url'=>'/admin/goods/goods_attr_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe605;</i>'
                ],

            ],
        ],
        [
            'id'=>'10002',
            'text'=>'管理员',
            'icon'=>'<i class="iconfont">&#xe702;</i>',
            'children'=>[
                [
                    'id'=>'100021',
                    'text'=>'管理员列表',
                    'url'=>'/admin/admin/admin_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe703;</i>'
                ],
                [
                    'id'=>'100022',
                    'text'=>'角色管理',
                    'url'=>'/admin/admin/admin_role_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe647;</i>'
                ],
                [
                    'id'=>'100023',
                    'text'=>'权限管理',
                    'url'=>'/admin/admin/admin_privilege_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe62f;</i>'
                ],
                [
                    'id'=>'100024',
                    'text'=>'管理员日志',
                    'url'=>'/admin/admin/admin_log_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe633;</i>'
                ],
                 [
                    'id'=>'100025',
                    'text'=>'权限分组',
                    'url'=>'/admin/admin/admin_privilege_group_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'<i class="iconfont">&#xe646;</i>'
                ],

            ],
        ],
        [
            'id'=>'19999',
            'text'=>'UI',
            'icon'=>'<i class="iconfont">&#xe634;</i>',
            'children'=>[
                [
                    'id'=>'199991',
                    'text'=>'super-ui',
                    'url'=>'/admin/index/sup',
                    'targetType'=>'blank',
                    'icon'=>'<i class="iconfont">&#xe634;</i>'
                ],
            ],
        ],
    ]
];