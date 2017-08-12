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
        $server = [
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            '主机名'=>$_SERVER['SERVER_NAME'],
            'WEB服务端口'=>$_SERVER['SERVER_PORT'],
            '网站文档目录'=>$_SERVER["DOCUMENT_ROOT"],
            '浏览器信息'=>substr($_SERVER['HTTP_USER_AGENT'], 0, 40),
            '通信协议'=>$_SERVER['SERVER_PROTOCOL'],
            'ThinkPHP版本'=>THINK_VERSION,
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '用户的IP地址'=>$_SERVER['REMOTE_ADDR'],
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
        ];
        $this->assign('server',$server);
        return $this->fetch('welcome');
    }
}