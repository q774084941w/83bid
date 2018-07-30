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
    <link rel="shortcut icon" href="<?php echo ($sysmanage["icon"]); ?>" />
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
			<img src="<?php echo ($sysmanage["logo"]); ?>" alt="logo" class="img-responsive" />
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
				<li class="active">
					<a href="__APP__/Accounts/index">
					<i class="fa fa-rmb"></i> 
                    <span class="title">我的账户</span>
                    <span class="selected"></span>
					</a>	
                </li>
                <li class="">
					<a href="__APP__/UserProjects/index">
					<i class="fa fa-bookmark"></i> 
					<span class="title">我的项目</span>
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
						会员中心 <small>我的账户</small>
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
						<li>我的账户</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                <!--表格开始-->
                    <div class="portlet box yellow">
					    <div class="portlet-title">
							<div class="caption"><i class="fa fa-rmb"></i>新增转账</div>
							<div class="actions">
								<a href="__APP__/Accounts/index" class="btn green"><i class="fa fa-share"></i> 返回</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="__APP__/Accounts/insert" method="post" id="form_sample_2" class="form-horizontal">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										您输入的信息未通过验证，请重新输入！
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										您输入的信息已通过验证，可以提交！
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">转账用户<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">                                       
												<i class="fa"></i>   
												<input type="text" class="form-control" name="uname"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">账户余额<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">                                       
												<i class="fa"></i>   
                                                <input type="text" value="<?php echo ($balance); ?>" class="form-control" name="balance" readonly/>
											</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="control-label col-md-3">转账金额<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">                                       
												<i class="fa"></i>   
												<input type="text" class="form-control" name="transcash"/>
											</div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="control-label col-md-3">转账信息<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">                                       
												<i class="fa"></i>   
                                                <textarea class="form-control" name="transinfo" cols="20" rows="5">
                                                </textarea>
											</div>
										</div>
                                    </div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">提交</button>
										<a href="__APP__/Accounts/index" class="btn default">取消</a>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>
        </div>
    </div>
<!-- 页脚开始 -->
	<div class="footer">
		<div class="footer-inner">
			2014 &copy; yxtuwen.com
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