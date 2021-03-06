<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends CommonController
{
	public function index()
	{
	//调用Cart模型的getAllCart方法来获取购物车数据
 		$data = D('Cart') -> addAllCart();
 		// dump($data);die;
 		//遍历数组 唯美一跳数据,查询商品基本信息 查询商品属性信息
 		foreach($data as $k => &$v){
 			$goods = D('Goods') -> where(['id' => $v['goods_id']]) -> find();
 			$v['goods_name'] = $goods['goods_name'];
 			$v['goods_small_img'] = $goods['goods_small_img'];
 			$v['goods_price'] = $goods['goods_price'];
 			//查询商品的属性信息
 			// ..链表查询//
 			$attrs = D('GoodsAttr') -> alias('t1') -> field('t1.*,t2.attr_name') -> join('left join he_attribute t2 on t1.attr_id = t2.id') -> where("t1.id in ({$v['goods_attr_ids']})") -> select();

 			$v['goods_attr'] = $attrs;
 		}
 			
 		
 		// dump($data);die;
 		$this -> assign('data',$data);
 		$this -> display();
	}

	// 购物车添加方法
	public function addCart()
	{
		// 从页面接收数据,调用add模型添加
		$data = I('post.');
		$data = explode(',', $data['cart']);
		//dump($data);die;
		$goods_id = $data[0];
		$goods_attr_ids = $data[1] .',' . $data[2] ;
		// $goods_attr_ids = '11,4';
		$goods_number = 1;
		$res = D('Cart') -> addC($goods_id,$goods_attr_ids,$goods_number);
		
		if($res === 'no_login'){
			$return = array(
				'code' => 10002,
				'msg' => '请先登录'
				);
		}else{
			if($res){
				$return = array(
				'code' => 10000,
				'msg' => 'success'
				);
			}else{
				$return = array(
					'code' => 10001,
					'msg' => '加入失败'
					);
			}
		}
		$this -> ajaxReturn($return);
	}

	//删除购车记录
	public function delCart()
	{
		$data = I('post.');	
		// $data = json_decode($data);
	

		$res = D('Cart') -> delCart($data['goods_id'],$data['goods_attr_ids']);
		if($res){
			$return = array(
				'code' => 10000,
				'msg' => '删除成功'
				);
			$this -> ajaxReturn($return);
			}else{
				$return = array(
					'code' => 10001,
					'msg' => '删除失败'
					);
			$this -> ajaxReturn($return);
		}
	}
 //修改数量
	public function ajaxchangenum(){
		$data = I('post.');
		$res = D('Cart')->changeNum($data['goods_id'],$data['goods_attr_ids'],$data['goods_num']);
		if($res){
			$return = array(
				'code'=>10000,
				'msg'=>'success',
				);
			$this->ajaxReturn($return);
		}else{
			$return = array(
				'code'=>10001,
				'msg'=>'修改失败'
				);
			$this->ajaxReturn($return);
		}
	}
	//结算
	public function flow(){
		if(!session('?user_info')){
			session('back_url',U('Home/Cart/index'));
			$this->redirect('Home/Login/login');
		}
		$user_id = session('user_info.id');
		$address = D('Address')->where(['user_id'=>$user_id])->find();
		// dump($address);die;
		$this->assign('address',$address);
		$cart_ids = I('get.cart_ids');
		$cart_data = D("Cart")->alias('t1')->field('t1.*,t2.goods_name,goods_small_img,goods_price')->join('left join he_goods t2 on t1.goods_id = t2.id')->where("t1.id in({$cart_ids})")->select();
		$total_price = 0;
		foreach($cart_data as $k=>&$v){
			$goods_attr = D('GoodsAttr')->alias('t3')->field('t3.*,t4.attr_name')->join('left join he_attribute t4 on t3.attr_id = t4.id')->where("t3.id in({$v['goods_attr_ids']})")->select();
			$v['goods_attr']=$goods_attr;
			$total_price += $v['goods_price'] * $v['goods_number'];

		}
		$this->assign('cart_data',$cart_data);
		$this->assign('total_price',$total_price);
		$this->display();
	}
	public function createorder(){
		$data = I('post.');
		$order_num = time().mt_rand(10000,99999);
		$cart_data = D('Cart') ->alias('t1')->field('t1.*,t2.goods_price')->join('left join he_goods t2 on t1.goods_id = t2.id')->where("t1.id in ({$data['cart_ids']})")->select();
		$total_price = 0;
		foreach ($cart_data as $k=>$v){
			$total_price += $v['goods_number'] * $v['goods_price'];
		}
		$user_id = session('user_info.id');
		$row = array(
			'order_num'=>$order_num,
			'money'=>$total_price,
			'user_id'=>$user_id,
			'address_id'=>$data['address_id'],
			'create_time'=>time()
			);
		$res = D('Order')->add($row);
		if($res){
			foreach($cart_data as $k=>$v){
				$row = array(
					'order_id' => $res,
					'goods_id' => $v['goods_id'],
					'goods_price' => $v['goods_price'],
					'number' => $v['goods_number'],
					'goods_attr_ids' => $v['goods_attr_ids']
					);
				$order_goods[] = $row;
			}
			D('OrderGoods')->addAll($order_goods);
			D('Cart')->where("id in ({$data['cart_ids']})")->delete();
			$this->redirect('Home/Cart/pay_success',"money=$total_price&order_num=$order_num");
		}else{
			$this->error('订单创建失败');
		}
	}
	public function pay_success(){
		// $data = I('get.');
		$money = I('get.money');
		$this->assign('money',$money);
		$this->display();
	}
}