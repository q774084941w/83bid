<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.2
Version: 1.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>会员中心 | Swifthorse</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- 全局CSS开始 -->          
	<link href="__PUBLIC__/Admin/Plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- 全局CSS结束 -->
	<!-- 用户中心CSS开始 -->
    <link href="__PUBLIC__/Admin/Plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/Admin/Css/pages/profile.css" rel="stylesheet" type="text/css" />
    <!-- 用户中心CSS结束 -->
    <!-- 站内信CSS开始 -->
    <link href="__PUBLIC__/Admin/Plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/Admin/Plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link href="__PUBLIC__/Admin/Plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
    <link href="__PUBLIC__/Admin/Css/pages/inbox.css" rel="stylesheet" type="text/css" />
    <!-- 站内信CSS结束 -->
    <!-- 收到的评论CSS开始 -->
    <link href="__PUBLIC__/Admin/Css/pages/timeline.css" rel="stylesheet" type="text/css"/>
    <!-- 收到的评论CSS结束 -->
    <!-- 回复修改评论CSS开始 -->
    <link href="__PUBLIC__/Admin/Css/pages/blog.css" rel="stylesheet" type="text/css"/>
    <!-- 回复修改评论CSS结束 -->
	<!-- BEGIN THEME STYLES --> 
	<link href="__PUBLIC__/Admin/Css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Admin/Css/themes/light.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Admin/Css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/Home/Css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
    <link rel="shortcut icon" href="__PUBLIC__/Admin/Images/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" style="padding:3px" href="__APP__">
			<img src="__PUBLIC__/Admin/Images/user_logo.png" alt="logo" class="img-responsive" />
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER --> 
			<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="__PUBLIC__/Admin/Images/menu-toggler.png" alt="" />
			</a> 
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="__PUBLIC__/Admin/Images/avatar1_small.jpg"/>
                    <span class="username" style="color:#000"><?php echo ($_SESSION['user']['uname']); ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="__APP__/User/index"><i class="fa fa-user"></i> 我的资料</a></li>
						<li><a href="#"><i class="fa fa-calendar"></i> 我的日程</a></li>
						<li><a href="__APP__/StationMail/index"><i class="fa fa-envelope"></i> 我的站内信<span class="badge badge-danger">3</span></a></li>
						<li><a href="#"><i class="fa fa-tasks"></i> 我的任务 <span class="badge badge-success">7</span></a></li>
						<li class="divider"></li>
						<li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> 全屏</a></li>
						<li><a href="__APP__/Login/logout"><i class="fa fa-key"></i> 登出</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
    <!-- END HEADER -->
    <div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->   
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
		    <!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="no" method="post">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="搜索..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
				<li class="start ">
					<a href="__APP__">
					<i class="fa fa-home"></i> 
					<span class="title">网站首页</span>
					</a>
				</li>
				<li class="">
					<a href="__APP__/User/index">
					<i class="fa fa-user"></i> 
					<span class="title">我的基本信息</span>
					</a>
				</li>
				<li class="">
					<a href="__APP__/Accounts/index">
					<i class="fa fa-rmb"></i> 
					<span class="title">我的账户</span>
					</a>	
                </li>
                <li class="active">
					<a href="__APP__/UserProjects/index">
					<i class="fa fa-bookmark"></i> 
                    <span class="title">我的项目</span>
                    <span class="selected"></span>
					</a>	
                </li>
                <li class="">
					<a href="__APP__/Comments/index">
					<i class="fa fa-comments"></i> 
					<span class="title">我的评论</span>
					<span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
						<li>
							<a href="__APP__/Comments/dsent">
							开发者评论</a>
                        </li>
                        <li>
							<a href="__APP__/Comments/esent">
							雇佣者评论</a>
						</li>
                    </ul>	
				</li>
				<li class="">
					<a href="__APP__/StationMail/index">
					<i class="fa fa-envelope"></i> 
					<span class="title">我的站内信</span>
					</a>
				</li>
				<li class="last">
					<a href="__APP__/Points/index">
					<i class="fa fa-tags"></i> 
					<span class="title">我的积分</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->	
		</div>
        <!-- END SIDEBAR -->
        <!-- 此处分段 -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						会员中心 <small>我的项目</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
                            <a href="__APP__">
                            <button type="button" class="btn blue">
                                <span>首页</span> <i class="fa fa-share"></i>
                            </button>
                            </a>
						</li>
						<li>
							<i class="fa fa-home"></i>
							主页 
							<i class="fa fa-angle-right"></i>
                        </li>
                        <li>
							会员中心
							<i class="fa fa-angle-right"></i>
						</li>
						<li>我的项目</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li><a href="__APP__/UserProjects/releasedo">发布的项目</a></li>
							<li class="active"><a href="__APP__/UserProjects/biddendo">中标的项目</a></li>
							<li><a href="__APP__/UserProjects/bidding">竞标的项目</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active">
								<div class="row profile-account">
									<div class="col-md-2">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li >
												<a href="__APP__/UserProjects/biddendo">
		                                            <i class="fa fa-rocket"></i> 
												    正在进行的
												</a>                                  
											</li>
                                            <li class="active">
                                                <a href="__APP__/UserProjects/biddendone">
                                                    <i class="fa fa-check-square"></i> 
                                                    已经完成的
                                                </a>
                                                <span class="after"></span>
                                            </li>
										</ul>
									</div>
									<div class="col-md-10">
										<div class="tab-content">
											<div class="tab-pane active">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="add-portfolio">
                                                            <span>项目总数：<?php echo ($info); ?></span>
                                                            <a href="__APP__/Projects/add" class="btn icn-only green pull-right">发布新项目 <i class="m-icon-swapright m-icon-white"></i></a>                          
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row portfolio-block">
                                                    <div class="col-md-5">
                                                        <div class="portfolio-text">
                                                            <img src="__PUBLIC__/Admin/Images/profile/portfolio/logo_metronic.jpg" alt="" />
                                                            <div class="portfolio-text-info">
                                                                <h4>项目名称：<?php echo ($vo["pname"]); ?></h4>
                                                                <p>项目编号：<?php echo ($vo["pnumber"]); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="portfolio-info">
                                                            中标价
                                                            <span>￥<?php echo ($vo["bid"]); ?></span>
                                                        </div>
                                                        <div class="portfolio-info">
                                                            项目完成时间
                                                            <span><?php echo ($vo["endtime"]); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 portfolio-btn">
                                                        <a href="__APP__/Projects/view/id/<?php echo ($vo["id"]); ?>" class="btn bigicn-only"><span>查看</span></a>
                                                    </div>
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            <!--end tab-pane-->
										</div>
									</div>
									<!--end col-md-10-->                                   
								</div>
							</div>
							<!--end tab-pane-->	
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
		<!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
<!-- 页脚开始 -->
	<div class="footer">
		<div class="footer-inner">
			2014 &copy; Swifthorse.com
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- 页脚结束 -->
	<!-- JAVASCRIPTS开始(在页脚引入javascripts会节约载入时间) -->
	<!-- 核心JS开始 -->   
	<!--[if lt IE 9]>
	<script src="__PUBLIC__/Admin/Plugins/respond.min.js"></script>
	<script src="__PUBLIC__/Admin/Plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<script src="__PUBLIC__/Admin/Plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>    
	<script src="__PUBLIC__/Admin/Plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="__PUBLIC__/Admin/Plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- 核心JS结束 -->
	<!-- 用户中心JS开始 -->
	<script src="__PUBLIC__/Admin/Plugins/bootstrap-fileupload/bootstrap-fileupload.js" type="text/javascript"></script>
    <!-- 用户中心JS结束 -->
    <!-- 站内信JS开始 -->
	<script src="__PUBLIC__/Admin/Plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript" ></script>
	<script src="__PUBLIC__/Admin/Plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript" ></script> 
    <script src="__PUBLIC__/Admin/Plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript" ></script>
	<!-- 站内信JS结束 -->
	<!-- 公共JS开始 -->
    <script src="__PUBLIC__/Admin/Js/app.js"></script>
    <!--<script src="__PUBLIC__/Admin/Js/myinbox.js"></script>-->
	<!-- 公共JS结束 -->
	<script>
	    jQuery(document).ready(function() {
            App.init();  //js初始化
            //Inbox.init(); //站内信js初始化
		});
    </script>
    <script src="__PUBLIC__/Home/Js/star.js"></script> <!-- 动态评分 -->
	<!-- JAVASCRIPTS结束 -->
</body>
<!-- BODY结束 -->
</html>