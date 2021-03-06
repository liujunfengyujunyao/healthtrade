<?php
//收藏列表控制器
namespace Home\Controller;
use Think\Controller;
class WishController extends CommonController
{
	public function index()
	{
			$goods = D('Wish') ->alias('t1')->field('t1.*,t2.goods_small_img') ->join('left join he_goods as t2 on t1.goods_id = t2.id')->select();
			$this -> assign('goods',$goods);
			$this -> display();
	}

	// 添加到收藏夹
	public function addWish()
	{
		$id = I('post.id');
		// dump($id);die;
		$res = D('Wish') -> addW($id);
		// dump($res);die;
		if($res){
			$return = array(
				'code' => 10000,
				'msg' => '添加成功',
			);
			$this -> ajaxReturn($return);
		}else{
			$return = array(
				'code' => 10001,
				'msg' => '添加失败',
			);
			$this -> ajaxReturn($return);
		}
	}

}