<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    
    <title>商品列表</title>
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
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/page.css">
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
                 <a href="index.html">主页</a><span></span><a href="#">列表页</a><span></span><span class="current"><?php echo ($name); ?></span>
            </div><!-- .grid_12 -->
        </div><!-- .container_12 -->
    </div><!-- .breadcrumbs -->
    
    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_9">
                <h1 class="page_title"><?php echo ($name); ?>列表</h1>
                 
                <div class="options">
                    <div class="sort">
        			按
        			<select>
        			    <option>价格</option>
        			    <option>时间</option>
        			    <option>名称</option>
        			</select>
        			 排序   
        			<a class="sort_up" href="#">&#8593;</a>
        		    </div><!-- .sort -->
                            
        		    <div class="grid-list">
                    <a class="grid" href="/index.php/Home/List/index/list_sty/2"><span></span></a>
        			<a class="list current" href="/index.php/Home/Index/index"><span></span></a>
        		    </div><!-- .grid-list -->
		    
                </div><!-- .options -->
                <div class="clear"></div>
                
                <div class="products_list catalog">  
                <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><article>

            			<div class="grid_3">
            			    <img class="sale" src="/Public/Home/img/sale.png" alt="Sale">
            			    <div class="prev">
            				<a href="/index.php/Home/Index/detail/id/<?php echo ($val["id"]); ?>"><img src="<?php echo ($val["goods_small_img"]); ?>" alt="Product 2" title=""></a>
            			    </div><!-- .prev -->
            			</div><!-- .grid_3 -->
            				
            			<div class="grid_6">
            			    <div class="entry_content">
            				<a href="product_page.html"><h3 class="title"><?php echo ($val["goods_name"]); ?></h3></a>
                                            <p><?php echo ($val["goods_introduce"]); ?> <a class="more" href="/index.php/Home/Index/detail/id/<?php echo ($val["id"]); ?>">查看更多</a></p>
                                        </div><!-- .entry_content -->
                                        
                                        <div class="price">
                                            <div class="price_old">$<?php echo ($val["goods_ori_price"]); ?></div>
            				$<?php echo ($val["goods_price"]); ?>
            			    </div>
                                            
            			    <div class="review">
            				<a class="plus" href="#"></a>
            				<a class="plus" href="#"></a>
            				<a class="plus" href="#"></a>
            				<a href="#"></a>
            				<a href="#"></a>
            				<span><strong>3</strong> 评论(S)</span>
            			    </div>
            				
                                        <div class="cart">
                                            <a href="/index.php/Home/Index/detail/id/<?php echo ($val["id"]); ?>"  class="bay"><img src="/Public/Home/img/bg_cart.png" alt="Buy" title="">添加到购物车</a>
                                            <a href="javascript:void(0);" goods_id="<?php echo ($val["id"]); ?>" class="like"><img src="/Public/Home/img/like.png" alt="" title=""> 收藏</a>
                                            <a href="javascript:void(0);" class="obn"><img src="/Public/Home/img/obl.png" alt="" title="">分享</a>
                                        </div><!-- .cart -->
            			</div><!-- .grid_6 -->
            			<div class="clear"></div>
		            </article><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                    
                    
                    <div class="clear"></div>
                </div><!-- .products_list -->
                <div class="clear"></div>
	      
                <div class="pagination">
                <div class="technorati">
                    <?php echo ($page_html); ?>
                </div>
		    <!-- <ul>
			<li class="prev"><span>&#8592;</span></li>
			<li class="curent"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><span>...</span></li>
			<li><a href="#">100</a></li>
			<li class="next"><a href="#">&#8594;</a></li>
		    </ul> -->
                </div><!-- .pagination -->
                <p class="pagination_info">显示 1 to 12 (共 <?php echo ($total); ?> 个商品)</p>
                
                <div class="clear"></div>
            </div><!-- #content -->
            
            <div id="sidebar" class="grid_3">
                <aside id="categories_nav">
		    <header class="aside_title">
                        <h3>分类</h3>
            </header>

		    <nav class="right_menu">
			<ul>
			<?php if(is_array($cate_all)): $i = 0; $__LIST__ = $cate_all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/List/index/cate_id/<?php echo ($val["id"]); ?>"><?php echo ($val["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		    </nav><!-- .right_menu -->
                </aside><!-- #categories_nav -->
                
                <aside id="shop_by">
                    <header class="aside_title">
                        <h3>查找</h3>
                    </header>
		     
		    <div class="currently_shopping">
			<h4>按条件查找：</h4>
			<ul>
			    <li><a title="close" class="close" href="#"></a>价格区间: <span>$0.00 - $999.99</span></li>
			    <li><a title="close" class="close" href="#"></a>系列: <span>周大生</span></li>
			</ul>
			    
			<a class="clear_all" href="#">清除所有</a>
			    
			<div class="clear"></div>
		    </div><!-- .currently_shopping -->
		     
		    <h4 class="sub_title">类别</h4>
                    
                    <nav class="check_opt">
			<ul>
			    <li><a href="#">白金 (23)</a></li>
			    <li><a href="#">黄金 (27)</a></li>
			    <li><a href="#">纯银 (9)</a></li>
			</ul>
		    </nav><!-- .check_opt -->
		     
		    <h4 class="sub_title">价格</h4>

                    <nav class="check_opt price">
			<ul>
			    <li><a href="#">0.00 - $49.99 (21)</a></li>
			    <li><a href="#">$50.00 - $99.99 (7)</a></li>
			    <li><a href="#">$100.00 and above (15)</a></li>
			</ul>
		    </nav><!-- .check_opt -->
                </aside><!-- #shop_by -->

                <aside id="specials" class="specials">
                    <header class="aside_title">
                        <h3>特价商品</h3>
                    </header>

		    <ul>
			<li>
			    <div class="prev">
				<a href="#"><img src="/Public/Home/img/content/product7.png" alt="Product 7" title=""></a>
			    </div>

			    <div class="cont">
				<a href="#">周大生</a>
				<div class="prise"><span class="old">$1770.00</span> $750.00</div>
			    </div>
			</li>

			<li>
			    <div class="prev">
				<a href="#"><img src="/Public/Home/img/content/product1.png" alt="Product 1" title=""></a>
			    </div>

			    <div class="cont">
				<a href="#">卡地亚TIFFANY</a>
				<div class="prise"><span class="old">$1770.00</span> $750.00</div>
			    </div>
			</li>
		     </ul>
                </aside><!-- #specials -->

                <aside id="compare_products">
                    <header class="aside_title">
                        <h3>相似产品</h3>
                    </header>

		    <ul>
			<li><a title="close" class="close" href="#"></a>纯手工切割翡翠钻石</li>
			<li><a title="close" class="close" href="#"></a>情侣对戒创意款</li>
			<li><a title="close" class="close" href="#"></a>稀世粉钻</li>
		    </ul>

		    <button class="compare">比较</button>
		    <a class="clear_all" href="#">全部清除</a>

		    <div class="clear"></div>
                </aside><!-- #compare_products -->

                <aside id="newsletter_signup">
                    <header class="aside_title">
                        <h3>店铺消息</h3>
                    </header>

		    <p>最新店铺更新消息都在这里。。。</p>

		    <form class="newsletter">
			<input type="email" name="newsletter" class="your_email" value="" placeholder="写下你的邮箱地址">
			<input type="submit" id="submit" value="点击订阅">
		    </form>
                </aside><!-- #newsletter_signup -->
                
            </div><!-- .sidebar -->
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
    $('.like').click(function(){

        var id = $(this).attr('goods_id');

        $.ajax({
            'url':'/index.php/Home/Wish/addWish',
            'type':'post',
            'data': 'id='+id,
            'dataType':'json',
            'success':function(response){
                console.log(response);
                alert(response.msg);
            }
        })
    })


})
</script>
</html>