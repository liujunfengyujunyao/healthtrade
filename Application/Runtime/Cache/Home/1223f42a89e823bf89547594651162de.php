<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    
    <title>商品详情</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/Public/Home/css/grid.css">
    <link rel="stylesheet" href="/Public/Home/css/style.css">
    <link rel="stylesheet" href="/Public/Home/css/normalize.css">

    <script src="/Public/Home/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/Public/Home/js/jquery-1.8.3.min.js"><\/script>')</script>
    <script src="/Public/Home/js/html5.js"></script>
    <script src="/Public/Home/js/main.js"></script>
    <script src="/Public/Home/js/radio.js"></script>
    <script src="/Public/Home/js/checkbox.js"></script>
    <script src="/Public/Home/js/selectBox.js"></script>
    <script src="/Public/Home/js/jquery.carouFredSel-5.2.2-packed.js"></script>
    <script src="/Public/Home/js/jquery.jqzoom-core.js"></script>
    <script src="/Public/Home/js/jquery.transit.js"></script>
    <script src="/Public/Home/js/jquery.easing.1.2.js"></script>
    <script src="/Public/Home/js/jquery.anythingslider.js"></script>
    <script src="/Public/Home/js/jquery.anythingslider.fx.js"></script>
</head>
<body>
  <!-- 头部导航栏 -->
    <div id="top">
        <div class="container_12">
            <div class="grid_3">
                <div class="lang">
                    <ul>
                        <li class="current"><a href="#">中文</a></li>
                        <li><a href="#">英文</a></li>
                    </ul>
                </div><!-- .lang -->

                <div class="currency">
                    <ul>
                        <li class="current"><a href="#">￥</a></li>
                        <li><a href="#">$</a></li>
                    </ul>
                </div><!-- .currency -->
            </div><!-- .grid_3 -->

            <div class="grid_9">
                <nav>
                <?php if( $_SESSION['user_info']== null ): ?><ul>
                            <li class="current"><a href="#">个人账户</a></li>
                            <li><a href="#">收藏夹</a></li>
                            <li><a href="/index.php/Home/Login/login">登录</a></li>
                            <li><a href="/index.php/Home/Login/register">注册</a></li>
                        </ul>
                <?php else: ?>
                         <ul>
                            <li class="current"><a href="#">个人账户</a></li>
                            <li><a href="/index.php/Home/Wish/index">收藏夹</a></li>
                            <li><a href="/index.php/Home/Login/logout">退出</a></li>

                </ul><?php endif; ?>  
                </nav>
            </div><!-- .grid_9 -->
        </div>
    </div><!-- #top -->

  
    <header>
        <div class="container_12">
            <div class="grid_3">
                <hgroup>
                    <h1 id="site_logo"><a href="/index.php/Home/Index/index" title=""><img src="/Public/Home/img/logo.png" alt="Online Store Theme Logo"></a></h1>
                    <h2 id="site_description">线上主题商店</h2>
                </hgroup>
            </div><!-- .grid_3 -->

            <div class="grid_9">
                <div class="top_header">
                <?php if( $_SESSION['user_info']== null ): ?><div class="welcome">
                        Welcome visitor you can <a href="/index.php/Home/Login/login">登录</a> or <a href="/index.php/Home/Login/register">注册</a>.
                    </div><!-- .welcome -->
                    <?php else: ?>
                    <div class="welcome">
                        Welcome! <?php echo ($_SESSION['user_info']['email']); ?>
                    </div><?php endif; ?>  

                    <ul id="cart_nav">
                        <li>
                            <a class="cart_li" href="/index.php/Home/Cart/index">
                                <div class="cart_ico"></div>
                                购物车
                                $<span class="total_cart">0.00</span>
                            </a>
                            <ul class="cart_cont" >
                                <li class="no_border recently">最近添加的项目</li>
                                <!-- 需要循环 -->
                                <?php if(is_array($cdata)): $i = 0; $__LIST__ = $cdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cval): $mod = ($i % 2 );++$i;?><li  goods_id="<?php echo ($cval["goods_id"]); ?>" goods_attr_ids="<?php echo ($cval["goods_attr_ids"]); ?>">
                                    <a href="/index.php/Home/Index/detail/id/<?php echo ($cval["goods_id"]); ?>" class="prev_cart"><div class="cart_vert"><img src="<?php echo ($cval["goods_small_img"]); ?>" alt="Product 1" title=""></div></a>
                                    <div class="cont_cart">
                                        <h4><?php echo ($cval["goods_name"]); ?> <br><a href="/index.php/Home/Cart/index">详情请至购物车</a></h4>
                                        <div class="price"><?php echo ($cval["goods_number"]); ?>x<span><?php echo ($cval["goods_price"]); ?></span></div>
                                    </div>
                                    <a title="close" class="close _close" href="#"  ></a>
                                    <div class="clear"></div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <li class="no_border">
                                    <a href="/index.php/Home/Cart/index" class="view_cart">查看购物车</a>
                                    <a href="checkout.html" class="checkout">结账</a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- .cart_nav -->

                </div><!-- .top_header -->

                <nav class="primary">
                    <ul>

                        <li class="curent"><a href="/index.php/Home/Index/index">主页</a></li>
                        <li><a href="/index.php/Home/List/index">全部商品</a></li>
                        <li><a href="/index.php/Home/List/index">热销新品</a></li>

                        <li class="parent">
                            <a href="#">分类</a>
                            <ul class="sub">
                            <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/List/index/cate_id/<?php echo ($val["id"]); ?>"><?php echo ($val["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                        <li><a href="/index.php/Home/List/index">限量款</a></li>
                        <li class="parent">
                            <a href="#">diamond系列</a>
                            <ul class="sub">
                            <?php if(is_array($series)): $i = 0; $__LIST__ = $series;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/List/index/series_id/<?php echo ($val["id"]); ?>"><?php echo ($val["series_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- .primary -->
            </div><!-- .grid_9 -->
        </div>

    </header>
<script type="text/javascript">
    $(function(){
        $('._close').click(function(){
            var data = {
             'goods_id':$(this).closest('li').attr('goods_id'),
             'goods_attr_ids':$(this).closest('li').attr('goods_attr_ids')
                };
                var _this = this;
            $.ajax({
                'url':'/index.php/Home/Common/delTopCart',
                'type':'post',
                'dataType':'json',
                'data':data,
                'success':function(response){
                if(response.code != 10000){
                        alert(response.msg);
                        return;
                    }else{
                        // alert(response.msg);

                        $(_this).closest('li').remove();
                    }
                }
            })
            // $('form').submit();
        });
    });
</script>
</header>
    
    <div class="breadcrumbs">
        <div class="container_12">
            <div class="grid_12">
                 <a href="index.html">主页</a><span></span><a href="#">详情页</a><span></span><span class="current"><?php echo ($goods["goods_name"]); ?></span>
            </div><!-- .grid_12 -->
        </div><!-- .container_12 -->
    </div><!-- .breadcrumbs -->
    
    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title"><?php echo ($goods["goods_name"]); ?></h1>
                </header>
                    
                <article class="product_page">
                    <div class="grid_5 img_slid" id="products">
			<img class="sale" src="/Public/Home/img/sale.png" alt="Sale">
			<div class="preview slides_container">
			    <div class="prev_bg">
				<a href="<?php echo ($goods["goods_big_img"]); ?>" class="jqzoom" rel='gal1' title="">
				    <img src="<?php echo ($goods["goods_big_img"]); ?>" alt="Product 1" title="">
				</a>
			    </div>
			</div><!-- .preview -->
                        
                        <div class="next_prev">
			    <a id="img_prev" class="arows" href="#"><span>Prev</span></a>
			    <a id="img_next" class="arows" href="#"><span>Next</span></a>
			</div><!-- .next_prev -->

			<ul class="small_img clearfix" id="thumblist">
			    <li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo ($goods["goods_big_img"]); ?>',largeimage: '<?php echo ($goods["goods_big_img"]); ?>'}"><img src='<?php echo ($goods["goods_big_img"]); ?>' alt=""></a></li>
			    <li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './/Public/Home/img/content/product2.png',largeimage: './/Public/Home/img/content/product2.png'}"><img src='/Public/Home/img/content/product2.png' alt=""></a></li>
			    <li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './/Public/Home/img/content/product3.png',largeimage: './/Public/Home/img/content/product3.png'}"><img src='/Public/Home/img/content/product3.png' alt=""></a></li>
			    <li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './/Public/Home/img/content/product4.png',largeimage: './/Public/Home/img/content/product4.png'}"><img src='/Public/Home/img/content/product4.png' alt=""></a></li>
			    <li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './/Public/Home/img/content/product5.png',largeimage: './/Public/Home/img/content/product5.png'}"><img src='/Public/Home/img/content/product5.png' alt=""></a></li>
			</ul><!-- .small_img -->

			<div id="pagination"></div>
		    </div><!-- .grid_5 -->
                    
                    <div class="grid_7">
			<div class="entry_content">
                            <div class="soc">
				<img src="/Public/Home/img/soc.png" alt="Soc">
			    </div><!-- .soc -->
                            
			    <div class="review">
				<a class="plus" href="#"></a>
				<a class="plus" href="#"></a>
				<a class="plus" href="#"></a>
				<a href="#"></a>
				<a href="#"></a>
				<span><strong>3</strong> 评论(S)</span>
                                <span class="separator">|</span>
			        <a class="add_review" href="#">销量(999)</a>
			    </div>
                            
			    <p><?php echo ($goods["goods_introduct"]); ?></p>
                            
                            <div class="ava_price">
                                <div class="price">
                                    <div class="price_old">$<?php echo ($goods["goods_ori_price"]); ?></div>
                                    $<?php echo ($goods["goods_price"]); ?>
				</div><!-- .price -->
                                <div class="clear"></div>
			    </div><!-- .ava_price -->
    
          <input type="hidden" name="goods_id" value="<?php echo ($goods["id"]); ?>">                          
                <div class="parameter_selection">
                                <select class="select_size">
                                    <option>请选择尺寸</option>
                                    <?php if(is_array($attr[0])): $i = 0; $__LIST__ = $attr[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($v["id"]); ?>"> <?php echo ($v["attr_value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <select  class="select_m" >
                                    <option>请选择材质</option>
                                    <?php if(is_array($attr[1])): $i = 0; $__LIST__ = $attr[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($v["id"]); ?>"><?php echo ($v["attr_value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
			    </div><!-- .parameter_selection -->

			    <div class="cart">
                                <a href="javascript:void(0);" class="bay"><img src="/Public/Home/img/bg_cart.png" alt="Buy" title="">加入购物车
                                <a href="#" class="like"><img src="/Public/Home/img/like.png" alt="" title=""> 收藏</a>
                                <a href="#" class="obn"><img src="/Public/Home/img/obl.png" alt="" title="">分享</a>
                            </div><!-- .cart -->
            </div><!-- .entry_content -->
            </div><!-- .grid_7 -->

		    <div class="clear"></div>
                    
                    <div class="grid_12" >
			<div id="wrapper_tab" class="tab1">
			    <a href="#" class="tab1 tab_link">产品概念</a>
			    <a href="#" class="tab2 tab_link">评论</a>

			    <div class="clear"></div>

			    <div class="tab1 tab_body">
				<h4>商品概念</h4>
				<?php echo ($goods["series_conception"]); ?>
                                <div class="clear"></div>
			    </div><!-- .tab1 .tab_body -->

			    <div class="tab2 tab_body">
				<h4>顾客评论</h4>
                                
                <ul class="comments">
                <?php if(is_array($review)): $i = 0; $__LIST__ = $review;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
    					<div class="autor"><?php echo ($vol["username"]); ?></div> <time datetime="2012-11-03"><?php echo ($vol["create_time"]); ?></time>

    					<div class="evaluation">
    					    <div class="quality">
    						<span>质量</span>
    						<a class="plus" href="#"></a>
    						<a class="plus" href="#"></a>
    						<a class="plus" href="#"></a>
    						<a href="#"></a>
    						<a href="#"></a>
    					    </div>
    					    <div class="price">
                            <span>价格</span>
                            <a class="plus" href="#"></a>
    						<a class="plus" href="#"></a>
    						<a class="plus" href="#"></a>
    						<a class="plus_minus" href="#"></a>
    						<a  href="#"></a>
    					    </div>
    					    <div class="clear"></div>
    					</div><!-- .evaluation -->

    					<p><?php echo ($vol["review_content"]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul><!-- .comments -->
                                
            <form class="add_comments">
                <input type="hidden" name="goods_id" value="<?php echo ($goods["id"]); ?>"> 
                <input type="hidden" name="user_name" value=""> 
                <input type="hidden" name="review_title" value=""> 
                <input type="hidden" name="review_user" value=""> 
				    <h4>写下你的评论</h4>

					<div class="evaluation" >
					    <div class="quality" >
						质量<sup>*</sup>
						<input class="niceRadio " type="radio" name="quality" value="1"><span class="eva_num">1</span>
						<input class="niceRadio " type="radio" name="quality" value="2"><span class="eva_num">2</span>
						<input class="niceRadio " type="radio" name="quality" value="3"><span class="eva_num">3</span>
						<input class="niceRadio " type="radio" name="quality" value="4"><span class="eva_num">4</span>
						<input class="niceRadio " type="radio" name="quality" value="5"><span class="eva_num">5</span>
					    </div>
					    <div class="price ">
						价格<sup>*</sup>
						<input class="niceRadio" type="radio" name="price" value="1"><span class="eva_num">1</span>
						<input class="niceRadio" type="radio" name="price" value="2"><span class="eva_num">2</span>
						<input class="niceRadio" type="radio" name="price" value="3"><span class="eva_num">3</span>
						<input class="niceRadio" type="radio" name="price" value="4"><span class="eva_num">4</span>
						<input class="niceRadio" type="radio" name="price" value="5"><span class="eva_num">5</span>
					    </div>
					    <div class="clear"></div>
					</div><!-- .evaluation -->

					<div class="text_review">
					    <strong>评论内容</strong><sup>*</sup><br>
					    <textarea name="text" class="plnr"></textarea><br>
					    <i>注意: HTML i不能识别!</i>
					</div><!-- .text_review -->
                                        
                    <div class="nickname">
					    <strong>昵称</strong><sup>*</sup><br>
					    <input type="text" name="" class="nicheng" value="">
					</div><!-- .nickname -->

					<div class="your_review">
					    <strong>评论概要</strong><sup>*</sup><br>
					    <input type="text" name="" class="gaiyao" value="">
					</div><!-- .your_review -->

					<div class="clear"></div>

					

					<input type="button" value="提交评论" id="tijiao">
				    </form><!-- .add_comments -->
                                <div class="clear"></div>
			    </div><!-- .tab2 .tab_body -->

			    <div class="tab3 tab_body">
				<h4>Custom Tab</h4>
				<div class="clear"></div>
			    </div><!-- .tab3 .tab_body -->
			    <div class="clear"></div>
			</div>​<!-- #wrapper_tab -->
			<div class="clear"></div>
		    </div><!-- .grid_12 -->
                    
		</article><!-- .product_page -->
                
                <div class="related grid_12">
                    
                        <div class="c_header">
                            <div class="grid_10">
                                <h2>热销产品</h2>
                            </div><!-- .grid_10 -->

                            <div class="grid_2">
                                <a id="next_c1" class="next arows" href="#"><span>Next</span></a>
                                <a id="prev_c1" class="prev arows" href="#"><span>Prev</span></a>
                            </div><!-- .grid_2 -->
                        </div><!-- .c_header -->

                        <div class="related_list">
                            <ul id="listing" class="products">
                            <?php if(is_array($hots)): $i = 0; $__LIST__ = $hots;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                                    <article class="grid_3 article">
                                        <img class="sale" src="/Public/Home/img/sale.png" alt="Sale">
                                        <div class="prev">
                                            <a href="/index.php/Home/Index/detail/id/<?php echo ($val["id"]); ?>"><img src="<?php echo ($val["goods_small_img"]); ?>" alt="Product 1" title=""></a>
                                        </div><!-- .prev -->
                        
                                        <h3 class="title"><?php echo ($val["goods_name"]); ?></h3>
                                        <div class="cart">
                                            <div class="price">
                                                <div class="vert">
                                                    $<?php echo ($val["goods_price"]); ?>
                                                    <div class="price_old">$<?php echo ($val["goods_ori_price"]); ?></div>
                                                </div>
                                            </div>
                                            <a href="#" class="obn"></a>
                                            <a href="#" class="like"></a>
                                            <a href="#" class="bay"><img src="/Public/Home/img/bg_cart.png" alt="Buy" title=""></a>
                                        </div><!-- .cart -->
                                    </article><!-- .grid_3.article -->
                                </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                            </ul><!-- #listing -->
                         </div><!-- .brands_list -->
                </div><!-- .related -->
                    
                <div class="clear"></div>
            </div><!-- #content -->

            <div class="clear"></div>
        </div><!-- .container_12 -->
    </section><!-- #main -->
    <div class="clear"></div>
        
    <!-- 底部导航栏 -->

    <footer>
        <div class="footer_navigation">
            <div class="container_12">
                <div class="grid_3">
                     <h3>联系我们</h3>
                    <ul class="f_contact">
                        <li>49 Archdale, 2B Charlestone</li>
                        <li>+777 (100) 1234</li>
                        <li>mail@example.com</li>
                    </ul><!-- .f_contact -->
                </div><!-- .grid_3 -->

                <div class="grid_3">
                    <h3>购物指南</h3>
                    <nav class="f_menu">
                        <ul>
                            <li><a href="#">购买流程</a></li>
                            <li><a href="#">支付方式</a></li>
                            <li><a href="#">配送信息</a></li>
                            <li><a href="#">退货流程</a></li>
                        </ul>
                    </nav><!-- .private -->
                </div><!-- .grid_3 -->

                <div class="grid_3">
                    <h3>帮助中心</h3>
                    <nav class="f_menu">
                        <ul>
                            <li><a href="#">在线客服</a></li>
                            <li><a href="#">留言反馈</a></li>
                            <li><a href="#">注册流程</a></li>
                            <li><a href="#">网站地图</a></li>
                        </ul>
                    </nav><!-- .private -->
                </div><!-- .grid_3 -->

                <div class="grid_3">
                    <h3>服务条款</h3>
                    <nav class="f_menu">
                        <ul>
                            <li><a href="#">终身保养</a></li>
                            <li><a href="#">注册协议</a></li>
                            <li><a href="#">隐私声明</a></li>
                            <li><a href="#">15天退换</a></li>
                        </ul>
                    </nav><!-- .private -->
                </div><!-- .grid_3 -->

                <div class="grid_12 newsletter-payments">
                    <div class="newsletter">
                        <div class="icon-mail">消息通知</div>
                        <p>请我们将会发送最新的活动信息给您</p>
                        <form>
                            <input type="submit" value="">
                            <input type="email" name="newsletter" value="" placeholder="输入你的邮箱地址">
                        </form>
                    </div><!-- .newsletter -->

                    <div class="payments">
                        <img src="/Public/Home/img/payments.png" alt="Payments">
                    </div><!-- .payments -->
                </div><!-- .grid_12.newsletter-payments -->

                <div class="clear"></div>
            </div><!-- .container_12 -->
        </div><!-- .footer_navigation -->

        <div class="footer_info">
            <div class="container_12">
                <div class="grid_6">
                    <p class="copyright">© Diamond Store Theme, 2013.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
                </div><!-- .grid_6 -->

                <div class="grid_6">
                    <div class="soc">
                        <a class="google" href="#"></a>
                        <a class="twitter" href="#"></a>
                        <a class="facebook" href="#"></a>
                    </div><!-- .soc -->
                </div><!-- .grid_6 -->

                <div class="clear"></div>
            </div><!-- .container_12 -->
        </div><!-- .footer_info -->
    </footer>



</body>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<script type="text/javascript">
$(function(){
    $('.bay').click(function(){   
            //获取当前对象选中的属性值的goods_attr_ids
            //获取所有选中值
            var s_size = $('.select_size').val();
            var s_m = $('.select_m').val();
            if(s_size == "请选择尺寸"){
                alert(s_size);
                return;
            }else if(s_m == '请选择材质'){
                alert(s_m);
                return;
            }
            var goods_attr_ids = '';
            goods_attr_ids = s_size + ',' + s_m;
            var idid = $('input[name=goods_id]').val();
            // console.log(idid);
            // 拼接参数
            var cart = idid + ',' + goods_attr_ids;
           $.ajax({
            'url':'/index.php/Home/Cart/addCart',
            'type':'post',
            'data':'cart='+cart,
            'datatype':'json',
            'success':function(response){
                if(response.code == 10000){
                alert('添加成功');
                }else{
                    alert(response.msg);
                    if(response.code == 10002){
                        location.href = "/index.php/Home/Login/login";
                    }else{
                        return;
                    }
                }
            }
       });
    });

// <input type="checkbox" id="test" checked="checked" />console.log(el.attr("checked")); //checked 
// console.log(el.prop("checked")); //true 
});
</script>
<script>
     $('#tijiao').click(function(){
        var zhiliang = $(':checked[name=quality]').val();
        var jiage = $(':checked[name=price]').val();
        var nicheng = $('.nicheng').val();
        // $('input[name=user_name]').val(nicheng);
        // $('input[name=review_title]').val(gaiyao);
        var plnr = $('.plnr').val();
        // $('input[name=review_user]').val(plnr);
        var id = $('input[name=goods_id]').val();
        var allr = {
            'user_name':nicheng,
            'review_content':plnr,
            'goods_id':id,
            'zhiliang':zhiliang,
            'jiage':jiage
            };
        
        // console.log(allr);return;
        $.ajax({
            'url':'/index.php/Home/Review/review',
            'type':'post',
            'data':allr,
            'dataType':'json',
            'success': function(response){
                if(response.code==10000){
                    alert(response.msg);
                }else{
                    alert(response.msg);
                }
            }
        });
    });
</script>
</html>