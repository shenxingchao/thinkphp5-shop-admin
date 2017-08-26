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
            'icon'=>'glyphicon glyphicon-cog',
            'children'=>[
                [
                    'id'=>'100001',
                    'text'=>'设置',
                    'url'=>'/admin/system/setting',
                    'targetType'=>'iframe-tab',
                    'icon'=>'glyphicon glyphicon-asterisk'
                ],
            ],
        ],
        [
            'id'=>'10001',
            'text'=>'商品',
            'icon'=>'fa fa-shopping-bag',
            'children'=>[
                [
                    'id'=>'100011',
                    'text'=>'商品分类',
                    'url'=>'/admin/goods/goods_cat_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa-list-ul'
                ],
                [
                    'id'=>'100012',
                    'text'=>'商品列表',
                    'url'=>'/admin/goods/goods_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa-list-alt'
                ],
                [
                    'id'=>'100013',
                    'text'=>'品牌列表',
                    'url'=>'/admin/goods/goods_brand_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa-list-alt'
                ],
            ],
        ],
        [
            'id'=>'10002',
            'text'=>'管理员',
            'icon'=>'fa fa-user',
            'children'=>[
                [
                    'id'=>'100021',
                    'text'=>'管理员列表',
                    'url'=>'/admin/admin/admin_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa-users'
                ],
                [
                    'id'=>'100022',
                    'text'=>'角色管理',
                    'url'=>'/admin/admin/admin_role_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa fa-male'
                ],
                [
                    'id'=>'100023',
                    'text'=>'权限管理',
                    'url'=>'/admin/admin/admin_privilege_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa-wrench'
                ],
                [
                    'id'=>'100024',
                    'text'=>'管理员日志',
                    'url'=>'/admin/admin/admin_log_lst',
                    'targetType'=>'iframe-tab',
                    'icon'=>'fa fa-file-text'
                ],
            ],
        ],
        [
            'id'=>'19999',
            'text'=>'UI',
            'icon'=>'fa fa-shopping-bag',
            'children'=>[
                [
                    'id'=>'199991',
                    'text'=>'super-ui',
                    'url'=>'/admin/index/sup',
                    'targetType'=>'blank',
                    'icon'=>'fa fa-list-ul'
                ],
            ],
        ],
    ]
];