<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo ($sysmanage["title"]); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="keywords" content="<?php echo ($sysmanage["keywords"]); ?>">
	<meta name="description" content="<?php echo ($sysmanage["description"]); ?>">
    <meta content="" name="author" />

    <!-- 全局CSS开始 -->          
    <link href="__PUBLIC__/Home/Plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- 全局CSS结束 -->
   
    <!-- 首页CSS开始 --> 
    <link href="__PUBLIC__/Home/Plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />              
    <link href="__PUBLIC__/Home/Plugins/revolution_slider/css/rs-style.css" rel="stylesheet" media="screen">
    <link href="__PUBLIC__/Home/Plugins/revolution_slider/rs-plugin/css/settings.css" rel="stylesheet" media="screen">

    <link href="__PUBLIC__/Home/Plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />                
    <!-- 首页CSS结束 -->

    <!-- 项目页CSS开始 -->
    <link href="__PUBLIC__/Home/Css/projects-details.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Css/pages/portfolio.css" rel="stylesheet" type="text/css"/>
    
    <!-- 通用主题CSS开始 --> 
    <link href="__PUBLIC__/Home/Css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Css/style.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="__PUBLIC__/Home/Css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- 通用主题CSS结束 -->
    <link href="__PUBLIC__/Home/Css/pages/portfolio.css" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="__PUBLIC__/Home/Images/favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
    <!-- 样式设置菜单开始 -->
    <div class="color-panel hidden-sm">
        <div class="color-mode-icons icon-color"></div>
        <div class="color-mode-icons icon-color-close"></div>
        <div class="color-mode">
            <p>主题颜色</p>
            <ul class="inline">
                <li class="color-blue current color-default" data-style="blue"></li>
                <li class="color-red" data-style="red"></li>
                <li class="color-green" data-style="green"></li>
                <li class="color-orange" data-style="orange"></li>
            </ul>
            <label>
                <span>头部</span>
                <select class="header-option form-control input-small">
                    <option value="default" selected>默认</option>
                    <option value="fixed">固定</option>
                </select>
            </label>
        </div>
    </div>
    <!-- 样式设置菜单结束 -->     

    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
        <!-- BEGIN TOP BAR -->
        <div class="front-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <ul class="list-unstyle inline">
                            <li><i class="fa fa-phone topbar-info-icon top-2"></i>联系电话: <span><?php echo ($sysmanage["phone"]); ?></span></li>
                            <li class="sep"><span>|</span></li>
                            <li><i class="fa fa-envelope-o topbar-info-icon top-2"></i>电子邮箱: <span><?php echo ($sysmanage["email"]); ?></span></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-3 login-reg-links">
                        <ul class="list-unstyled inline">
                            <?php if($_SESSION['user']== null): ?><li><a href="__APP__/Login/login">登录</a></li>
                                <li class="sep"><span>|</span></li>
                                <li><a href="__APP__/Login/register">注册</a></li>
                            <?php else: ?>
                            <li><span>欢迎你，<?php echo ($_SESSION['user']['uname']); ?> </span></li>
                                <li><a href="__APP__/User/index">会员中心</a></li>
                                <li class="sep"><span>|</span></li>
                                <li><a href="__APP__/Login/logout">登出</a></li><?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>        
        </div>
        <!-- END TOP BAR -->
		<div class="container">
			<div class="navbar-header">
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN LOGO (you can use logo image instead of text)-->
				<a class="navbar-brand logo-v1" href="__APP__" style="padding:0;padding-left:20px">
					<img src="__PUBLIC__/Home/Images/logo.png" id="logoimg" alt="logo">
				</a>
				<!-- END LOGO -->
			</div>
		
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
                    <!--<li class="dropdown active">-->
                    <li>
                        <a href="__APP__/Projects/add">
                        	发布项目
                            <i class="fa fa-angle-right"></i>
                        </a>
					</li>           
					<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            寻找会员
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                        	<li><a href="__APP__/Developers/index">寻找开发者</a></li>
                        	<li><a href="__APP__/Employers/index">寻找雇佣者</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="__APP__/Projects/index">
                        	浏览项目
                        	<i class="fa fa-angle-right"></i>
                        </a>
					</li>                   
					<li><a href="__APP__/Help" >帮助</a></li>
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="#">
                                <div class="input-group input-large">
                                    <input class="form-control" type="text" placeholder="搜索">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn theme-btn">Go</button>
                                    </span>
                                </div>
                            </form>
                        </div> 
                    </li>
                </ul>                         
            </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
		</div>
    </div>
    <!-- END HEADER -->

<!-- BEGIN PAGE CONTAINER -->  
    <div class="page-container" >
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs margin-bottom-40">
            <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1>用户注册</h1>
                </div>
                <div class="col-md-8 col-sm-8">
                    <ul class="pull-right breadcrumb">
                        <li><a href="__APP__">主页</a></li>
                        <li class="active">用户注册</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END BREADCRUMBS -->

        <!-- BEGIN CONTAINER -->
        <div class="container">
          <div class="row" style="margin-bottom:40px;">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 login-signup-page">
                <form id="signupForm" action="__URL__/checkRegister" method="post">           
					<div class="alert alert-warning fade in" id="warn" style="display:none">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>你有信息没有填写!</strong>
					</div> 
                    <h2>注册用户</h2>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <div class="input-icon right"> 
                            <!--提示信息-->
							<i class="fa"></i>
                            <input id="uname" name="uname" type="text" class="form-control" placeholder="用户名">
                        </div>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<div class="input-icon right"> 
							<!--提示信息-->
							<i class="fa"></i>
							<input id="email" name="email" type="text" class="form-control" placeholder="电子邮箱">
						</div>
                    </div>    
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<div class="input-icon right">
							<!--提示信息-->
							<i class="fa"></i>
							<input id="pwd" type="password" name="pwd"  class="form-control" placeholder="创建密码">
						</div>
                    </div>
                    <div class="input-group margin-bottom-20 "  class="has-error">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<div class="input-icon right" >
							<!--提示信息-->
							<i class="fa"></i>
							<input id="repwd" type="password" name="repwd"  class="form-control" placeholder="再次输入密码">
						</div>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <strong>我想：</strong>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <div class="btn-group" data-toggle="buttons">
                            <button class="btn btn-default">
                                <input type="radio" name="rank" value="0" checked="checked"/>工作
                            </button>
                            <button class="btn btn-default">
                                <input type="radio" name="rank" value="1" checked=""/>雇佣
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" name="sub" id="sub" class="btn theme-btn pull-right">注册</button>
                        </div>
                    </div>

                    <hr>

                    <div class="login-socio">
                        <p class="text-muted">用其他方式登录:</p>
                        <ul class="social-icons">
                            <li><a class="yahoo" data-original-title="yahoo" href="#"></a></li>
                            <li><a class="amazon" data-original-title="amazon" href="#"></a></li>
                            <li><a class="googleplus" data-original-title="Goole Plus" href="#"></a></li>
                            <li><a class="skype" data-original-title="skype" href="#"></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <!-- END CONTAINER -->
        <div class="container">
        <!-- 数据实时刷新开始 -->
            <div class="row no-space-steps margin-bottom-40">
                <div class="col-md-4 col-sm-4">
                    <div class="front-steps front-step-one">
                        <h2><?php echo ($statistics['users']); ?></h2>
                        <p>用户</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="front-steps front-step-two">
                        <h2><?php echo ($statistics['projects']); ?></h2>
                        <p>需求</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="front-steps front-step-three">
                        <h2><?php echo ($statistics['account']); ?></h2>
                        <p>项目金额</p>
                    </div>
                </div>
            </div>
            <!-- 数据实时刷新结束 -->
        </div>
        <!-- END CONTAINER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- 页脚开始 -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 space-mobile">
                    <!-- 关于开始 -->                    
                    <h2>关于</h2>
                    <p class="margin-bottom-5"><a href="#">关于我们</a></p>
                    <p class="margin-bottom-5"><a href="__APP__/Help">网站常见问题及帮助</a></p>
                    <p class="margin-bottom-5"><a href="#">网站安全性的说明及保障</a></p>
                    <p class="margin-bottom-5"><a href="#">网站资费标准及收费条款</a></p>
                    <div class="clearfix"></div>                    
                    <!-- 关于结束 -->                              
                </div>
                <div class="col-md-4 col-sm-4 space-mobile">
                    <!-- 联系我们 -->                                    
                    <h2>联系我们</h2>
                    <address class="margin-bottom-40">
                        中国， 河南省 <br />
                        漯河市，意象图文网络工作室 <br />
                        P: (0395) 8888-8888 <br />
                        Email: <a href="mailto:<?php echo ($sysmanage["email"]); ?>"><?php echo ($sysmanage["email"]); ?></a>                        
                    </address>
                    <!-- 联系我们 -->                                    
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- 友情链接 -->                                                    
                    <h2>友情链接</h2>
                    <div class="blog-photo-stream margin-bottom-30">
                        <ul class="list-unstyled">
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/people/img5-small.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/works/img1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/people/img4-large.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/works/img6.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/pics/img1-large.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/pics/img2-large.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/works/img3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/people/img2-large.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/works/img2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="__PUBLIC__/Home/Images/works/img5.jpg" alt=""></a></li>
                        </ul>                    
                    </div>
                    <!-- 友情链接结束 -->                                                                        
                </div>
            </div>
        </div>
    </div>
    <!-- 页脚结束 -->

    <!-- 版权信息开始 -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <p>
                        <span class="margin-right-10">2014 © yxtuwen 版权所有</span> 
                        <a href="#">隐私策略</a> | <a href="#">服务条款</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <ul class="social-footer">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-dropbox"></i></a></li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>
    <!-- 版权信息结束 -->

    <!-- 在页脚载入JS会减少载入时间 -->
    <!-- 核心JS开始 -->
    <!--[if lt IE 9]>
    <script src="__PUBLIC__/Home/Plugins/respond.min.js" type="text/javascript"></script>  
    <![endif]-->  
    <script src="__PUBLIC__/Home/Plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="__PUBLIC__/Home/Plugins/hover-dropdown.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Plugins/back-to-top.js" type="text/javascript"></script>    
    <!-- 核心JS结束 -->

    <!-- 前台首页JS开始 -->
    <script type="text/javascript">
        var mypublic = '__PUBLIC__';
    </script>
    <script src="__PUBLIC__/Home/Plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>  
    <script src="__PUBLIC__/Home/Plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
    <script src="__PUBLIC__/Home/Plugins/bxslider/jquery.bxslider.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Js/app.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Home/Js/intro.js" type="text/javascript"></script>
    <!-- 前台首页JS结束 -->

    <!-- 登录注册页JS开始 -->
    <!--引入jquery 验证-->
	<script type="text/javascript" src="__PUBLIC__/Home/Plugins/jquery-validation/dist/additional-methods.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Home/Plugins/jquery-validation/dist/jquery.validate.min.js"></script>  	
	<script type="text/javascript" src="__PUBLIC__/Home/Plugins/jquery-validation/dist/messages_cn.js"></script>
	<!-- 自定义注册登陆验证js-->
	<script type="text/javascript" src="__PUBLIC__/Home/Js/signup.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Home/Js/loginyz.js"></script>
    <!-- 登录注册页JS结束 -->

    <!-- 项目页JS开始 -->
    <script src="__PUBLIC__/Home/Plugins/jquery.mixitup.min.js"></script>
    <script src="__PUBLIC__/Home/Js/portfolio.js"></script>
    <!-- 项目页JS结束 -->
    
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();    
            App.initBxSlider();
            Index.initRevolutionSlider();
            Portfolio.init(); //项目页JS
        });
    </script>
</body>
<!-- END BODY -->
</html>