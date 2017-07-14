<?php
namespace Admin\Controller;
use Think\Controller;
class AllowController extends Controller {
	// 自动加载
	public function _initialize(){
		if (session('yzm_admin_id') && session('yzm_admin_name')) {
			# code...
		}else{
			$this->error('请登录。。。',U('Login/index'));
			exit;
		}
	}




}