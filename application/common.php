<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: sxc
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 递归实现无限极分类
 * @param  arr  $data      data
 * @param  int  $parent_id pid
 * @param  int $level     level
 * @return arr             result
 */
function getTree($data,$parent_id=0,$level=0){
    static $tree = array();
    foreach($data as $key=>$value){
        if($value['parent_id'] == $parent_id){
            $value['level'] = $level;
            $tree[] = $value;
            unset($data['key']);
            getTree($data,$value['cat_id'],$level+1);
        }
    }
    return $tree;
}

//生成无限极分类树
function make_tree($arr){
    $refer = array();
    $tree = array();
    foreach($arr as $k => $v){
        $refer[$v['cat_id']] = & $arr[$k];  //创建主键的数组引用
    }

    foreach($arr as $k => $v){
        $pid = $v['parent_id'];   //获取当前分类的父级id
        if($pid == 0){
            $tree[] = & $arr[$k];   //顶级栏目
        }else{
            if(isset($refer[$pid])){
                $refer[$pid]['sub_cat'][] = & $arr[$k];  //如果存在父级栏目，则添加进父级栏目的子栏目数组中
            }
        }
    }
    return $tree;
}


/**
 * 读取系统配置
 * @param $name
 * @return array|false|PDOStatement|string|\think\Model
 */
function Setting($name){
    $where = [
        'name'=>$name,
    ];
    $res = \think\Db::name('setting')->where($where)->find();
    if($res)
        return $res['value'];
    else
        return false;
}

/**
 * 获取ip
 * @return array|false|string
 */
function getIP(){
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";

    if(preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $ip))
        return $ip;
    else
        return '';
}