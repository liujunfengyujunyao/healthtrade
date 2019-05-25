<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        //查询图片轮播部分商品信息
        $goods3 = D('Goods')->where('id in (1,2,3)')->select();
        $this->assign('goods3',$goods3);
        //查询经典产品部分商品信息
        $goods = D('Goods')->select();
        $this->assign('goods',$goods);
        $this->display();
    }
    public function detail(){
        //从地址栏获取商品id
        $id = I('get.id');
   
        //商品表和系列表联合查询
        $goods = D('goods')->alias('t1')->field('t1.*,t2.series_conception')->join(
            'left join he_series as t2 on t2.id=t1.series_id')->where("t1.id={$id}")->find();
        $this->assign('goods',$goods);
        //查询商品属性
        $attr = D('GoodsAttr')->where(["goods_id"=>$id])->select();
        dump($attr);die;
        $attr_v=array();
        //遍历输出属性值
        foreach($attr as $k=>$v){
            if($v['attr_id']==1){
                $attr_v[0][]= $v;
               
            }else{
                $attr_v[1][]=$v;
            }
        }
        // dump($attr_v);die;
        $this->assign('attr',$attr_v);
        //查询热销产品
        $hots = D('Goods')->select();
        $this->assign('hots',$hots);
        //评论
        $review = D('Review')->alias('t1')->field('t1.*,t2.username')->join('left join he_user as t2 on t1.user_id=t2.id')->where(['goods_id'=>$id])->select();
        $this->assign('review',$review);
        $this->display();
    }

}
