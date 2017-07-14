<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends AllowController {

	// 展示商品
    public function index(){
    	// 实例化
    	$model=M('goods');
    	// 计算数据总和
    	$tot=$model->count();
    	// 实例化分页类
    	$page=new \Think\Page($tot,6);
    	// 查询数据
    	$p=isset($_GET['p'])?$_GET['p']:1;
        $this->data=$model->page($p.",6")->order('id desc')->select();
    	// 分配分页
    	$this->show=$page->show();
    	// 页面
    	$this->display();
    }
 
    // 增加内容

    public function add(){
    	$this->display();
    }

    
    public function adds(){
    	$this->display();

    }

    // 无刷新上次图片

    public function ajax_up(){
    	if (!empty($_FILES)) {
            //图片上传设置
           	$upload = new \Think\Upload();// 实例化上传类
           	$upload->autoSub=false;
           	$upload->maxSize   =     3145728 ;// 设置附件上传大小
    		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
                $path=$info;
                // 对图片进行裁剪和水印处理
                $image=new \Think\Image();
                // 打开文件-并进行缩放
                // $image->open('./Uploads/'.$path)->thumb(800,800)->save('./Uploads/lg_'.$path);
                $image->open('./Uploads/'.$path)->water('./water/logo.png',9)->thumb(500,500)->save('./Uploads/'.$path);
                // $image->open('./Uploads/'.$path)->thumb(00,100)->1save('./Uploads/sm_'.$path);
                // // 打开文件-并进行水印
                // $image->open('./Uploads/'.$path->water(')./water/logo.png',5)->save('./Uploads/'.$path); 
                
                echo $info;

            }else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
    //删除内容和图片
     function ajax_del(){
        // 接收ID
        $id=$_POST['id'];

        // 实例化数据模型

        $model=M('goods');

        if ($model->delete($id)) {
            # code...
            echo "1";
        }else{
            echo "2";
        }
    }
    //添加成功后返回
    public function inserts(){
    	$model=M('goods');
    	if ($model->add($_POST)) {
    		$this->success('添加成功',U('index'));
    	}else{
    		$this->error('添加失败');
    	}
    }
   
    // 插入数据·
    // public function insert(){
    // 	// 实例化数据模型
    // 	$goods=M('goods');

    // 	// 实话上传类
    // 	$upload=new \Think\Upload();

    // 	// 不让子目录保存
    // 	$upload->autoSub=false;
    // 	// 上传一张图片
    // 	$info=$upload->uploadOne($_FILES['img']);

    // 	if (!$info) {
    // 		# code...
    // 		$this->error($upload->getError());
    // 	}else{
    // 		$path=$info['savename'];
    // 	}
    // 	// 对图片进行裁剪和水印处理
    // 	$image=new \Think\Image();
    // 	// 打开文件-并进行缩放
    // 	$image->open('./Uploads/'.$path)->thumb(800,800)->save('./Uploads/lg_'.$path);
    // 	$image->open('./Uploads/'.$path)->thumb(500,500)->save('./Uploads/md_'.$path);
    // 	$image->open('./Uploads/'.$path)->thumb(100,100)->save('./Uploads/sm_'.$path);

    // 	// 打开文件-并进行水印
    // 	$image->open('./Uploads/'.$path)->water('./water/logo.png',5)->save('./Uploads/'.$path); 

    // 	// 设置数据
    // 	$goods->create();
    // 	$goods->img=$path;
    // 	// 数据库添加数据
    // 	if($goods->add()){
    // 		$this->success('添加成功',U('index'));
    // 	}else{
    // 		$this->error('添加失败');

    // 	}

    // }

}