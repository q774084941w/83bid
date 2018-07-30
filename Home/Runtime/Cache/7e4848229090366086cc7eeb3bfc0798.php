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

    <link rel="shortcut icon" href="<?php echo ($sysmanage["icon"]); ?>" />
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
					<img src="<?php echo ($sysmanage["logo"]); ?>" id="logoimg" alt="logo">
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
    <div class="page-container">
        <!-- 图片轮播开始 -->    
        <div class="fullwidthbanner-container slider-main">
            <div class="fullwidthabnner">
                <ul id="revolutionul" style="display:none;">
                        <!-- 初始幕 -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="__PUBLIC__/Home/Images/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- 初始幕背景图片 -->
                            <img src="__PUBLIC__/Home/Images/sliders/revolution/bg9.jpg" alt="">
                            
                            <div class="caption lft slide_title_white slide_item_left"
                                 data-x="30"
                                 data-y="90"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutExpo">
                                 网站<br><span class="slide_title_white_bold">开发</span>
                            </div>
                            <div class="caption lft slide_subtitle_white slide_item_left"
                                 data-x="87"
                                 data-y="245"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 期待技术精英
                            </div>
                            <a class="caption lft btn dark slide_btn slide_item_left" href="__APP__/Projects/index"
                                 data-x="187"
                                 data-y="315"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 立即竞标!
                            </a>                        
                            <div class="caption lfb"
                                 data-x="640" 
                                 data-y="0" 
                                 data-speed="700" 
                                 data-start="1000" 
                                 data-easing="easeOutExpo"  >
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/lady.png" alt="Image 1">
                            </div>
                        </li>            
                        <!-- 第一幕 -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="__PUBLIC__/Home/Images/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- 第一幕背景图片 -->
                            <img src="__PUBLIC__/Home/Images/sliders/revolution/bg1.jpg" alt="">
                            
                            <div class="caption lft slide_title slide_item_left"
                                 data-x="0"
                                 data-y="105"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutExpo">
                                 有网站设计需求? 
                            </div>
                            <div class="caption lft slide_subtitle slide_item_left"
                                 data-x="0"
                                 data-y="180"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 这就是你所寻找的
                            </div>
                            <div class="caption lft slide_desc slide_item_left"
                                 data-x="0"
                                 data-y="220"
                                 data-speed="400"
                                 data-start="2500"
                                 data-easing="easeOutExpo">
                                 精英云集<br>
                                 佣金低廉
                            </div>
                            <a class="caption lft btn green slide_btn slide_item_left" href="__APP__/Projects/index"
                                 data-x="0"
                                 data-y="290"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 立即查看!
                            </a>                        
                            <div class="caption lfb"
                                 data-x="640" 
                                 data-y="55" 
                                 data-speed="700" 
                                 data-start="1000" 
                                 data-easing="easeOutExpo"  >
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/man-winner.png" alt="Image 1">
                            </div>
                        </li>

                        <!-- 第二幕 -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-delay="9400" data-thumb="__PUBLIC__/Home/Images/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- 第二幕背景图片 -->
                            <img src="__PUBLIC__/Home/Images/sliders/revolution/bg2.jpg" alt="">
                            <div class="caption lfl slide_title slide_item_left"
                                 data-x="0"
                                 data-y="125"
                                 data-speed="400"
                                 data-start="3500"
                                 data-easing="easeOutExpo">
                                 功能强大 & 界面简洁
                            </div>
                            <div class="caption lfl slide_subtitle slide_item_left"
                                 data-x="0"
                                 data-y="200"
                                 data-speed="400"
                                 data-start="4000"
                                 data-easing="easeOutExpo">
                                 响应式布局 & 多种主题可选
                            </div>
                            <div class="caption lfl slide_desc slide_item_left"
                                 data-x="0"
                                 data-y="245"
                                 data-speed="400"
                                 data-start="4500"
                                 data-easing="easeOutExpo">
                                 兼容设备:电脑 平板 手机
                            </div>                        
                            <div class="caption lfr slide_item_right" 
                                 data-x="635" 
                                 data-y="105" 
                                 data-speed="1200" 
                                 data-start="1500" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/mac.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="580" 
                                 data-y="245" 
                                 data-speed="1200" 
                                 data-start="2000" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/ipad.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="735" 
                                 data-y="290" 
                                 data-speed="1200" 
                                 data-start="2500" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/iphone.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="835" 
                                 data-y="230" 
                                 data-speed="1200" 
                                 data-start="3000" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/macbook.png" alt="Image 1">
                            </div>
                            <div class="caption lft slide_item_right" 
                                 data-x="865" 
                                 data-y="45" 
                                 data-speed="500" 
                                 data-start="5000" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/hint1-blue.png" id="rev-hint1" alt="Image 1">
                            </div>                        
                            <div class="caption lfb slide_item_right" 
                                 data-x="355" 
                                 data-y="355" 
                                 data-speed="500" 
                                 data-start="5500" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/hint2-blue.png" id="rev-hint2" alt="Image 1">
                            </div>

                        </li>
                        
                        <!-- 第三幕 -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="__PUBLIC__/Home/Images/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- 第三幕背景图片 -->
                            <img src="__PUBLIC__/Home/Images/sliders/revolution/bg3.jpg" alt="">
                            <div class="caption lfl slide_item_left" 
                                 data-x="20" 
                                 data-y="95" 
                                 data-speed="400" 
                                 data-start="1500" 
                                 data-easing="easeOutBack">
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/woman.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_title"
                                 data-x="470"
                                 data-y="100"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 文章写作
                            </div>
                            <div class="caption lfr slide_subtitle"
                                 data-x="470"
                                 data-y="170"
                                 data-speed="400"
                                 data-start="2500"
                                 data-easing="easeOutExpo">
                                 文案 合同 招标书
                            </div>
                            <div class="caption lfr slide_desc"
                                 data-x="470"
                                 data-y="220"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 这里拥有众多的写作人才！
                            </div>
                            <a class="caption lfr btn yellow slide_btn" href="__APP__/Projects/index"
                                 data-x="470"
                                 data-y="280"
                                 data-speed="400"
                                 data-start="3500"
                                 data-easing="easeOutExpo">
                                 查看详情!
                            </a>
                        </li>               
                        
                        <!-- 第四幕 -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="__PUBLIC__/Home/Images/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- 第四幕背景图片 -->
                            <img src="__PUBLIC__/Home/Images/sliders/revolution/bg4.jpg" alt="">                      
                            <div class="caption lft slide_title"
                                 data-x="0"
                                 data-y="105"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutExpo">
                                 移动应用开发?
                            </div>
                            <div class="caption lft slide_subtitle"
                                 data-x="0"
                                 data-y="180"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 不要彷徨了，你需要的人就在这里
                            </div>
                            <div class="caption lft slide_desc"
                                 data-x="0"
                                 data-y="225"
                                 data-speed="400"
                                 data-start="2500"
                                 data-easing="easeOutExpo">
                                 发布一个诱人的项目<br> 让数以万计的顶级开发者为你服务！
                            </div>
                            <a class="caption lft slide_btn btn red slide_item_left" href="__APP__/Projects/index" 
                                 data-x="0"
                                 data-y="300"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 更多!
                            </a>                        
                            <div class="caption lft start"  
                                 data-x="670" 
                                 data-y="55" 
                                 data-speed="400" 
                                 data-start="2000" 
                                 data-easing="easeOutBack"  >
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/iphone_left.png" alt="Image 2">
                            </div>
                            
                            <div class="caption lft start"  
                                 data-x="850" 
                                 data-y="55" 
                                 data-speed="400" 
                                 data-start="2400" 
                                 data-easing="easeOutBack"  >
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/iphone_right.png" alt="Image 3">
                            </div>                        
                        </li>
                        <!-- 第一幕 -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="__PUBLIC__/Home/Images/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- 第五幕背景图片 -->
                            <img src="__PUBLIC__/Home/Images/sliders/revolution/bg9.jpg" alt="">
                            
                            <div class="caption lft slide_title_white slide_item_left"
                                 data-x="30"
                                 data-y="90"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutExpo">
                                 徽标<br><span class="slide_title_white_bold">设计</span>
                            </div>
                            <div class="caption lft slide_subtitle_white slide_item_left"
                                 data-x="87"
                                 data-y="245"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 佣金丰厚！
                            </div>
                            <a class="caption lft btn dark slide_btn slide_item_left" href="__APP__/Projects/index"
                                 data-x="187"
                                 data-y="315"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 立即竞标!
                            </a>                        
                            <div class="caption lfb"
                                 data-x="640" 
                                 data-y="0" 
                                 data-speed="700" 
                                 data-start="1000" 
                                 data-easing="easeOutExpo"  >
                                 <img src="__PUBLIC__/Home/Images/sliders/revolution/lady.png" alt="Image 1">
                            </div>
                        </li>            
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
        <!-- 图片轮播结束 -->
		
        <!-- BEGIN CONTAINER -->   
        <div class="container">

            <!-- 雇佣功能简介开始 -->   
            <div class="row service-box">
                <div class="col-md-12 col-sm-12">
                    <div class="service-box-heading" style="text-align:center">
                        <em><i class="fa fa-check red"></i></em>
                        <span>以低廉价格雇佣威客！</span>
                    </div>
                    <div class="col-md-12 col-sm-12" style="margin-left:55px">
                        <span class="balloonspan">
                            <div class="balloon"></div>
                            <p>快捷发布您的需求</p>
                        </span>
                        <span class="balloonspan">
                            <div class="arrow"></div>
                        </span>
                        <span class="balloonspan">
                            <div class="balloon"></div>
                            <p>比较价格和选择满意的竞标方案</p>
                        </span>
                        <span class="balloonspan">
                            <div class="arrow"></div>
                        </span>
                        <span class="balloonspan">
                            <div class="balloon"></div>
                            <p>只有满意才需支付</p>
                        </span>
                    </div>
                </div>
            </div>
            <!-- 雇佣功能简介结束 -->

            <div class="clearfix"></div>

             <!-- 威客功能简介开始 -->   
            <div class="row service-box">
                <div class="col-md-12 col-sm-12">
                    <div class="service-box-heading" style="text-align:center">
                        <em><i class="fa fa-resize-small green"></i></em>
                        <span>成为一个威客并挣钱！</span>
                    </div>
                    <div class="col-md-12 col-sm-12" style="margin-left:55px">
                        <span class="balloonspan">
                            <div class="balloon"></div>
                            <p>浏览适合您技能的项目</p>
                        </span>
                        <span class="balloonspan">
                            <div class="arrow"></div>
                        </span>
                        <span class="balloonspan">
                            <div class="balloon"></div>
                            <p>应征工作</p>
                        </span>
                        <span class="balloonspan">
                            <div class="arrow"></div>
                        </span>
                        <span class="balloonspan">
                            <div class="balloon"></div>
                            <p>被录取和挣钱</p>
                        </span>
                    </div>
                </div>
            </div>
            <!-- 威客功能简介结束 -->

            <div class="clearfix"></div>

            <!-- 人气威客开始 -->
            <div class="row recent-work margin-bottom-40">
                <div class="col-md-3">
                    <h2><a href="__APP__/Developers/index">人气威客</a></h2>
                    <p>这里展示了一些技术过硬，经验丰富的注册开发者。你可以点击查看他们的个人信息以及项目经验。</p>
                </div>
                <div class="col-md-9">
                    <ul class="bxslider">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <em style="width:276px;height:207px">
                                <img src="__ROOT__/Uploads/users/<?php echo ($vo["avatar"]); ?>" alt="" />
                                <a href="__APP__/Developers/view/id/<?php echo ($vo["id"]); ?>"><i class="fa fa-link icon-hover icon-hover-1"></i></a>
                                <a style="width:10px" href="__ROOT__/Uploads/users/<?php echo ($vo["avatar"]); ?>" class="fancybox-button" title="用户名:<?php echo ($vo["uname"]); ?>" >
                                    <i class="fa fa-search icon-hover icon-hover-2"></i>
                                </a>
                            </em>
                            <a class="bxslider-block" style="width:276px" href="">
                                <strong>用户名：<?php echo ($vo["uname"]); ?></strong>
                                <b>所在地：<?php echo (($vo["location"])?($vo["location"]):'暂未填写'); ?></b>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                    </ul>        
                </div>
            </div>   
            <!-- 人气威客结束 -->

            <div class="clearfix"></div>
            
            <!-- 网站简介开始 -->   
            <div class="row service-box">
                <div class="col-md-12 col-sm-12">
                    <div class="service-box-heading" style="text-align:center">
                        <em><i class="fa fa-location-arrow blue"></i></em>
                        <span>关于威客网--未来世界上最大的外包市场</span>
                    </div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;威客网 将会是世界上最大的小型企业自由职业、外包和众包市场。 拥有超过 一千万 用户，您可以用低廉费用雇佣威客完成您的工作需求。 无论您需要PHP开发者、网站设计或内容写手，您都可以在几分钟内外包您的需求。 浏览数百个技能分类包括文案、数据输入、图形设计或更多技术领域像HTML编码、MySQL编程和CSS设计。 您是一个刚开始创业的企业家？ 寻找一个高水平的图形设计师按照您的要求设计徽标。 您是否想在线扩展您的业务？ 雇用一位网络营销者通过SEO和脸谱网提高访问量。 您还没有网站或移动应用？ 这不是问题，我们拥有成千上万网络开发者随时准备为您服务。 威客网 通过提供您所需要的人才以加速您业务的增长。 一旦您获得新的客户，您甚至可以雇用客服或一个虚拟个人助手来简化您的工作，而不需要考虑风险和雇用全职工作人员的费用。 从一开始 威客网 就致力于简化在线雇用威客和寻找自由职业工作。来吧！和成千上万的企业一样加入世界上最大的精湛技术威客市场！</p>
                </div>
            </div>
            <!-- 网站简介结束 -->

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