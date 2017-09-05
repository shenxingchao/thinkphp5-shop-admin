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
            adminLog('添加管理员账号'.$insert['username']);
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
            adminLog('管理员编辑'.$update['username']);
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
            adminLog('添加角色'.$insert['role_name']);
            $this->success("添加成功",'/admin/admin/admin_role_lst');
        }
        //获取所有权限资源 分组输出
        $privilege_lst = Db::name('privilege_src')->select();
        if(empty($privilege_lst))
            $this->error('请先添加权限资源');
        //读取所有权限资源
        $privilege_lst = Db::name('privilege_src s')
            ->join('privilege_group g','s.group_id = g.id')
            ->field('s.*,g.group_name')
            ->select();
        //按权限分组 分组输出
        $privilege_lst_new = [];
        foreach ($privilege_lst as $key=>$value){
            if(!array_key_exists($value['group_name'],$privilege_lst_new))
                $privilege_lst_new[$value['group_name']] = [];
            foreach ($privilege_lst_new as $k=>$val){
                if($value['group_name'] == $k){
                    $value['privilege_code'] = unserialize($value['privilege_code']);
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
        //读取所有权限资源
        $privilege_lst = Db::name('privilege_src s')
            ->join('privilege_group g','s.group_id = g.id')
            ->field('s.*,g.group_name')
            ->select();
        //按权限分组 分组输出
        $privilege_lst_new = [];
        foreach ($privilege_lst as $key=>$value){
            if(!array_key_exists($value['group_name'],$privilege_lst_new))
                $privilege_lst_new[$value['group_name']] = [];
            foreach ($privilege_lst_new as $k=>$val){
                if($value['group_name'] == $k){
                    $value['privilege_code'] = unserialize($value['privilege_code']);
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
        $privilege_lst = Db::name('privilege_src s')
                    ->join('privilege_group g','s.group_id = g.id')
                    ->field('s.*,g.group_name')
                    ->select();
        //按权限分组 分组输出
        $privilege_lst_new = [];
        foreach ($privilege_lst as $key=>$value){
            if(!array_key_exists($value['group_name'],$privilege_lst_new))
                $privilege_lst_new[$value['group_name']] = [];
            foreach ($privilege_lst_new as $k=>$val){
                if($value['group_name'] == $k){
                    $value['privilege_code'] = unserialize($value['privilege_code']);
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
            $privilege_code = array();
            foreach ($post['controller_name'] as $key=>$value){
                $privilege_code[$key]['controller_name']=$post['controller_name'][$key];
                $privilege_code[$key]['action_name']=$post['action_name'][$key];
            }
            $insert = [
                'privilege_name'=>$post['privilege_name'],
                'group_id'      =>$post['group_id'],
                'privilege_code'=>serialize($privilege_code),
            ];
            Db::name('privilege_src')->insert($insert);
            $this->success("提交成功",'/admin/admin/admin_privilege_lst');
        }
        //读取权限分组
        $privilege_group = Db::name('privilege_group')->select();
        if(!$privilege_group)
            $this->error("请先添加权限分组",'/admin/admin/admin_privilege_lst');
        $this->assign('privilege_group',$privilege_group);
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
            $post = $request->param();
            $privilege_code = array();
            foreach ($post['controller_name'] as $key=>$value){
                $privilege_code[$key]['controller_name']=$post['controller_name'][$key];
                $privilege_code[$key]['action_name']=$post['action_name'][$key];
            }
            $update = [
                'id'=>$id,
                'privilege_name'=>$post['privilege_name'],
                'group_id'      =>$post['group_id'],
                'privilege_code'=>serialize($privilege_code),
            ];
            $res = Db::name('privilege_src')->update($update);
            if(!$res)
                $this->error("保存失败");
            $this->success("保存成功",'/admin/admin/admin_privilege_lst');
        }
        //读取权限分组
        $privilege_group = Db::name('privilege_group')->select();
        if(!$privilege_group)
            $this->error("请先添加权限分组",'/admin/admin/admin_privilege_lst');
        $this->assign('privilege_group',$privilege_group);
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

        $privilege = Db::name('privilege_src')->where(['id'=>$id])->find();
        $privilege['privilege_code'] = unserialize($privilege['privilege_code']);
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
     * 日志
     */
    public function admin_log_lst(){
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        $list = Db::name('admin_log')->alias('l')->join('admin_user a','l.admin_id = a.id','left')
            ->field('l.*,a.username')->order('l.id desc')->paginate($pagesize,false,['path'=>'/admin/admin/admin_log_lst']);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 更新日志
     */
    public function admin_log_update(){
        ini_set("max_execution_time",  "300");//执行时间上限
        @ini_set('implicit_flush',1);
        ob_implicit_flush(1);
        @ob_end_clean();//执行的时候输出提示

        $file_path = APP_PATH."admin/log";
        if(is_dir($file_path)){
            $file_name_list = scandir($file_path);
            foreach ($file_name_list as $key=>$value){
                if( $value != "." && $value != ".."){
                    $file_name = APP_PATH."admin/log/".$value;
                    echo "<div style='width: 50%;text-align: left;margin: 2px auto;'>导入日志文件" . $file_name . "中</div>";
                    $file = fopen($file_name,'r');
                    Db::startTrans();
                    $i = 1;//循环变量
                    try{
                        while(!feof($file)) {
                            $itemStr = fgets($file); //fgets()函数从文件指针中读取一行
                            $itemArray = explode("$",$itemStr); // 将$分割的各部分内容提取出来
                            if($itemArray){
                                $insert = [
                                    'admin_id'  =>$itemArray[0],
                                    'log_time'  =>$itemArray[1],
                                    'log_info'  =>$itemArray[2],
                                    'log_ip'    =>$itemArray[3],
                                    'log_url'   =>$itemArray[4],
                                ];
                                Db::name('admin_log')->insert($insert);
                            }
                            if($i%500==0){
                                Db::commit();
                            }
                            $i++;
                        }
                    }catch (\Exception $e) {
                        // 回滚事务
                        Db::rollback();
                    }
                    fclose($file);
                    @unlink($file_name);
                }
            }
            echo "<div style='width: 50%;text-align: left;margin: 2px auto;'>导入成功 <a href='/admin/admin/admin_log_lst'>
            <button style='width: 80px;height: 30px;line-height: 30px;background: #3792bf;color: #fff;border: none;cursor: pointer;border-radius: 4px;'>返回</button>
            </a></div>";
        }
    }


    /**
     * 权限分组列表
     * @return mixed
     */
    public function admin_privilege_group_lst(){
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        $list = Db::name('privilege_group')->paginate($pagesize,false,['path'=>'/admin/admin/admin_privilege_group_lst']);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 添加权限分组
     * @return mixed
     */
    public function admin_privilege_group_add(){
        $request = Request::instance();
        if($request->isPost()){
            $post = $request->param();
            $where = [
                'group_name'=>trim($post['group_name']),
            ];
            $find = Db::name('privilege_group')->where($where)->find();
            if($find)
                $this->error("权限分组已存在");
            $insert = [
                'group_name'=>trim($post['group_name']),
            ];
            $res = Db::name('privilege_group')->insert($insert);
            if(!$res)
                $this->error("添加失败");
            $this->success("添加成功",'/admin/admin/admin_privilege_group_lst');
        }

        return $this->fetch();
    }

    /**
     * 编辑权限分组
     * @return mixed
     */
    public function admin_privilege_group_edit(){
        $request= Request::instance();
        if ($request->isPost()){
            $where = [
                'id'=>intval($request->param('id')),
            ];
            //1.组装数据
            $update = [
                'group_name'=>$request->param('group_name'),
            ];
            //2.更新
            $res = Db::name('privilege_group')->where($where)->update($update);
            //3.返回
            if($res){
                $this->success('编辑成功','/admin/admin/admin_privilege_group_lst');
            }
            else
                $this->error('编辑失败');
        }
        else if($request->isGet()){
            $where = [
                'id'=>intval($request->param('id'))
            ];
            $group_info = Db::name('privilege_group')->where($where)->find();
            if(empty($group_info))
                $this->error('分组不存在');
            $this->assign('group_info',$group_info);
            return $this->fetch();
        }
    }

    /**
     * 删除权限分组
     */
    public function admin_privilege_group_delete(){
        $request = Request::instance();
        if ($request->param('id')){
            $where = [
                'id'=>intval($request->param('id')),
            ];
            $res = Db::name('privilege_group')->where($where)->delete();
            if($res){
                $this->success('删除成功', '/admin/admin/admin_privilege_group_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('分组不存在');
        }
    }
}