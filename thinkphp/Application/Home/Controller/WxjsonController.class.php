<?php 
	namespace Home\Controller;
	use Think\Controller;
	class WxjsonController extends Controller {
		 public function index(){
		    	 $model=M('goods');
		    	 $data=$model->order('id DESC')->select();
				 $this->ajaxReturn($data,'JSON');    	
		 		 // var_dump($res);
		}
		//小程序对应的点赞
		public function like(){
			//获得小程序传过来的数据
  			$like=I('get.like');
  			$zanid=I('get.zanid');
  			//添加数据到数据库
  			$user=M('goods');
  			//按照id查找like的值
  			//让like的值加1
  			$where['id']=$zanid;
  			$data['likeimg'] = array('exp','likeimg+1');// 用户的likeimg加1
  			$user->where($where)->save($data);//保存
  			$res=$user->where($where)->select();
  			// echo $user->getLastSql();

  			// $res=array(
  			// 	'like'=>$like,
  			// 	'zanid'=>$zanid,
  			// );
  			echo json_encode($res);
		}
		public function unlike(){
			//获得小程序传过来的数据
  			$unlike=I('get.unlike');
  			$unzanid=I('get.unzanid');
  			//添加数据到数据库
  			$user=M('goods');
  			//按照id查找unlike的值
  			//让unlike的值加1
  			$where['id']=$unzanid;
  			$data['unlikeimg'] = array('exp','unlikeimg+1');
  			$user->where($where)->save($data);//保存
  			$res=$user->where($where)->select();
  			// echo $user->getLastSql();

  			// $res=array(
  			// 	'like'=>$like,
  			// 	'zanid'=>$zanid,
  			// );
  			echo json_encode($res);
		}
		//插入content表
		public function charucontents(){
			//打开数据库
			$contents=M('content');
			//获取小程序发过来的get数据
			$contentuid=I('get.contentuid');
  			$imguid=I('get.imguid');
  			$uid=I('get.uid');
  			$nameuid=I('get.nameuid');
  			$timeuid=I('get.timeuid');
  			//把get数据放到data数组里面
  			$data['contentuid']=$contentuid;
  			$data['imguid']=$imguid;
  			$data['uid']=$uid;
  			$data['nameuid']=$nameuid;
  			$data['timeuid']=$timeuid;
  			$contents->data($data)->add();
  			//导出数据到小程序前端
  			$where['uid']=$uid;
  			$res=$contents->where($where)->order('id DESC')->select();
			$this->ajaxReturn($res,'JSON');
		}
		//返回content表数据
		public function returncontent(){
			$contents=M('content');
			$uid=I('get.uid');
			$where['uid']=$uid;
  			$res=$contents->where($where)->order('id DESC')->select();
  			$this->ajaxReturn($res,'JSON');
		}
    //音乐播放
    public function music(){
      $host = "https://ali-qqmusic.showapi.com";
      $path = "/search";
      $method = "GET";
      $appcode = "f47536d604a7410190d8ff804cec00c0";
      $headers = array();
      array_push($headers, "Authorization:APPCODE " . $appcode);
      $querys = "keyword=%E6%B5%B7%E9%98%94%E5%A4%A9%E7%A9%BA&page=page";
      $bodys = "";
      $url = $host . $path . "?" . $querys;

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_FAILONERROR, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HEADER, true);
      if (1 == strpos("$".$host, "https://"))
      {
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      }
      var_dump(curl_exec($curl));

    }

	}

?>