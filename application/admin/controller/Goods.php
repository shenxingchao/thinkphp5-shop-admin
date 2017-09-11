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
        $this->assign('list',$cat_info);
        return $this->fetch('goods_cat_lst');
    }

    /**
     * 添加商品分类
     */
    public function goods_cat_add(){
        $request = Request::instance();
        if($request->isPost()){
            $insert['cat_name'] = $request->param('cat_name');
            $insert['parent_id'] = $request->param('parent_id');
            $res = Db::name('goods_cat')->insert($insert);
            if($res){
                adminLog('添加商品分类'.$insert['cat_name']);
                $this->success('添加成功','/admin/goods/goods_cat_lst');
            }
            else
                $this->error("添加失败");
        }
        $cat_info = Db::name('goods_cat')->select();
        $cat_info = getTree($cat_info);
        $this->assign('list',$cat_info);
        return $this->fetch();
    }

    /**
     * 编辑商品分类
     */
    public function goods_cat_edit(){
        $request = Request::instance();
        if($request->isPost()) {
            $where = array(
                'cat_id' => $request->param('id')
            );
            $update['cat_name'] = $request->param('cat_name');
            $update['parent_id'] = $request->param('parent_id');
            $res = Db::name('goods_cat')->where($where)->update($update);
            if ($res) {
                adminLog('编辑商品分类' . $update['cat_name']);
                $this->success('更改成功','/admin/goods/goods_cat_lst');
            } else
                $this->error("更改失败");
        }
        else if($request->isGet()){
            $where = [
                'cat_id'=>intval($request->param('id'))
            ];
            $cat_info = Db::name('goods_cat')->where($where)->find();
            if(empty($cat_info))
                $this->error('分类不存在');
            $this->assign('cat_info',$cat_info);
            $cat_info = Db::name('goods_cat')->select();
            $cat_info = getTree($cat_info);
            $this->assign('list',$cat_info);
            return $this->fetch();
        }
    }

    /**
     * 删除商品分类
     */
    public function goods_cat_delete(){
        $request = Request::instance();
        $where = array(
            'cat_id'=>$request->param('id')
        );
        //查找该分类下是否还有分类，若有则不能删除 若有商品也不能删除 未做
        $sub_cat = Db::name('goods_cat')->where(array('parent_id'=>$request->param('id')))->find();
        if($sub_cat)
            $this->error("该分类下还有分类,不能删除");
        $goods_count = Db::name('goods')->where(array('cat_id'=>$request->param('id')))->count();
        if($goods_count > 0)
            $this->error("该分类下还有产品,不能删除");
        $res = Db::name('goods_cat')->where($where)->delete();
        if($res)
            $this->success('删除成功','/admin/goods/goods_cat_lst');
        else
            $this->error("删除失败");
    }

    /**
     * 商品列表
     */
    public function goods_lst(){
        //1.获取商品信息，分页输出
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        $list = Db::name('goods')->order('goods_id desc')->paginate($pagesize,false,['path'=>'/admin/goods/goods_lst']);
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
                        'brand_id'=>$request->param('brand_id')!=''?$request->param('brand_id'):0,
                        'goods_number'=>$request->param('goods_number')?$request->param('goods_number'):(Setting('goods_number')?Setting('goods_number'):0),
                        'is_on_sale'=>$request->param('is_on_sale')?1:0,
                        'goods_img'=>$file_path,
                        'goods_thumb_img'=>$file_thumb_path,
                        'goods_detail'=>htmlspecialchars($request->param('goods_detail')),
                    ];
                    //4.添加
                    $res = Db::name('goods')->insert($insert);
                    //5.返回
                    if($res){
                        adminLog('添加商品'.$insert['goods_name']);
                        $this->success('添加成功','/admin/goods/goods_lst');
                    }
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
        //获取所有品牌
        $brand_info = Db::name('goods_brand')->select();
        $this->assign('brand_info',$brand_info);

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
                'brand_id'=>$request->param('brand_id')!=''?$request->param('brand_id'):0,
                'goods_number'=>$request->param('goods_number')?$request->param('goods_number'):(Setting('goods_number')?Setting('goods_number'):0),
                'is_on_sale'=>$request->param('is_on_sale')?1:0,
                'goods_img' => isset($file_path)?$file_path:$file_path_old,
                'goods_thumb_img' => isset($file_thumb_path)?$file_thumb_path:$file_thumb_path_old,
                'goods_detail' => htmlspecialchars($request->param('goods_detail')),
            ];
            //4.保存
            $res = Db::name('goods')->where($where)->update($update);
            //5.返回
            if ($res){
                adminLog('编辑商品'.$update['goods_name']);
                $this->success('编辑成功', '/admin/goods/goods_lst');
            }
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
            //获取所有品牌
            $brand_info = Db::name('goods_brand')->select();
            $this->assign('brand_info',$brand_info);
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
                //3.2删除详情图片资源
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

    /**
     * 品牌列表
     * @return mixed
     */
    public function goods_brand_lst(){
        //1.获取品牌信息，分页输出
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        $list = Db::name('goods_brand')->paginate($pagesize,false,['path'=>'/admin/goods/goods_brand_lst']);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 添加品牌
     * @return mixed
     */
    public function goods_brand_add(){
        $request= Request::instance();
        if ($request->isPost()){
            //1.上传文件
            $file = $request->file('brand_img');
            if($file){
                $info = $file->move(ROOT_PATH .'/public/upload/brand');
                if($info){
                    $file_name =  $info->getSaveName();
                    $file_path = '/public/upload/brand/'.$file_name;

                    //3.组装数据
                    $insert = [
                        'brand_name'=>$request->param('brand_name'),
                        'brand_img'=>$file_path,
                    ];
                    //4.添加
                    $res = Db::name('goods_brand')->insert($insert);
                    //5.返回
                    if($res)
                        $this->success('添加成功','/admin/goods/goods_brand_lst');
                    else
                        $this->error('添加失败');
                }
                else{
                    $this->error($file->getError());
                }
            }


        }
        return $this->fetch();
    }

    /**
     * 编辑品牌
     * @return mixed
     */
    public function goods_brand_edit(){
        $request= Request::instance();
        if ($request->isPost()){
            $where = [
                'id'=>intval($request->param('id')),
            ];
            //0.获取当前商品信息
            $brand_info = Db::name('goods_brand')->where($where)->find();
            $file_path_old = $brand_info['brand_img'];

            //1.如果有图片上传，则上传图片，删除原图
            $file = $request->file('brand_img');
            if($file) {
                $info = $file->move(ROOT_PATH . '/public/upload/brand');
                if ($info) {
                    $file_name = $info->getSaveName();
                    $file_path = '/public/upload/brand/' . $file_name;
                    //3.删除原图
                    @unlink(ROOT_PATH.$file_path_old);
                } else {
                    $this->error($file->getError());
                }
            }
            //3.组装数据
            $update = [
                'brand_name'=>$request->param('brand_name'),
                'brand_img' => isset($file_path)?$file_path:$file_path_old,
            ];
            //4.保存
            $res = Db::name('goods_brand')->where($where)->update($update);
            //5.返回
            if ($res)
                $this->success('编辑成功', '/admin/goods/goods_brand_lst');
            else
                $this->error('更新失败');
        }else{
            $where = [
                'id'=>intval($request->param('id'))
            ];
            //1.获取当前品牌信息
            $brand_info = Db::name('goods_brand')->where($where)->find();
            if(empty($brand_info))
                $this->error('品牌不存在');
            $this->assign('brand_info',$brand_info);
            return $this->fetch();
        }
    }

    /**
     *  删除品牌
     */
    public function goods_brand_delete(){
        $request = Request::instance();
        if ($request->param('id')){
            //1.获取商品信息
            $where = [
                'id'=>intval($request->param('id')),
            ];
            //1.获取当前商品信息
            $brand_info = Db::name('goods_brand')->where($where)->find();
            //2.删除商品记录
            $res = Db::name('goods_brand')->where($where)->delete();
            if($res){
                //3.删除商品图片 释放资源
                @unlink(ROOT_PATH . $brand_info['brand_img']);
                $this->success('删除成功', '/admin/goods/goods_brand_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('品牌不存在');
        }
    }

    /**
     * 商品类型列表
     * @return mixed
     */
    public function goods_type_lst(){
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        $list = Db::name('goods_type')->paginate($pagesize,false,['path'=>'/admin/goods/goods_type_lst']);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 添加商品类型
     * @return mixed
     */
    public function goods_type_add(){
        $request= Request::instance();
        if ($request->isPost()){
            //1.组装数据
            $insert = [
                'type_name'=>$request->param('type_name'),
            ];
            //2.添加
            $res = Db::name('goods_type')->insert($insert);
            //3.返回
            if($res){
                adminLog("添加商品类型".$insert['type_name']);
                $this->success('添加成功','/admin/goods/goods_type_lst');
            }
            else
                $this->error('添加失败');
        }
        return $this->fetch();
    }

    /**
     * 编辑商品类型
     * @return mixed
     */
    public function goods_type_edit(){
        $request= Request::instance();
        if ($request->isPost()){
            $where = [
                'id'=>intval($request->param('id')),
            ];
            //1.组装数据
            $update = [
                'type_name'=>$request->param('type_name'),
            ];
            //2.更新
            $res = Db::name('goods_type')->where($where)->update($update);
            //3.返回
            if($res){
                adminLog("编辑商品类型".$update['type_name']);
                $this->success('编辑成功','/admin/goods/goods_type_lst');
            }
            else
                $this->error('编辑失败');
        }
        else if($request->isGet()){
            $where = [
                'id'=>intval($request->param('id'))
            ];
            $type_info = Db::name('goods_type')->where($where)->find();
            if(empty($type_info))
                $this->error('类型不存在');
            $this->assign('type_info',$type_info);
            return $this->fetch();
        }
    }

    /**
     * 删除商品类型
     */
    public function goods_type_delete(){
        //查找该类型下属性和规格是为空，为空才能删除
        $request = Request::instance();
        if ($request->param('id')){
            $where_attr = [
                'type_id'=>intval($request->param('id')),
            ];
            $count = Db::name('goods_attr')->where($where_attr)->count();
            if($count > 0){
                $this->error('该类型下还有属性，不能删除');
            }
            $where = [
                'id'=>intval($request->param('id')),
            ];
            $res = Db::name('goods_type')->where($where)->delete();
            if($res){
                $this->success('删除成功', '/admin/goods/goods_type_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('类型不存在');
        }
    }

    /**
     * 商品属性列表
     * @return mixed
     */
    public function goods_attr_lst(){
        $request = Request::instance();
        $pagesize = Setting('admin_pagesize')?Setting('admin_pagesize'):8;
        if($request->param('type_id')){
            $type_id = $request->param('type_id');
            $list = Db::name('goods_attr a')
                ->join('goods_type t','a.type_id=t.id','left')
                ->where('a.type_id = '.$type_id)
                ->field('a.*,t.type_name')
                ->paginate($pagesize,false,['path'=>'/admin/goods/goods_attr_lst']);
        }else{
            $list = Db::name('goods_attr a')
                ->join('goods_type t','a.type_id=t.id','left')
                ->field('a.*,t.type_name')
                ->paginate($pagesize,false,['path'=>'/admin/goods/goods_attr_lst']);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }


    /**
     * 添加商品属性
     * @return mixed
     */
    public function goods_attr_add(){
        $request= Request::instance();
        if ($request->isPost()){
            $post = $request->param();
            //0.处理可选值
            if($post['input_type'] == 1){
                $attr_value = serialize(array_filter($post['item']));
            }
            //1.组装数据
            $insert = [
                'attr_name'   =>$post['attr_name'],
                'type_id'     =>$post['type_id'],
                'input_type'  =>$post['input_type'],
                'attr_value'  =>isset($attr_value)?$attr_value:'',
            ];
            //2.添加
            $res = Db::name('goods_attr')->insert($insert);
            //3.返回
            if($res){
                adminLog("添加商品属性".$insert['attr_name']);
                $this->success('添加成功','/admin/goods/goods_attr_lst');
            }
            else
                $this->error('添加失败');
        }
        //读取所有商品类型
        $type_info = Db::name('goods_type')->select();
        $this->assign('type_info',$type_info);
        return $this->fetch();
    }

    /**
     * 编辑属性
     * @return mixed
     */
    public function goods_attr_edit(){
        $request= Request::instance();
        if ($request->isPost()){
            $post = $request->param();
            $where = [
                'id'=>intval($request->param('id')),
            ];
            //0.处理可选值
            if($post['input_type'] == 1){
                $attr_value = serialize(array_filter($post['item']));
            }
            //1.组装数据
            $update = [
                'attr_name'   =>$post['attr_name'],
                'type_id'     =>$post['type_id'],
                'input_type'  =>$post['input_type'],
                'attr_value'  =>isset($attr_value)?$attr_value:'',
            ];
            //2.添加
            $res = Db::name('goods_attr')->where($where)->update($update);
            //3.返回
            if($res){
                adminLog("编辑商品属性".$update['attr_name']);
                $this->success('编辑成功','/admin/goods/goods_attr_lst');
            }
            else
                $this->error('编辑失败');
        }
        else if($request->isGet()){
            $where = [
                'id'=>intval($request->param('id'))
            ];
            $attr_info = Db::name('goods_attr')->where($where)->find();
            if(empty($attr_info))
                $this->error('属性不存在');
            $attr_info['attr_value'] = unserialize($attr_info['attr_value']);
            $this->assign('attr_info',$attr_info);
            //读取所有商品类型
            $type_info = Db::name('goods_type')->select();
            $this->assign('type_info',$type_info);

            return $this->fetch();
        }
    }

    /**
     * 删除属性
     */
    public function goods_attr_delete(){
        $request = Request::instance();
        if ($request->param('id')){
            $where = [
                'id'=>intval($request->param('id')),
            ];
            $res = Db::name('goods_attr')->where($where)->delete();
            if($res){
                $this->success('删除成功', '/admin/goods/goods_attr_lst');
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('属性不存在');
        }
    }

    public function goods_spec_lst(){
        return $this->fetch();
    }
}