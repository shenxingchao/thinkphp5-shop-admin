<?php
/**
 * Created by PhpStorm.
 * User: 86431
 * Date: 2017/8/4
 * Time: 8:14
 */

namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class User extends Controller{

    /**
     * 管理员登录
     * @return mixed
     */
    public function login(){
        $request = Request::instance();
        $post = $request->param();
        if($request->isPost()){
            $validate = $this->validate(
                $post,
                [
                    'username'=>'require',
                    'password'=>'require'
                ],
                [
                    'username.require'=>'用户名不能为空',
                    'password.require'=>'密码不能为空',
                ]
            );
            if($validate !== true){
                $this->error($validate);
            }
            else{
                $where = array(
                    'username'=>$post['username'],
                    'password'=>md5($post['password']),
                );
                $res = Db::name('admin_user')->where($where)->find();
                if(!$res){
                    $this->error('账号信息不正确');
                }
                else{
                    //验证成功 进行登录
                    $update = [
                        'id'=>$res['id'],
                        'login_time'=>time(),
                        'ip'=>getIP(),
                    ];
                    Db::name('admin_user')->update($update);
                    Session::set('admin',$res);
                    adminLog('登录');
                    $this->success("登录成功",'admin/Index/index');
                }
            }
        }
        return $this->fetch();
    }


    public function logout(){
        session('admin',null);
        session('privilege_src',null);
        $this->success("退出成功",'admin/User/login');
    }
}