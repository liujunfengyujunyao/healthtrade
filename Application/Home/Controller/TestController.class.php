<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
	public function index(){
		// echo "hello";
	//U函数动态生成url;
	echo U("Home/Test/index","id=100&page=10", true,false),"<br>";
	echo U("Home/Test/index","id=100&page=10", false,false),"<br>";
	echo U("Home/Test/index","id=100&page=10", true,false),"<br>";

	}

	public function pa()
    {
        echo encrypt_password("123456");
    }
}
?>