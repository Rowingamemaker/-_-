<?php
namespace Admin\Controller;
use Think\Controller;
class CodeController extends Controller {
	
    // 后台首页
    public function index(){
        $this->display();
    }
    public function code(){
		$code=$_GET['code'];
		$appid="wx12d8df15914f24af";
		$secret="01b3788b8ca16be469de6412dd29b8dc";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
	public function mycode(){
		$code=$_GET['code'];
		$appid="wxf5679c79901cbc57";
		$secret="f3c627664943ac3c8aef6a12b1323348";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}

	
	public function httpGet($url) {
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	   	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
	    curl_setopt($curl, CURLOPT_URL, $url);

	    $res = curl_exec($curl);
	    curl_close($curl);

	    return $res;
	}
	public function code1(){
		$code=$_GET['code'];
		$appid="wxb2378296fdd02737";
		$secret="82418f1b5da27a01f54b2c068091d1c4";
		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
	//黄晓玲
	public function code2(){
		$code=$_GET['code'];
		$appid="wxa83467e52b4831de";
		$secret="4af0c6394f1ed0f6d590e53e90264a9d";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
	//张西坤
	public function code3(){
		$code=$_GET['code'];
		$appid="wx1e4655d1e230cda3";
		$secret="07546b544255417789a342af6db226d9";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
		//Karen: 
	public function code4(){
		$code=$_GET['code'];
		$appid="wxbe8663d0125c0302";
		$secret="d28007ac7dc042129c32b1c9e1522543";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
			//武轩晨
	public function code5(){
		$code=$_GET['code'];
		$appid="wx8b6a4d214311be5d";
		$secret="7bbeefdf4930dfc29967ffe40c47d1fd";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
			//王燕
	public function code6(){
		$code=$_GET['code'];
		$appid="wx11ac09b0cc814009";
		$secret="4a066212c183af481d336b016e8d6b88";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}
	///郭雨涵
	public function code7(){
		$code=$_GET['code'];
		$appid="wx1f077bc57b808424";
		$secret="5a3617aa40b9b0f23a7cb9230cb2b533";

		$api="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
		$str=$this->httpGet($api);
		echo $str;
	}





}