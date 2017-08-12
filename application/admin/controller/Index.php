<?php
/**
 * Created by PhpStorm.
 * User: 86431
 * Date: 2017/7/11
 * Time: 12:38
 */
namespace app\admin\controller;

use think\Config;
use think\Db;

class Index extends Base
{
    public function index(){
        return $this->fetch('index');
    }

    /*ajax获取菜单*/
    public function menu(){
        //读取菜单文件
        Config::load(APP_PATH.'/admin/conf/privilege.php');
        $menu = Config::get('privilege');
        //权限判断 显示菜单 接着做
        $privilege_src = session('privilege_src');
        $allow_menu = [];
        foreach ($privilege_src as $key=>$value){
            $con_act = strtolower('/admin/'.$value['controller_name']."/".$value['action_name']);
            array_push($allow_menu,$con_act);
        }
        foreach ($menu as $key=>$value){
            foreach ($value['children'] as $k=>$v){
                if(!in_array($v['url'],$allow_menu)){
                    unset($menu[$key]['children'][$k]);
                }
            }
            if(empty($menu[$key]['children'])){
                unset($menu[$key]);
            }
            else{
                $menu[$key]['children'] = array_values($menu[$key]['children']);
            }
        }
        $menu = array_values($menu);
        return $menu;
    }

    /**
     * @return mixed sup文档
     */
    public function sup(){
        return $this->fetch('sup');
    }

    /**
     * 欢迎页
     * @return mixed
     */
    public function welcome(){
        return $this->fetch('welcome');
    }
}