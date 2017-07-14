<?php 
namespace Home\Model;

use Think\Model\ViewModel;

class UserViewModel extends ViewModel{
	public $viewFields =array(
		"student"=>array('id','name','_type'=>RIGHT),
		"type"=>array('id'=>'ids','name'=>'tname','_on'=>'student.cid=type.id'),
		);
}





 ?>