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
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs margin-bottom-40">
            <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1>常见问题</h1>
                </div>
                <div class="col-md-8 col-sm-8">
                    <ul class="pull-right breadcrumb">
                        <li><a href="__APP__">主页</a></li>
                        <li><a href="">帮助</a></li>
                        <li class="active">常见问题</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END BREADCRUMBS -->

		<!-- BEGIN CONTAINER -->   
		<div class="container min-hight margin-bottom-10">
			<div class="row">
				<div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                      <li class="active">
                         <a data-toggle="tab" href="#tab_1">
                         账户管理
                         </a> 
                         <span class="after"></span>                                    
                      </li>
                      <li><a data-toggle="tab" href="#tab_2">我是雇主</a></li>
                      <li><a data-toggle="tab" href="#tab_3">我是威客</a></li>
                      <li><a data-toggle="tab" href="#tab_4">相关定义</a></li>
                    </ul>        
				</div>

				<div class="col-md-9">
                    <!-- BEGIN TAB CONTENT -->
                    <div class="tab-content">
                      <!-- START TAB 1 -->
                      <div id="tab_1" class="tab-pane active">
                         <div id="accordion1" class="panel-group">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                                     1. 哪几种情况无法注册成功？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion1_1" class="panel-collapse collapse  in">
                                  <div class="panel-body">
                                    1、如果因用户名被占用而不能注册的，在注册页面有及时提示。<br/>
									2、跟威客网官方相关的账号不能够注册使用。<br/>
									3、违法、违规、政治敏感类名称不能进行账号注册。 

                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
                                     2. 注册威客账户提交信息不成功时怎么办？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion1_2" class="panel-collapse collapse">
                                  <div class="panel-body">
									答：在确保网络无故障的情况下，请您重新提交注册信息。如确保无问题可拨打400-888-8888让客服协助处理。
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
                                     3. 注册威客账户时需要身份证吗？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion1_3" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    答：注册威客账户时是不需要身份证明的，但是申请提现时需要进行实名认证。
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">
                                     4. 威客昵称注册后可以修改吗？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion1_4" class="panel-collapse collapse">
                                  <div class="panel-body">
                                     答：可以修改，登陆网站在首页右上角“会员中心”中修改。
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5">
                                     5. 账户不能登录的原因及处理办法？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion1_5" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    1.提示“用户名不存在或密码错误”的情况。<br/>
										请查看您是否锁定了键盘的大写功能：检查键盘上的“Caps Lock”指示灯是否亮着，如果是，请先按一下“Caps Lock”键然后重新输入。<br/>
									2.账户有违规处理。<br/>
										如果通过以上方法还是无法登陆的，可能是由于您的账户存在违规处理。这种情况下，处理期满即可解封。如果您对违规处理有疑问的，可以致电威客网。
										
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- END TAB 1 -->
                      <!-- START TAB 2 -->
                      <div id="tab_2" class="tab-pane">
                         <div id="accordion2" class="panel-group">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1">
                                     1. 在哪里可以发布需求？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion2_1" class="panel-collapse collapse  in">
                                  <div class="panel-body">
                                     <p>
                                       答：您可以在威客网的首页导航栏见到发布需求的入口。
                                     </p>
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2">
                                     2. 我该怎么填写我的需求？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion2_2" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    答：一个信息详细完整的需求可以让服务商快速准确了解您的意图，这样需求的完成效果会更好。<br/>
									您可以：<br/>
									1.参考威客网的已有需求，看看人家的需求是怎样描述的。<br/>
									2.尽量用简单、明了的语言来表述自己的需求。<br/>
									3.实在难以表述清楚的，可以联系威客网的客服人员协助您处理。
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3">
                                     3. 多长的需求发布周期更适合我？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion2_3" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    答：根据威客网的需求情况统计，发布周期在7至15天内效果最好。<br/>
									具体周期您可以参考网站的同类需求，或者咨询威客网的客服人员。<br/>
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4">
                                     4.没有账号可以直接发布吗？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion2_4" class="panel-collapse collapse">
                                  <div class="panel-body">
                                     答：不能，请先注册账号再发布。
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- END TAB 3 -->
                      <!-- START TAB 3 -->
                      <div id="tab_3" class="tab-pane">
                         <div id="accordion3" class="panel-group">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1">
                                     1. 怎样才能提高中标概率？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion3_1" class="panel-collapse collapse  in">
                                  <div class="panel-body">
									答：<br/>
										1.认真领会买家的需求<br/>
											在具体需求页面，买家都有"需求"的描述，有的还有附件提出需求的其他要求或者提供相关材料。要出色地完成买家的需求，首先就要好好研读买家的需求和提供的材料，只有这样才能创作出最符合买家要求的作品。<br/>
										2.争取尽快交稿<br/>
											每一个需求都有规定的交稿时间，但是有时买家会因为有了满意的稿件而提前截稿，所以争取提前交稿，便有更高的中标概率。<br/>   
										3.多与买家沟通<br/>
											多与买家沟通，主动与买家沟通，挖掘买家的需求，才能创作出更符合客户要求的作品。
                                  </div>
                               </div>
                           </div>
                         </div>
                      </div>
                      <!-- END TAB 3 -->
   
					  <!-- START TAB 2 -->
                      <div id="tab_4" class="tab-pane">
                         <div id="accordion4" class="panel-group">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#accordion4_1">
                                     1. 什么是交易？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion4_1" class="panel-collapse collapse  in">
                                  <div class="panel-body">
                                     <p>
                                       答：是指买家和服务商双方使用“支付账户管理”系统，并且采用“通过‘支付账户管理’（买家验收后）代为支付威客报酬”的付款方式达成交易的行为。
                                     </p>
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#accordion4_2">
                                     2. 什么是雇佣者？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion4_2" class="panel-collapse collapse">
                                  <div class="panel-body">
									答：是指在本网站上进行发布需求的会员。
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#accordion4_3">
                                     3. 什么是开发者？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion4_3" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    答：是指在本网站上参加需求、销售服务、出售技能等“卖”操作的会员。
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#accordion4_4">
                                     4.什么是开发者主页？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion4_4" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    答：是指在本网站上的雇佣者用来展示自己成功案例和出售服务的平台。
                                  </div>
                               </div>
                            </div>
							<div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#accordion4_5">
                                     4.什么是雇佣者主页？
                                     </a>
                                  </h4>
                               </div>
                               <div id="accordion4_5" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    答：是指在本网站雇佣者展示自己的平台。
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- END TAB 3 -->
                    </div>
                    <!-- END TAB CONTENT -->
				</div>            
			</div>
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