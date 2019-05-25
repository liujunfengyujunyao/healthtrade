<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    
    <title>Shoping cart</title>
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

    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">购物车</h1>
                </header>
                    
                <article>
                    <table class="cart_product">
                        <tr class="bg">
                            <th class="images"></th>
                            <th class="name">产品名称</th>
                            <th class="edit">属性</th>
                            <th class="price">单价</th>
                            <th class="">数量</th>
                            <th class="subtotal total_sm">小计</th>
                            <th class="close"> </th>
                        </tr>
                        <form>
                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr  goods_id="<?php echo ($val["goods_id"]); ?>" goods_attr_ids="<?php echo ($val["goods_attr_ids"]); ?>" cart_id="<?php echo ($val["id"]); ?>" class="cart">
                                <td class="images"><a href="/index.php/Home/Index/detail/id/<?php echo ($val["goods_id"]); ?>"><img src="<?php echo ($val["goods_small_img"]); ?>" alt="Product 12" title=""></a></td>
                                <td class="name"><?php echo ($val["goods_name"]); ?></td>
                                <td class="price_one">
                                <?php if(is_array($val["goods_attr"])): $i = 0; $__LIST__ = $val["goods_attr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val_attr): $mod = ($i % 2 );++$i; echo ($val_attr["attr_name"]); ?>:<?php echo ($val_attr["attr_value"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
                                </td>
                                <td class="price price_one"><?php echo ($val["goods_price"]); ?></td>
                                <td class="" num="<?php echo ($val["goods_number"]); ?>" width="200px">
                                   <input align="" class="sup_num" name=""  type="button" value=" &nbsp&nbsp+ &nbsp&nbsp" /><br/>
                                    <input class="ori_num" type="text" name=""  value="<?php echo ($val["goods_number"]); ?>" placeholder="<?php echo ($val["goods_number"]); ?>"><br/>
                                    <input class="sub_num" name="" type="button" value=" &nbsp&nbsp- &nbsp&nbsp" />
                                </td>
                                <td class="subtotal one_row"><?php echo ($val[goods_price] * $val[goods_number]); ?></td>
                                <td class="close1"><a title="" class="close close_" href="javascript:void(0);"></a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </form>
                        <tr>
                            <td colspan="7" class="cart_but">
                                <a href="/index.php/Home/Index/index" class="continue"><img src="/Public/Home/img/cont.png" alt="" title=""> 继续购物</a>
                                <a href="/index.php/Home/Cart/index" class="update"><img src="/Public/Home/img/update.png" alt="" title=""> 更新购物车</a>
                            </td>
                        </tr>
                    </table>
                    
                    <div id="cart_forms">
                        <div class="grid_4">
                            <div class="bottom_block estimate">
                                <h3>估计运费和税金</h3>
                                <p>输入您的目的地以获得运费预估。</p>
                                <form>
                                    <p>
                                        <strong>国家:</strong><sup>*</sup><br>
                                        <select>
                                            <option>中国</option>
                                            <option>韩国</option>
                                        </select>
                                    </p>
                                    <p>
                                        <strong>州省:</strong><br>
                                        <select class="bottom-index">
                                            <option>请选择地区，州或省</option>
                                            <option>请选择地区，州或省</option>
                                        </select>
                                    </p>
                                    <p>
                                        <strong>邮编/邮政编码</strong><br>
                                        <input type="text" name="" value="">
                                    </p>
                                    <input type="submit" id="get_estimate" value="获取报价">
                                </form>

                            </div><!-- .estimate -->
                        </div><!-- .grid_4 -->

                        <div class="grid_4">
                            <div class="bottom_block discount">
                                <h3>折扣代码</h3>
                                <p>输入您的优惠券代码（如果有）。</p>
                                <form>
                                    <p><input type="text" name="" value=""></p>
                                    <input type="submit" id="apply_coupon" value="申请优惠券">
                                </form>
                            </div><!-- .discount -->
                        </div><!-- .grid_4 -->

                        <div class="grid_4">
                            <div class="bottom_block total">
                                <table class="subtotal">
                                    <tr>
                                        <td></td><td class=""></td>
                                    </tr>
                                    <tr class="grand_total">
                                        <td>累计</td><td class="price ">$<span class="total_cart"></span></td>
                                    </tr>
                                </table>
                                <button class="checkout">进行结算 <img src="/Public/Home/img/checkout.png" alt="" title=""></a></button>
                            </div><!-- .total -->
                        </div><!-- .grid_4 -->

                        <div class="clear"></div>
                    </div><!-- #cart_forms -->
                    <div class="clear"></div>
		</article>
                
      
                <div class="clear"></div>
            </div><!-- #content -->

            <div class="clear"></div>
        </div><!-- .container_12 -->
    </section><!-- #main -->
    <div class="clear"></div>
        

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
                    <p class="copyright">© Healthtrade Store Theme, 2013.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
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
    var changetotal = function(){
        var one_row = $('.one_row');
        var total_price = 0;
        $.each(one_row,function(i,v){
            var row_price = parseFloat($(v).text());
            total_price += row_price;
        });
        $('.total_cart').text(total_price);
     }
    changetotal();
        
    var changenum = function(new_num,e){
        var data = {
            'goods_num':new_num,
            'goods_id':$(e).closest('tr').attr('goods_id'),
            'goods_attr_ids':$(e).closest('tr').attr('goods_attr_ids')
        };
        $.ajax({
            'url':'/index.php/Home/Cart/ajaxchangenum',
            'type':'post',
            'data':data,
            'dataType':'json',
            'success':function(response){
                if(response.code != 10000){
                    alert(response.msg);
                    return;
                }else{
                    var now_price = parseFloat($(e).closest('tr').find('.price_one').text());
                    var row_price = now_price * new_num;
                    $(e).closest('tr').find('.total_sm').text(row_price);
                    $(e).parent().attr('num',new_num);
                    changetotal();
                    location.reload();
                }
            }
        });
    };

       
   // 加一
    $('.sup_num').click(function(){
        var ori_num = parseInt($(this).closest('td').find('.ori_num').val());
        var new_num = ori_num + 1;
        if(new_num > 100){
        return;
        }
        $(this).closest('td').find('.ori_num').val(new_num);
        changenum(new_num,this);
    });
    $('.sub_num').click(function(){
        var ori_num = parseInt($(this).closest('td').find('.ori_num').val());
        var new_num = ori_num - 1;
        if(new_num < 1){
            return;
        }
        $(this).closest('td').find('.ori_num').val(new_num);
        changenum(new_num,this);
    });
    $('.ori_num').change(function(){
        var ori_num = parseInt($(this).val());
        if(ori_num <1 || ori_num >100){
            alert('购买数量有误');
            ori_num = parseInt($(this).parent().attr('num'));
            $(this).val(ori_num);
            return;
        }
        changenum(ori_num,this);
    });

    //
    $('.close_').click(function(){
        var data = {
         'goods_id':$(this).closest('tr').attr('goods_id'),
         'goods_attr_ids':$(this).closest('tr').attr('goods_attr_ids')
            };
            var _this = this;
        $.ajax({
            'url':'/index.php/Home/Cart/delCart',
            'type':'post',
            'dataType':'json',
            'data':data,
            'success':function(response){
            if(response.code !== 10000){
                    return;
                }else{
                    $(_this).closest('tr').remove();
                }

            }
        });
    });
    $('.checkout').click(function(){
        var cart = $('.cart');
        var cart_ids = "";
        $.each(cart,function(i,v){
            cart_ids += $(v).attr('cart_id')+','; 
        });
        cart_ids = cart_ids.slice(0,-1);
        location.href = "/index.php/Home/Cart/flow/cart_ids/"+ cart_ids;
    });
});

</script>
</html>