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

    <!-- 页面内容开始 -->  
    <div class="page-container" >
        <!-- 面包屑导航开始 -->   
        <div class="row breadcrumbs margin-bottom-40">
            <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1>开发者详情</h1>
                </div>
                <div class="col-md-8 col-sm-8">
                    <ul class="pull-right breadcrumb">
                        <li><a href="__APP__">主页</a></li>
                        <li><a href="__APP__/Developers/index">寻找会员</a></li>
                        <li class="active">开发者详情</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 面包屑导航结束 -->
		<!-- BEGIN CONTAINER -->   
		<div class="container min-hight">
			<!-- BEGIN BLOG -->
			<div class="row">
				<!-- BEGIN LEFT SIDEBAR -->            
				<div class="col-md-9 blog-item margin-bottom-40">
					<div class="blog-item-img" style="width:278px;float:left;">
						<!-- BEGIN CAROUSEL -->            
						<div class="front-carousel">
							<div id="myCarousel" class="carousel slide">
								<!-- Carousel items -->
								<div class="carousel-inner">
									<div class="active item">
                                        <img src="__ROOT__/Uploads/users/<?php echo ($info["avatar"]); ?>" alt="">
									</div>
								</div>
								<!-- Carousel nav -->
							</div>
						</div>
						<!-- END CAROUSEL -->             
					</div>
                    <div style="width:500px;float:left;margin-left:30px;margin-top:20px;">
                        <h4><small>开发者技能</small></h4>
                        <p style="color:#555;"><?php echo (($info["skills"])?($info["skills"]):"用户暂未填写"); ?></p>
					    <blockquote>
                            <p style="color:#555;"><?php echo (($info["dselfintro"])?($info["dselfintro"]):"用户暂未填写"); ?></p>
                            <small>开发者简介 <cite title="Source Title"></cite></small>
					    </blockquote>                
                    </div>
                    <div style="float:left;width:100%;">
                        <ul class="blog-info">
                            <li><i class="fa fa-user"></i> <?php echo ($info["uname"]); ?></li>
                            <li><i class="fa fa-calendar"></i> <?php echo ($info["addtime"]); ?></li>
                            <li><i class="fa fa-comments"></i> <?php echo ($info["dlevel"]); ?></li>
                            <li><i class="fa fa-tags"></i> <?php echo (($info["phone"])?($info["phone"]):"电话暂未填写"); ?></li>
                            <li><i class="fa fa-tags"></i> <?php echo (($info["email"])?($info["email"]):"邮箱暂未填写"); ?></li>
                            <li><i class="fa fa-tags"></i> <?php echo (($info["location"])?($info["location"]):"所在地暂未填写"); ?></li>
                            <li><i class="fa fa-tags"></i> <?php echo ($info["rank"]); ?></li>
                            <li><i class="fa fa-tags"></i> <?php echo ($info["status"]); ?></li>
                        </ul>
                    </div>
					<div class="media" style="float:left;width:100%;">
                        <?php if($list != null): ?><h4 style="color:#555;">评论详情</h4>
                            <?php else: ?>
                            <h4 style="color:#555;">暂时还没有用户对该开发者的评论哦！</h4><?php endif; ?>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="#" class="pull-left">
                            <img src="__ROOT__/Uploads/users/<?php echo ($vo["avatar"]); ?>" alt="" class="media-object">
						</a>
						<div class="media-body">
                            <h4 class="media-heading"><?php echo ($vo["uname"]); ?>
                                <span><?php echo ($vo["comtime"]); ?> </span>
                            </h4>
                            <p><?php echo ($vo["content"]); ?></p>
							<hr>
							<!-- Nested media object -->
							<div class="media">
								<a href="#" class="pull-left">
                                    <img src="__ROOT__/Uploads/users/<?php echo ($info["avatar"]); ?>" alt="" class="media-object">
								</a>
								<div class="media-body">
                                    <h4 class="media-heading"><?php echo ($info["uname"]); ?>
                                        <span><?php echo ($vo["replytime"]); ?></span>
                                    </h4>
                                    <p><?php echo ($vo["reply"]); ?></p>
								</div>
							</div>
							<!--end media-->		
                        </div>
                        <br /><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<!--end media-->
				</div>
				<!-- END LEFT SIDEBAR -->
				<!-- BEGIN RIGHT SIDEBAR -->            
				<div class="col-md-3 blog-sidebar">
					<!-- CATEGORIES START -->
                    <h2 class="no-top-space">声誉<span class="pull-right"><?php echo ($level['6']); ?></span></h2>
					<ul class="nav sidebar-categories margin-bottom-40">
						<li><a>工作质量<span class="pull-right"><?php echo (($level['1'])?($level['1']):'0.0'); ?></span></a></li>
						<li><a>交流<span class="pull-right"><?php echo (($level['2'])?($level['2']):'0.0'); ?></span></a></li>
						<li><a>专业知识<span class="pull-right"><?php echo (($level['3'])?($level['3']):'0.0'); ?></span></a></li>
						<li><a>工作效率<span class="pull-right"><?php echo (($level['4'])?($level['4']):'0.0'); ?></span></a></li>
						<li><a>再次雇佣意愿<span class="pull-right"><?php echo (($level['5'])?($level['5']):'0.0'); ?></span></a></li>
					</ul>
					<!-- CATEGORIES END -->
					<!-- BEGIN RECENT NEWS -->                            
					<h2>开发的项目</h2>
					<div class="recent-news margin-bottom-10">
                        <?php if(is_array($like)): $i = 0; $__LIST__ = $like;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row margin-bottom-10">
							<div class="col-md-3">
                                <img src="__ROOT__/Uploads/users/<?php echo ($vo["avatar"]); ?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-9 recent-news-inner">
                                <h3><a href="__URL__/view/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["uname"]); ?></a></h3>
                                <p><?php echo ($vo["skills"]); ?></p>
							</div>                        
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<!-- END RECENT NEWS --> 
					<!-- BEGIN BLOG TALKS -->
					<div class="blog-talks margin-bottom-30">
						<h2>网站公告</h2>
						<div class="tab-style-1">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab-1" data-toggle="tab">公告一</a></li>
								<li><a href="#tab-2" data-toggle="tab">公告二</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane row-fluid fade in active" id="tab-1">
									<p class="margin-bottom-10">公告一的内容</p>
									<p><a href="#" class="read-more">查看更多</a></p>
								</div>
								<div class="tab-pane fade" id="tab-2">
									<p>公告二的内容</p>
								</div>
							</div>
						</div>
					</div>                            
					<!-- END BLOG TALKS -->
					<!-- BEGIN BLOG PHOTOS STREAM -->
					<div class="blog-photo-stream margin-bottom-20">
						<h2>积分top8</h2>
						<ul class="list-unstyled">
                            <?php if(is_array($poin)): $i = 0; $__LIST__ = $poin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <div style="float:left;margin-right:5px;margin-bottom:5px;" class="list-unstyled">
                                <div>
                                    <a href="__URL__/view/id/<?php echo ($vo["uid"]); ?>">
                                        <img style="width:54px;" src="__ROOT__/Uploads/users/<?php echo ($vo["avatar"]); ?>" alt="">
                                    </a>
                                </div>
                                <div style="text-align:center;background:#0da3e2;color:#fff;"><?php echo ($vo["uname"]); ?></div>
                            </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>                    
					</div>
					<!-- END BLOG PHOTOS STREAM -->
					<!-- BEGIN BLOG TAGS -->
					<div class="blog-tags margin-bottom-20" style="float:left;">
						<h2>热门技能</h2>
						<ul>
							<li><a><i class="fa fa-tags"></i>php</a></li>
							<li><a><i class="fa fa-tags"></i>c++</a></li>
							<li><a><i class="fa fa-tags"></i>java</a></li>
							<li><a><i class="fa fa-tags"></i>html5</a></li>
							<li><a><i class="fa fa-tags"></i>css</a></li>
							<li><a><i class="fa fa-tags"></i>c</a></li>
							<li><a><i class="fa fa-tags"></i>mysql</a></li>
							<li><a><i class="fa fa-tags"></i>ajax</a></li>
						</ul>
					</div>
					<!-- END BLOG TAGS -->
				</div>
				<!-- END RIGHT SIDEBAR -->            
			</div>
			<!-- END BEGIN BLOG -->
		</div>
		<!-- END CONTAINER -->
        <!-- 数据实时刷新开始 -->
        <div class="container">
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
        </div>
        <!-- 数据实时刷新结束 -->
    </div>
    <!-- 页面内容结束 -->
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