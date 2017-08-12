<?php
/**
 * Created by PhpStorm.
 * User: 86431
 * Date: 2017/8/4
 * Time: 12:24
 */

namespace app\admin\controller;
use think\Db;
use think\Request;

class Admin extends Base{
    public function admin_lst(){
        $admin = Db::name('admin_user u')->join('admin_role r','u.role_id = r.id','left')->field('u.*,r.role_name')->select();
        $this->assign('admin',$admin);
        return $this->fetch();
    }

    /**
     * 添加管理员
     * @return mixed
     */
    public function admin_add(){
        $request = Request::instance();
        if($request->isPost()){
            $post = $request->param();
            $where = [
                'username'=>trim($post['username']),
            ];
            $find = Db::name('admin_user')->where($where)->find();
            if($find)
                $this->error("管理员账号已注册");
            $insert = [
                'username'=>trim($post['username']),
                'password'=>md5($post['password']),
                'add_time'=>time(),
                'role_id'=>intval($post['role_id']),
            ];
            $res = Db::name('admin_user')->insert($insert);
            if(!$res)
                $this->error("添加失败");
            $this->success("添加成功",'/admin/admin/admin_lst');
        }
        //获取角色列表
        $admin_role = Db::name('admin_role')->select();
        if(!$admin_role)
            $this->error("请先添加角色");
        $this->assign('admin_role',$admin_role);
        return $this->fetch();
    }


    /**
     * 管理员编辑
     * @return mixed
     */
    public function admin_edit(){
        $request = Request::instance();
        $id = $request->param('id');
        if($request->isPost()){
            $post = $request->param();
            $update = [
                'id'=>intval($post['id']),
                'username'=>trim($post['username']),
                'role_id'=>intval($post['role_id']),
            ];
            if($post['password'] !=''){
                $update['password'] = md5($post['password']);
            }
            $res = Db::name('admin_user')->update($update);
            if(!$res)
                $this->error("保存失败");
            $this->success("保存成功",'/admin/admin/admin_lst');
        }
        $admin = Db::name('admin_user')->where(['id'=>$id])->find();
        $this->assign('admin',$admin);

        //获取角色列表
        $admin_role = Db::name('admin_role')->select();
        if(!$admin_role)
            $this->error("请先添加角色");
        $this->assign('admin_role',$admin_role);
        return $this->fetch();
    }

    /*
     * 删除管理员
     */
    public function admin_delete(){
        $request = Request::instance();
        if ($request->param('id')){
            $where = [
                'id'=>intval($request->param('id')),
            ];
            $res = Db::name('admin_user')->where($where)->delete();
            if($res){
                $this->success('删除成功', '/admin/admin/admin_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('管理员不存在');
        }
    }

    /**
     * 角色列表
     * @return mixed
     */
    public function admin_role_lst(){
        $admin_role = Db::name('admin_role')->select();
        foreach ($admin_role as $key=>$value){
            $admin_role[$key]['privilege_names'] = Db::name('privilege_src')->where(['id'=>['in',$value['privilege_id']]])->select();
        }
        $this->assign('admin_role',$admin_role);
        return $this->fetch();
    }

    /**
     * 添加角色
     * @return mixed
     */
    public function admin_role_add(){
        $request = Request::instance();
        if($request->isPost()){
            $post = $request->param();
            $where = [
                'role_name'=>trim($post['role_name']),
            ];
            $find = Db::name('admin_role')->where($where)->find();
            if($find)
                $this->error("角色已存在");
            $insert = [
                'role_name'=>trim($post['role_name']),
                'privilege_id'=>implode(',',$post['privilege_id']),
            ];
            $res = Db::name('admin_role')->insert($insert);
            if(!$res)
                $this->error("添加失败");
            $this->success("添加成功",'/admin/admin/admin_role_lst');
        }
        //获取所有权限资源 分组输出
        $privilege_lst = Db::name('privilege_src')->select();
        if(empty($privilege_lst))
            $this->error('请先添加权限资源');
        //按控制器分组输出
        $privilege_lst_new = [];
        foreach ($privilege_lst as $key=>$value){
            if(!array_key_exists($value['controller_name'],$privilege_lst_new))
                $privilege_lst_new[$value['controller_name']] = [];
            foreach ($privilege_lst_new as $k=>$val){
                if($value['controller_name'] == $k){
                    array_push($privilege_lst_new[$k],$value);
                    break;
                }
            }
        }
        $this->assign('privilege_lst',$privilege_lst_new);
        return $this->fetch();
    }

    /**
     * 角色编辑
     * @return mixed
     */
    public function admin_role_edit(){
        $request = Request::instance();
        $id = $request->param('id');
        if($request->isPost()){
            $post = $request->param();
            $update = [
                'id'=>$post['id'],
                'role_name'=>trim($post['role_name']),
                'privilege_id'=>implode(',',$post['privilege_id']),
            ];
            $res = Db::name('admin_role')->update($update);
            if(!$res)
                $this->error("保存失败");
            $this->success("保存成功",'/admin/admin/admin_role_lst');
        }
        $admin_role = Db::name('admin_role')->where(['id'=>$id])->find();
        $this->assign('admin_role',$admin_role);

        //获取所有权限资源 分组输出
        $privilege_lst = Db::name('privilege_src')->select();
        if(empty($privilege_lst))
            $this->error('请先添加权限资源');
        //按控制器分组输出
        $privilege_lst_new = [];
        foreach ($privilege_lst as $key=>$value){
            if(!array_key_exists($value['controller_name'],$privilege_lst_new))
                $privilege_lst_new[$value['controller_name']] = [];
            foreach ($privilege_lst_new as $k=>$val){
                if($value['controller_name'] == $k){
                    array_push($privilege_lst_new[$k],$value);
                    break;
                }
            }
        }
        $this->assign('privilege_lst',$privilege_lst_new);
        return $this->fetch();
    }

    /**
     * 删除角色
     */
    public function admin_role_delete(){
        $request = Request::instance();
        if ($request->param('id')){
            /*查看管理员是否有此角色，有则提示先删除管理员*/
            $admin = Db::name('admin_user')->select();
            foreach ($admin as $key=>$value){
                if($request->param('id') == $value['role_id']){
                    $this->error("已有管理员设置此角色，不能删除，请先删除管理员");
                    break;
                }
            }
            $where = [
                'id'=>intval($request->param('id')),
            ];
            $res = Db::name('admin_role')->where($where)->delete();
            if($res){
                $this->success('删除成功', '/admin/admin/admin_role_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('角色不存在');
        }
    }

    /**
     * 权限列表
     * @return mixed
     */
    public function admin_privilege_lst(){
        //读取所有权限资源
        $privilege_lst = Db::name('privilege_src')->select();
        //按控制器分组输出
        $privilege_lst_new = [];
        foreach ($privilege_lst as $key=>$value){
            if(!array_key_exists($value['controller_name'],$privilege_lst_new))
                $privilege_lst_new[$value['controller_name']] = [];
            foreach ($privilege_lst_new as $k=>$val){
                if($value['controller_name'] == $k){
                    array_push($privilege_lst_new[$k],$value);
                    break;
                }
            }
        }
        $this->assign('privilege_lst',$privilege_lst_new);
        return  $this->fetch();
    }

    /**
     * 添加权限资源
     * @return mixed
     */
    public function admin_privilege_add(){
        $request = Request::instance();
        if($request->isPost()){
            $post = $request->param();
            foreach ($post['privilege_name'] as $key=>$value){
                $insert = array(
                    'privilege_name'=>$value,
                    'controller_name'=>$post['controller_name'][$key],
                    'action_name'=>$post['action_name'][$key]
                );
                $where = array(
                    'controller_name'=>$post['controller_name'][$key],
                    'action_name'=>$post['action_name'][$key]
                );
                $find = Db::name('privilege_src')->where($where)->find();
                if($find)
                  continue;
                Db::name('privilege_src')->insert($insert);
            }
            $this->success("提交成功",'/admin/admin/admin_privilege_lst');
        }
        //读取所有控制器
        $controllerPath = APP_PATH.'admin/controller';
        $controller_name = array();
        $dirRes   = opendir($controllerPath);
        while($file = readdir($dirRes)) {
            if(!in_array($file,array('.','..')))
            {
                $controller_name[] = basename($file,'.php');
            }
        }
        $this->assign('controller_name',$controller_name);
        return $this->fetch();
    }

    /**
     * 获取控制器里的所有操作
     * @return array
     */
    public function ajax_get_action(){
        $request = Request::instance();
        $controller_name = $request->param('controller_name');
        $action = get_class_methods("app\admin\controller\\".$controller_name);//获取类名下的所有方法
        $base_action = get_class_methods('app\admin\controller\Base');
        $action  = array_diff($action,$base_action);//比较剔除继承的方法
        return $action;
    }

    /**
     * 权限名称编辑
     * @return mixed
     */
    public function admin_privilege_edit(){
        $request = Request::instance();
        $id = $request->param('id');
        if($request->isPost()){
            $update = [
                'id'=>$id,
                'privilege_name'=>$request->param('privilege_name'),
            ];
            $res = Db::name('privilege_src')->update($update);
            if(!$res)
                $this->error("保存失败");
            $this->success("保存成功",'/admin/admin/admin_privilege_lst');
        }

        $privilege = Db::name('privilege_src')->where(['id'=>$id])->find();
        $this->assign('privilege',$privilege);
        return $this->fetch();
    }

    /**
     * 删除权限资源
     */
    public function admin_privilege_delete(){
        $request = Request::instance();
        if ($request->param('id')){
            /*查看是否有角色拥有此权限资源，有则提示先删除角色*/
            $admin_role = Db::name('admin_role')->select();
            foreach ($admin_role as $key=>$value){
                $privilege_ids = explode(',',$value['privilege_id']);
                if(in_array($request->param('id') ,$privilege_ids)){
                    $this->error("已有角色拥有此权限，不能删除，请先删除角色");
                    break;
                }
            }
            $where = [
                'id'=>intval($request->param('id')),
            ];
            $res = Db::name('privilege_src')->where($where)->delete();
            if($res){
                $this->success('删除成功', '/admin/admin/admin_privilege_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('权限资源不存在');
        }
    }

    /**
     * 判断权限资源是否添加
     */
    public function privilege_exist(){
        $request = Request::instance();
        $post = $request->param();
        $where = [
            'controller_name'=>$post['controller_name'],
            'action_name'=>$post['action_name']
        ];
        $res = Db::name('privilege_src')->where($where)->find();
        if($res)
            return ['code'=>0,'msg'=>'权限资源已添加'];
        else
            return ['code'=>1,'msg'=>''];
    }
}