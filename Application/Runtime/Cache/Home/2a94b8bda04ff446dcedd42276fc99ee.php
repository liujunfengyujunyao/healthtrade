<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">

    <title>钻石商城</title>
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
                            <a href="#">Healthtrade系列</a>
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

    <div id="slider_body">
        <ul id="slider">
        <?php if(is_array($goods3)): $i = 0; $__LIST__ = $goods3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                <div class="slid_content">
                    <h2 style="color:#6f566f;"><?php echo ($val["goods_name"]); ?></h2>
                    <p style="color:#6f566f;"><?php echo ($val["goods_introduce"]); ?><br>
                    
                    </p>
                    <a class="buy_now" href="/index.php/Home/Index/detail/id/<?php echo ($val["id"]); ?>">立即购买</a>
                </div><!-- .slid_content -->
                <img src="/Public/Home/img/content/slid-<?php echo ($val["id"]); ?>.png" alt="Slid 1" title="">
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div><!-- #slider_body -->
    
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>

    <div id="home_banners">
        <div class="container_12">
            <div class="grid_6">
                <a href="#" class="banner banner1"><strong>包邮</strong> 只需满$500</a>
            </div><!-- .grid_6 -->

            <div class="grid_6">
                <a href="#" class="banner banner2"><strong>疯狂折扣</strong> 最新活动款!</a>
            </div><!-- .grid_6 -->
        </div>
    </div><!-- #home_banners -->

    <section id="main" class="home">
        <div class="container_12">
            <div id="content">
                <div class="grid_12">
                    <h2 class="product-title">经典产品</h2>
                </div><!-- .grid_12 -->

                <div class="clear"></div>

                <div class="products">
                <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><article class="grid_3 article">
                        <img class="sale" src="/Public/Home/img/sale.png" alt="Sale">
                        <div class="prev">
                            <a href="/index.php/Home/Index/detail/id/<?php echo ($val["id"]); ?>"><img src="<?php echo ($val["goods_small_img"]); ?>" alt="Product 1" title=""></a>
                        </div><!-- .prev -->

                        <h3 class="title"><?php echo ($val["goods_name"]); ?><br> Emerald Ring</h3>
                        <div class="cart">
                            <div class="price">
                                <div class="vert">
                                    $ <?php echo ($val["goods_price"]); ?>
                                    <div class="price_old">$<?php echo ($val["goods_ori_price"]); ?></div>
                                </div>
                            </div>
                            <a href="#" class="obn"></a>
                            <a href="javascript:void(0);" class="like" goods_id="<?php echo ($val["id"]); ?>"></a>
                            <a href="#" class="bay"><img src="/Public/Home/img/bg_cart.png" alt="Buy" title=""></a>
                        </div><!-- .cart -->
                    </article><!-- .grid_3.article --><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="clear"></div>
                </div><!-- .products -->
                <div class="clear"></div>
            </div><!-- #content -->
            <div class="clear"></div>
            <div id="brands">
                <div class="c_header">
                    <div class="grid_10">
                        <h2>系列美文</h2>
                    </div><!-- .grid_10 -->

                    <div class="grid_2">
                        <a id="next_c1" class="next arows" href="#"><span>Next</span></a>
                        <a id="prev_c1" class="prev arows" href="#"><span>Prev</span></a>
                    </div><!-- .grid_2 -->
                </div><!-- .c_header -->

                <div class="brands_list">
                    <ul id="listing">
                    <?php if(is_array($series)): $i = 0; $__LIST__ = $series;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                            <div class="grid_2">
                                <a href="/index.php/Home/Blog/index/id/<?php echo ($val["id"]); ?>" target="_blank"><div><img src="/Public/Home/img/content/brand<?php echo ($val["id"]); ?>.png" alt="Brand 1" title=""><?php echo ($val["series_name"]); ?></div></a>

                            </div><!-- .grid_2 -->
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul><!-- #listing -->
                </div><!-- .brands_list -->
            </div><!-- #brands -->
            <div id="content_bottom">
                <div class="grid_6">
                    <div class="bottom_block about_as">
                        <h3>关于我们</h3>
                        <p>Lorem ipsum, libero et luctus molestie, turpis mi sagittis nisl, a scelerisque leo nulla et lectus pendisse dictum posuere elit, in congue nisl varius lentesque a tellus eget quam varius aliquet.</p>
                        <p>Pellentesque tristique, libero et luctus molestie, turpis a scelerisque leo nulla et lectus pendisse dictum posuere elit. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <p>In congue nisl varius quis lentesque a tellus eget quam varius aliquet. Vel lobortis gravida.  Many desktop publishing packages and web page .</p>
                    </div><!-- .about_as -->
                </div><!-- .grid_6 -->

                <div class="grid_6">
                    <div class="bottom_block news">
                        <h3>活动公告</h3>
                        <ul>
                            <li>
                                <time datetime="2012-03-03">3 january 2012</time>
                                <a href="#">Fermentum parturient lacus tristique habitant nullam morbi et odio nibh mus dictum tellus erat.</a>
                            </li>

                            <li>
                                <time datetime="2012-02-03">2 january 2012</time>
                                <a href="#">Cras ac hendrerit dui. Duis lacus ligula, luctus ac tristique eget, posuere id erat. Many desktop publishing packages and web page editors now use.</a>
                            </li>

                            <li>
                                <time datetime="2012-01-03">1 january 2012</time>
                                <a href="#">Lorem ipsum, libero et luctus molestie, turpis mi sagittis nisl, a scelerisque leo nulla et lectus.</a>
                            </li>
                        </ul>
                    </div><!-- .news -->
                </div><!-- .grid_6 -->
                <div class="clear"></div>
            </div><!-- #content_bottom -->
        </div><!-- .container_12 -->
    </section><!-- #main.home -->

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
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack <--></-->
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


</script>>
</html>