<?php
/**
 * Created by PhpStorm.
 * User: 86431
 * Date: 2017/7/11
 * Time: 15:27
 */

namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Image;

class Goods extends Base{

    /**
     * 商品分类
     * @return string
     */
    public function goods_cat_lst(){
        //获取所有分类
        $cat_info = Db::name('goods_cat')->select();
        $cat_info = getTree($cat_info);
        $this->assign('cat_info',$cat_info);
        $tree = make_tree($cat_info);
        $this->assign('tree',$tree);
        return $this->fetch('goods_cat_lst');
    }

    /**
     * 添加商品分类
     */
    public function goods_cat_add(){
        $request = Request::instance();
        $insert['cat_name'] = $request->param('cat_name');
        $insert['parent_id'] = $request->param('parent_id');
        $res = Db::name('goods_cat')->insert($insert);
        if($res)
            $this->success('添加成功');
        else
            $this->error("添加失败");
    }

    /**
     * 编辑商品分类
     */
    public function goods_cat_edit(){
        $request = Request::instance();
        $where = array(
            'cat_id'=>$request->param('cat_id')
        );
        $update['cat_name'] = $request->param('cat_name');
        $update['parent_id'] = $request->param('parent_id');
        $res = Db::name('goods_cat')->where($where)->update($update);
        if($res)
            $this->success('更改成功');
        else
            $this->error("更改失败");
    }

    /**
     * 删除商品分类
     */
    public function goods_cat_delete(){
        $request = Request::instance();
        $where = array(
            'cat_id'=>$request->param('cat_id')
        );
        //查找该分类下是否还有分类，若有则不能删除 若有商品也不能删除 未做
        $sub_cat = Db::name('goods_cat')->where(array('parent_id'=>$request->param('cat_id')))->find();
        if($sub_cat)
            $this->error("该分类下还有分类,不能删除");
        $res = Db::name('goods_cat')->where($where)->delete();
        if($res)
            $this->success('删除成功');
        else
            $this->error("删除失败");
    }

    /**
     * 商品列表
     */
    public function goods_lst(){
        //1.获取商品信息，分页输出
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        $list = Db::name('goods')->paginate($pagesize,false,['path'=>'/admin/goods/goods_lst']);
        $this->assign('list',$list);
        return $this->fetch('goods_lst');
    }

    /**
     * 添加商品
     * @return mixed
     */
    public function goods_add(){
        $request= Request::instance();
        if ($request->isPost()){
            //添加商品
            //1.上传文件
            $file = $request->file('goods_img');
            if($file){
                $info = $file->move(ROOT_PATH .'/public/upload/goods');
                if($info){
                    $file_name =  $info->getSaveName();
                    $file_path = '/public/upload/goods/'.$file_name;

                    //2.生成缩略图
                    $image = Image::open(ROOT_PATH.$file_path);
                    $file_thumb_name = str_replace(".","_thumb.",$file_name);
                    $file_thumb_path = '/public/upload/goods/'.$file_thumb_name;
                    $image->thumb(150, 150)->save(ROOT_PATH .$file_thumb_path);

                    //3.组装数据
                    $insert = [
                        'goods_name'=>$request->param('goods_name'),
                        'goods_price'=>$request->param('goods_price'),
                        'cat_id'=>$request->param('cat_id'),
                        'goods_number'=>$request->param('goods_number')?$request->param('goods_number'):(Setting('goods_number')?Setting('goods_number'):0),
                        'goods_img'=>$file_path,
                        'goods_thumb_img'=>$file_thumb_path,
                        'goods_detail'=>htmlspecialchars($request->param('goods_detail')),
                    ];
                    //4.添加
                    $res = Db::name('goods')->insert($insert);
                    //5.返回
                    if($res)
                        $this->success('添加成功','/admin/goods/goods_lst');
                    else
                        $this->error('添加失败');
                }
                else{
                    $this->error($file->getError());
                }
            }


        }
        //获取所有分类 显示模板
        $cat_info = Db::name('goods_cat')->select();
        $cat_info = getTree($cat_info);
        $this->assign('cat_info',$cat_info);
        return $this->fetch('goods_add');
    }

    /**
     * 编辑商品
     * @return mixed
     */
    public function goods_edit(){
        $request= Request::instance();
        if ($request->isPost()){
            //编辑商品
            $where = [
                'goods_id'=>intval($request->param('goods_id')),
            ];
            //0.获取当前商品信息
            $goods_info = Db::name('goods')->where($where)->find();
            $file_path_old = $goods_info['goods_img'];
            $file_thumb_path_old = $goods_info['goods_thumb_img'];

            //1.如果有图片上传，则上传图片，删除原图和缩略图
            $file = $request->file('goods_img');
            if($file) {
                $info = $file->move(ROOT_PATH . '/public/upload/goods');
                if ($info) {
                    $file_name = $info->getSaveName();
                    $file_path = '/public/upload/goods/' . $file_name;

                    //2.生成缩略图
                    $image = Image::open(ROOT_PATH . $file_path);
                    $file_thumb_name = str_replace(".", "_thumb.", $file_name);
                    $file_thumb_path = '/public/upload/goods/' . $file_thumb_name;
                    $image->thumb(150, 150)->save(ROOT_PATH . $file_thumb_path);
                    //3.删除原图
                    @unlink(ROOT_PATH.$file_path_old);
                    @unlink(ROOT_PATH.$file_thumb_path_old);
                } else {
                    $this->error($file->getError());
                }
            }
            //3.组装数据
            $update = [
                'goods_name' => $request->param('goods_name'),
                'goods_price' => $request->param('goods_price'),
                'cat_id' => $request->param('cat_id'),
                'goods_number'=>$request->param('goods_number')?$request->param('goods_number'):(Setting('goods_number')?Setting('goods_number'):0),
                'goods_img' => isset($file_path)?$file_path:$file_path_old,
                'goods_thumb_img' => isset($file_thumb_path)?$file_thumb_path:$file_thumb_path_old,
                'goods_detail' => htmlspecialchars($request->param('goods_detail')),
            ];
            //4.保存
            $res = Db::name('goods')->where($where)->update($update);
            //5.返回
            if ($res)
                $this->success('编辑成功', '/admin/goods/goods_lst');
            else
                $this->error('更新失败');
        }
        else if($request->param('goods_id')){
            $where = [
                'goods_id'=>intval($request->param('goods_id')),
            ];
            //1.获取当前商品信息
            $goods_info = Db::name('goods')->where($where)->find();
            if(empty($goods_info))
                $this->error('商品不存在');
            $goods_info['goods_detail'] = htmlspecialchars_decode($goods_info['goods_detail']);
            $this->assign('goods_info',$goods_info);
            //获取所有分类 显示模板
            $cat_info = Db::name('goods_cat')->select();
            $cat_info = getTree($cat_info);
            $this->assign('cat_info',$cat_info);
            return $this->fetch('goods_edit');
        }
    }


    /**
     * 删除单个商品
     */
    public function goods_delete(){
        $request = Request::instance();
        if ($request->param('goods_id')){
            //1.获取商品信息
            $where = [
                'goods_id'=>intval($request->param('goods_id')),
            ];
            //1.获取当前商品信息
            $goods_info = Db::name('goods')->where($where)->find();
            //2.删除商品记录
            $res = Db::name('goods')->where($where)->delete();
            if($res){
                //3.删除商品图片 释放资源
                @unlink(ROOT_PATH . $goods_info['goods_img']);
                @unlink(ROOT_PATH . $goods_info['goods_thumb_img']);
                $this->success('删除成功', '/admin/goods/goods_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('商品不存在');
        }
    }
}