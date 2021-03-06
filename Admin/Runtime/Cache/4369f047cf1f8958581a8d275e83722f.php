<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>后台管理 | <?php echo ($sysmanage["title"]); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="__PUBLIC__/Admin/Plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN INDEX PAGE STYLES --> 
	<link href="__PUBLIC__/Admin/Plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<link href="__PUBLIC__/Admin/Plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
	
    <!-- END INDEX PAGE STYLES -->
    <!-- BEGIN LIST PAGE STYLES -->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Plugins/select2/select2_metro.css" />
	<link rel="stylesheet" href="__PUBLIC__/Admin/Plugins/data-tables/DT_bootstrap.css" />
	<!--tag input标签css-->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Plugins/bootstrap-tagsinput-master/dist/bootstrap-tagsinput.css" />
	<!-- END LIST PAGE STYLES -->
    <!-- BEGIN ADD PAGE STYLES -->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/Plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
    <!-- END ADD PAGE STYLES -->
	<!-- BEGIN THEME STYLES --> 
	<link href="__PUBLIC__/Admin/Css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/pages/tasks.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/Admin/Css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="__PUBLIC__/Admin/Css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<!--<link rel="shortcut icon" href="__PUBLIC__/Admin/Images/favicon.ico" />-->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" style="padding:3px" href="__ROOT__" target="_blank">
			<img src="__PUBLIC__/<?php echo ($sysmanage["logo"]); ?>" alt="logo" class="img-responsive" />
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
					<img alt="" src="<?php echo ($_SESSION['admin']['avatar']); ?>"/>
					<span class="username"><?php echo ($_SESSION['admin']['aname']); ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href='__APP__/My'><i class="fa fa-user"></i> 个人中心</a></li>
						<li><a href="#"><i class="fa fa-calendar"></i> 我的日历</a></li>
						<li><a href="#"><i class="fa fa-envelope"></i> 我的收件箱 <span class="badge badge-danger">3</span></a></li>
						<li><a href="#"><i class="fa fa-tasks"></i> 我的任务 <span class="badge badge-success">7</span></a></li>
						<li class="divider"></li>
						<li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> 全屏</a></li>
						<li><a href="__APP__/Index/lock"><i class="fa fa-lock"></i> 锁屏</a></li>
						<li><a href="__APP__/Index/logout"><i class="fa fa-key"></i> 登出</a></li>
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
	
		<!-- BEGIN PAGE -->


		<!-- 右侧的页面-right -->
		


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
        <li class="start">
            <a href="__APP__">
                <i class="fa fa-home"></i>
                <span class="title">主页</span>
            </a>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-user"></i>
                <span class="title">用户管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/Users/dlist">
                        开发者列表</a>
                </li>
                <li >
                    <a href="__APP__/Users/elist">
                        雇佣者列表</a>
                </li>
                <li >
                    <a href="__APP__/Users/add">
                        添加用户</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-bookmark-o"></i>
                <span class="title">项目管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/Projects">
                        项目列表</a>
                </li>
                <li >
                    <a href="__APP__/Bidders">
                        竞标者列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-user-md"></i>
                <span class="title">管理员管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/Admin">
                        管理员列表</a>
                </li>
                <li >
                    <a href="__APP__/Admin/add">
                        添加管理员</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-group"></i>
                <span class="title">权限管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="__APP__/AdminGroup">
                        管理员组列表</a>
                </li>
                <li >
                    <a href="__APP__/AdminGroup/add">
                        添加管理员组</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-cny"></i>
                <span class="title">账户管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/SysAccount">
                        系统账户管理</a>
                </li>
                <li >
                    <a href="__APP__/UserAccount">
                        用户账户管理</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-comments-o"></i>
                <span class="title">评论管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/Comments/dlist">
                        评论开发者列表</a>
                </li>
                <li >
                    <a href="__APP__/Comments/elist">
                        评论雇佣者列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-tags"></i>
                <span class="title">积分管理</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/Points">
                        积分列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-bar-chart-o"></i>
                <span class="title">统计管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/Statistics">
                        统计列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-envelope"></i>
                <span class="title">站内信管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="__APP__/StationMail">
                        站内信列表</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-calendar"></i>
                <span class="title">日志管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="">
                    <a href="__APP__/Syslog">
                        日志列表</a>
                </li>
            </ul>
        </li>
        <li class="tooltips active" data-placement="right" data-original-title="点击设置系统信息">
            <a href="__APP__/Sysmanage">
                <i class="fa fa-cogs"></i>
                <span class="title">站点配置</span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->

		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->   
			<!--<div class="row">
				<div class="col-md-12">
					&lt;!&ndash; BEGIN PAGE TITLE & BREADCRUMB&ndash;&gt;
					<h3 class="page-title">
						威客 <small>后台管理</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>工具</span> <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">主页</a> 
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">管理员管理</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li><a href="#">管理员详情</a></li>
					</ul>
					&lt;!&ndash; END PAGE TITLE & BREADCRUMB&ndash;&gt;
				</div>
			</div>-->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption"><i class="fa fa-reorder"></i>管理员详情</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20"> 管理员信息 - <?php echo ($info["truename"]); ?> </h2>
                                    <h3 class="form-section">个人信息</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">用户名:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["aname"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">真实姓名:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["truename"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">电话:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["phone"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">电子邮箱:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["email"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <h3 class="form-section">账号信息</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">账号创建时间:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["addtime"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <!--<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">上次登录时间:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["lastlogin"]); ?></p>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">所属管理员组:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["admingroup"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <!--<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">上次登录IP:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["lastip"]); ?></p>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--/span-->
                                    </div>
                                    <!--/row-->           
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">账号状态:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo ($info["status"]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <!--<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">上次登录地点:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">北京</p>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--/span-->
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-10 col-md-2">
                                                <a href="__URL__/mod/id/<?php echo ($info["id"]); ?>" class="btn green"><i class="fa fa-pencil"></i> 编辑</a>
                                                <a href="__URL__/index" class="btn purple"><i class="fa fa-share"></i> 返回</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
							
				</div>
			</div>
			<!-- END PAGE CONTENT-->    
		</div>
	<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2014 &copy; yxtuwen.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="__PUBLIC__/Admin/Plugins/respond.min.js"></script>
	<script src="__PUBLIC__/Admin/Plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<script src="__PUBLIC__/Admin/Plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>   
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="__PUBLIC__/Admin/Plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="__PUBLIC__/Admin/Plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Admin/Plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
    <!-- BEGIN INDEX PAGE PLUGINS -->
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>  
	<script src="__PUBLIC__/Admin/Plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
    <!--<script src="__PUBLIC__/Admin/Plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>弹窗-->
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script src="__PUBLIC__/Admin/Plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
    <!-- END INDEX PAGE PLUGINS -->
    <!-- BEGIN LIST PAGE PLUGINS -->
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/data-tables/DT_bootstrap.js"></script>
    <!-- END LIST PAGE PLUGINS -->
    <!-- BEGIN ADD PAGE PLUGINS -->
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/jquery-validation/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/jquery-validation/dist/additional-methods.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/bootstrap-markdown/lib/markdown.js"></script>
	<!--tags input-->
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/bootstrap-tagsinput-master/dist/bootstrap-tagsinput.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/bootstrap-tagsinput-master\dist\bootstrap-tagsinput-angular.js"></script>
	<!--中文验证-->
	<script type="text/javascript" src="__PUBLIC__/Admin/Plugins/jquery-validation/dist/messages_cn.js"></script>
	<!-- END ADD PAGE PLUGINS -->
	<!-- BEGIN INDEX PAGE SCRIPTS -->
	<script src="__PUBLIC__/Admin/Js/app.js" type="text/javascript"></script>
	<script src="__PUBLIC__/Admin/Js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Admin/Js/tasks.js" type="text/javascript"></script>
    <script>
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins
		   Index.init();
		   Index.initJQVMAP(); // init index page's custom scripts
		   Index.initCalendar(); // init index page's custom scripts
		   Index.initCharts(); // init index page's custom scripts
		   Index.initChat();
		   Index.initMiniCharts();
		   Index.initDashboardDaterange();
		   Index.initIntro();
           Tasks.initDashboardWidget();
		});
    </script>
    <!-- END INDEX PAGE SCRIPTS -->
	<!-- BEGIN LIST PAGE SCRIPTS -->
    <!--<script src="__PUBLIC__/Admin/Js/app.js"></script>-->
    <script src="__PUBLIC__/Admin/Js/table-managed.js"></script> 
	<script>
		jQuery(document).ready(function() {       
		   //App.init();
		   TableManaged.init();
		});
	</script>
    <!-- END LIST PAGE SCRIPTS -->
    <!-- BEGIN ADD PAGE SCRIPTS -->
    <script src="__PUBLIC__/Admin/Js/form-validation.js"></script>
    <script src="__PUBLIC__/Admin/Js/form-samples.js"></script>
	<script>
		jQuery(document).ready(function() {
            FormValidation.init();
            FormSamples.init();
		});
	</script>
    <!-- END ADD PAGE SCRIPTS -->
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>