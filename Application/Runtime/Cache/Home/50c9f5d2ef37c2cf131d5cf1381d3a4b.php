<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    
    <title>用户登录</title>
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

    <section id="main" class="page-login">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">登录或者创建一个帐户</h1>
                </header>
                    
                <article>
                    <div class="grid_6 new_customers">
			<h2>新客户</h2>
			<p>通过在我们的商店创建一个帐户，您将能够更快地浏览结帐过程，存储多个送货地址，查看和跟踪您的订单在您的帐户和更多。</p>
			<div class="clear"></div>
			<a href="/index.php/Home/Login/register"><button class="account">创建一个账户</button></a>
                    </div><!-- .grid_6 -->
		
                    <div class="grid_6 registed_form">
			<form class="registed" action="/index.php/Home/Login/login.html" method="post">
			    <h2>客户登录</h2>
			    <p>如果您有我们的帐户，请登录.</p>
			    <div class="email">
				<strong>电邮地址：</strong><sup>*</sup><br>
				<input type="email" name="email" class="" value="">
			    </div><!-- .email -->
			    <div class="password">
				<strong>密码：</strong><sup>*</sup><br>
				<input type="password" name="password" class="" value=""  >
			    </div><!-- .password -->
			    <div class="remember">
				<input class="niceCheck" type="checkbox" name="Remember_password">
				<span class="rem">记住密码</span>
			    </div><!-- .remember -->
			    <div class="submit">										
				<input type="submit" value="登录">
                                <a class="forgot" href="#">忘记密码?</a>
				<sup>*</sup><span>必填项</span>
			    </div><!-- .submit -->
			</form><!-- .registed -->
                    </div><!-- .grid_6 -->
		</article>
                    
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

</html>