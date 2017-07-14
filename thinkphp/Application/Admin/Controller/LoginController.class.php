<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    // 后台首页
    public function index(){
        $this->display();
    }

    // 判断用户登录
    public function check(){
    	// 检测验证码正确
    	if ($this->check_verify($_POST['code'])) {
    		# code...
    		// 检测账户和密码
    		if ($_POST['name'] && $_POST['pass']) {
    			# code...
    			// 数据库中判断账户和密码正确
    			$model=M('user');
    			$data=$model->where("name='$_POST[name]' and pass='$_POST[pass]' and statu=0")->find();
    			if ($data) {
    				session('yzm_admin_id',$data['id']);
    				session('yzm_admin_name',$data['name']);
    				$this->success('登录成功',U('Index/index'));

    			}else{
    				$this->error('登录失败');

    			}
    		}else{
    			$this->error('请输入账户或者密码');

    		}
    	}else{
    		$this->error('验证码错误');
    	}
    }

    // 验证码
    public function yzm(){
    	$Verify = new \Think\Verify();
    	$Verify->codeSet="0123456789";
        $Verify->length = 4;
    	$Verify->entry();
    }

    // 检测验证码
	function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}

	// 退出操作

	function logout(){
		// 清空session
		$_SESSION=array();
		session(null);
		$this->success('退出成功',U('index'));

	}
}