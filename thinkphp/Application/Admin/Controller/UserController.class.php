<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends AllowController {

    // 用户管理首页
    public function index(){
        $this->display();

    }

    // 添加页面

    public function add(){
    	$this->display();
    }


    // 修改页面

    public function edit(){
    	$this->display();
    }

    // 用户列表页面


    public function lists(){
        // 实例化数据模型
        $model=M('user');
        // 统计数据条数
        $tot=$model->where("name like '%$_GET[name]%'")->count();
        // 实例化分页类
        $page=new \Think\Page($tot,5);
        // 查数据
        $p=isset($_GET['p'])?$_GET['p']:1;
        $this->data=$model->where("name like '%$_GET[name]%'")->page($p.",5")->select();
        // 分配数据
        $this->tot=$tot;
        $this->show=$page->show();

        $this->display();
    }

    // ajax添加数据
    public function ajax_add(){
        // 数组格式化
        // 先把实体转换
        $str=str_replace('&amp;','&',I('post.str'));
        // 使用函数格式化字符串
        parse_str($str,$arr);

        $arr['time']=time();
        // 实例化数据模型
        $model=M('user');


        // 插入数据
        if ($model->add($arr)) {
            # code...
            echo "1";
        }else{
            echo "2";
        }
    }

    // ajax删除单条数据
    function ajax_del(){
        // 接收ID
        $id=$_POST['id'];

        // 实例化数据模型

        $model=M('user');

        if ($model->delete($id)) {
            # code...
            echo "1";
        }else{
            echo "2";
        }
    }

    // 批量删除数据
    function ajax_delAll(){
        $str=$_POST[str];
        $model=M('user');

        if ($data=$model->where("id in ($str)")->delete()) {
            # code...
            echo $data;
        }else{
            echo "0";
        }
    }

    // ajax的修改数据

    public function ajax_edit(){
        $id=$_POST['id'];

        // 实例化
        $model=M('user');

        // 查询数据
        $this->data=$model->find($id);
        echo $this->fetch();
    }

    // ajax 的更新数据

    public function ajax_save(){
        // 数组格式化
        // 先把实体转换
        $str=str_replace('&amp;','&',I('post.str'));
        // 使用函数格式化字符串
        parse_str($str,$arr);
        // 实例化数据库
        $model=M('user');

        // 更新数据

        if ($model->save($arr)) {

            $this->data=$model->find($arr[id]);

            echo $this->fetch();
        
        }else{
            echo "0";
        }

    }

    public function ajax_statu(){
        $model=M('user');

        if ($model->save($_POST)) {
            # code...
            echo "1";
        }else{
            echo "0";
        }
    }



}