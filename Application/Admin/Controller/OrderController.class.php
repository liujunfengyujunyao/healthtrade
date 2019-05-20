<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController{
	
	public function index(){
		S(
			array(
				'type'=>'memcache',
				'host'=>'127.0.0.1',
				'port'=>'11211',
				'prefix'=>'think',
				'expire'=>60
			)
		);
		$data = S('data');
		if($data === false){
			$data = M('Order')->select();
			S('data',$data);
			echo 'this is yuersql';
			sleep(2);
		}
		// $data = D('Order')->select();
		$this->assign('data',$data);
		$this->display();	
	}
}