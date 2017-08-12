<?php
/**
 * Created by PhpStorm.
 * User: 86431
 * Date: 2017/7/31
 * Time: 13:24
 */
namespace app\admin\controller;
use think\Db;
use think\Request;

class System extends Base{
    public function setting(){
        $request = Request::instance();
        if($request->isPost()){
            $type = $request->param('type');
            $post = $request->post();
            foreach ($post as $key=>$value){
                //批量写入或者更新数据库
                $where = ['name'=>$key];
                $old_value = Db::name('setting')->where($where)->find();
                if(!$old_value){
                    //新增配置
                    $insert = [
                        'name'=>$key,
                        'value'=>$value,
                        'type'=>$type,
                    ];
                    Db::name('setting')->insert($insert);
                }
                else{
                    //更新配置
                    $update = [
                        'value'=>$value,
                    ];
                    Db::name('setting')->where($where)->update($update);
                }
            }
        }

        //获取所有配置项
        $setting_info  = Db::name('setting')->select();
        foreach ($setting_info as $key=>$value){
            $setting_info[$value['name']] = $value['value'];
        }

        $this->assign('setting_info',$setting_info);
        return $this->fetch();
    }
}