<?php 
	namespace Admin\Controller;
	use Think\Controller;
	
	/**
	 * 
	 */
	 class TestController extends Controller
	 {
	 	public function index(){
			// echo $_SERVER['PHP_SELF'];
			// echo "<br>";
			// echo $_SERVER['SERVER_NAME'];
			// echo "<br>";
			// echo $_SERVER['HTTP_HOST'];
			// echo "<br>";
			// echo $_SERVER['SERVER_ADDR'];
			// echo "<br>";
			// echo $_SERVER['HTTP_USER_AGENT'];
			// echo "<br>";
			// echo $_SERVER['SCRIPT_NAME'];
			echo strlen("Hello world!");

	 		// $arr=[1,3,58,59,2,4];
	 		// sort($arr);
	 		// foreach ($arr as $key => $value) {
	 		// 	# code...
	 		// 	echo $key;
	 		// }
	 		// echo $arr;
	 	}
	 } 



 ?>