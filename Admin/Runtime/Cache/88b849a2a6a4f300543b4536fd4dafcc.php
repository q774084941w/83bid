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
	<link rel="stylesheet" href="__PUBLIC__/js/bootstrap-select/css/bootstrap-select.min.css">
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
	<link rel="shortcut icon" href="__PUBLIC__/Images/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top" style="background-color: #CDCBC8 !important;">
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
        <!--<?php echo ($thisNavigation); ?>-->
        <li class="tooltips <?php switch($thisNavigation): case "/": ?>active<?php break;?>
        <?php case "Index/index": ?>active<?php break;?>
        <?php default: endswitch;?>"  data-placement="right" data-original-title="点击主页">
            <a href="__APP__">
                <i class="fa fa-home"></i>
                <span class="title">主页</span>
            </a>
        </li>
        <li class="<?php switch($thisNavigation1): case "Users": ?>open<?php break;?>
            <?php case "Rank": ?>open<?php break;?>
            <?php case "Chat": ?>open<?php break;?>
            <?php default: endswitch;?>">
            <a href="javascript:;">
                <i class="fa fa-user"></i>
                <span class="title">用户管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:
            <?php switch($thisNavigation1): case "Users": ?>block<?php break;?>
            <?php case "Rank": ?>block<?php break;?>
            <?php case "Chat": ?>block<?php break;?>
            <?php default: ?>none<?php endswitch;?>">
                <li class="tooltips <?php echo ($thisNavigation=='Users/dlist'?'active':''); ?>" data-placement="right" data-original-title="点击查看用户">
                    <a href="__APP__/Users/dlist">
                        用户列表</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation=='Users/add'?'active':''); ?>" data-placement="right" data-original-title="点击添加用户">
                    <a href="__APP__/Users/add">
                        添加用户</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='Rank'?'active':''); ?>" data-placement="right" data-original-title="点击查看rank规则">
                    <a href="__APP__/Rank">
                        RANK积分规则</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='Chat'?'active':''); ?>" data-placement="right" data-original-title="点击查看聊天列表">
                    <a href="__APP__/Chat">
                        聊天列表</a>
                </li>
            </ul>
        </li>
        <li class="<?php switch($thisNavigation1): case "Projects": ?>open<?php break;?>
            <?php case "Classify": ?>open<?php break;?>
            <?php case "Skill": ?>open<?php break;?>
            <?php default: endswitch;?>">
            <a href="javascript:;">
                <i class="fa fa-bookmark-o"></i>
                <span class="title">项目管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:
            <?php switch($thisNavigation1): case "Projects": ?>block<?php break;?>
            <?php case "Classify": ?>block<?php break;?>
            <?php case "Skill": ?>block<?php break;?>
            <?php default: ?>none<?php endswitch;?>">
                <li class="tooltips <?php echo ($thisNavigation1=='Projects'?'active':''); ?>" data-placement="right" data-original-title="点击查看项目">
                    <a href="__APP__/Projects">
                        项目列表</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='Classify'?'active':''); ?>" data-placement="right" data-original-title="点击查看项目">
                    <a href="__APP__/Classify">
                        项目分类</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='Skill'?'active':''); ?>" data-placement="right" data-original-title="点击查看技能">
                    <a href="__APP__/Skill">
                        技能
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php switch($thisNavigation1): case "Examine": ?>open<?php break;?>
            <?php case "AuditClassify": ?>open<?php break;?>
            <?php default: endswitch;?>">
            <a href="javascript:;">
                <i class="fa fa-bookmark-o"></i>
                <span class="title">审核管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:
            <?php switch($thisNavigation1): case "Examine": ?>block<?php break;?>
            <?php case "AuditClassify": ?>block<?php break;?>
            <?php default: ?>none<?php endswitch;?>">
                <li class="tooltips <?php echo ($thisNavigation1=='Examine'?'active':''); ?>" data-placement="right" data-original-title="点击查看审核信息">
                    <a href="__APP__/Examine">
                        审核列表</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='AuditClassify'?'active':''); ?>" data-placement="right" data-original-title="点击查看审核分类">
                    <a href="__APP__/AuditClassify">
                        审核分类</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='Admin'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-user-md"></i>
                <span class="title">管理员管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='Admin'?'block':'none'); ?>">
                <li class="tooltips <?php echo ($thisNavigation=='Admin/'?'active':''); ?>" data-placement="right" data-original-title="点击查看管理员">
                    <a href="__APP__/Admin">
                        管理员列表</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation=='Admin/add'?'active':''); ?>" data-placement="right" data-original-title="添加管理员">
                    <a href="__APP__/Admin/add">
                        添加管理员</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='AdminGroup'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-group"></i>
                <span class="title">权限管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='AdminGroup'?'block':'none'); ?>">
                <li class="tooltips <?php echo ($thisNavigation=='AdminGroup/'?'active':''); ?>" data-placement="right" data-original-title="点击查看管理员组">
                    <a href="__APP__/AdminGroup">
                        管理员组列表</a>
                </li>
                <li  class="tooltips <?php echo ($thisNavigation=='AdminGroup/add'?'active':''); ?>" data-placement="right" data-original-title="点击添加管理员组">
                    <a href="__APP__/AdminGroup/add">
                        添加管理员组</a>
                </li>
            </ul>
        </li>
        <li class="<?php switch($thisNavigation1): case "SysAccount": ?>open<?php break;?>
            <?php case "UserAccount": ?>open<?php break;?>
            <?php case "Pay": ?>open<?php break;?>
            <?php case "Monetary": ?>open<?php break;?>
            <?php default: endswitch;?>">
            <a href="javascript:;">
                <i class="fa fa-cny"></i>
                <span class="title">账户管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:
            <?php switch($thisNavigation1): case "SysAccount": ?>block<?php break;?>
            <?php case "UserAccount": ?>block<?php break;?>
            <?php case "Pay": ?>block<?php break;?>
            <?php case "Monetary": ?>block<?php break;?>
            <?php default: ?>none<?php endswitch;?>">
                <li class="tooltips <?php echo ($thisNavigation1=='SysAccount'?'active':''); ?>" data-placement="right" data-original-title="点击查看系统账户">
                    <a href="__APP__/SysAccount">
                        系统账户管理</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='UserAccount'?'active':''); ?>" data-placement="right" data-original-title="点击查看用户账户">
                    <a href="__APP__/UserAccount">
                        用户账户管理</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='Pay'?'active':''); ?>" data-placement="right" data-original-title="点击查看支付方式">
                    <a href="__APP__/Pay">
                        支付方式</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation1=='Monetary'?'active':''); ?>" data-placement="right" data-original-title="点击查看币值">
                    <a href="__APP__/Monetary">
                        币值</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='Comments'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-comments-o"></i>
                <span class="title">评论管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='Comments'?'block':'none'); ?>">
                <li  class="tooltips <?php echo ($thisNavigation=='Comments/dlist'?'active':''); ?>" data-placement="right" data-original-title="点击查看评论开发者">
                    <a href="__APP__/Comments/dlist">
                        评论开发者列表</a>
                </li>
                <li class="tooltips <?php echo ($thisNavigation=='Comments/elist'?'active':''); ?>" data-placement="right" data-original-title="点击查看评论雇佣者">
                    <a href="__APP__/Comments/elist">
                        评论雇佣者列表</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='Points'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-tags"></i>
                <span class="title">积分管理</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='Points'?'block':'none'); ?>" >
                <li class="tooltips <?php echo ($thisNavigation=='Points/'?'active':''); ?>" data-placement="right" data-original-title="点击查看积分">
                    <a href="__APP__/Points">
                        积分列表</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='Statistics'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-bar-chart-o"></i>
                <span class="title">统计管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='Statistics'?'block':'none'); ?>">
                <li class="tooltips <?php echo ($thisNavigation=='Statistics/'?'active':''); ?>" data-placement="right" data-original-title="点击查看统计">
                    <a href="__APP__/Statistics">
                        统计列表</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='StationMail'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-envelope"></i>
                <span class="title">站内信管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='StationMail'?'block':'none'); ?>">
                <li class="tooltips <?php echo ($thisNavigation=='StationMail/'?'active':''); ?>" data-placement="right" data-original-title="点击查看站内信">
                    <a href="__APP__/StationMail">
                        站内信列表</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($thisNavigation1=='Syslog'?'open':''); ?>">
            <a href="javascript:;">
                <i class="fa fa-calendar"></i>
                <span class="title">日志管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu" style="display:<?php echo ($thisNavigation1=='Syslog'?'block':'none'); ?>">
                <li class="tooltips <?php echo ($thisNavigation=='Syslog/'?'active':''); ?>" data-placement="right" data-original-title="点击查看日志">
                    <a href="__APP__/Syslog">
                        日志列表</a>
                </li>
            </ul>
        </li>
        <li class="tooltips <?php echo ($thisNavigation1=='Sysmanage'?'active':''); ?>" data-placement="right" data-original-title="点击设置系统信息">
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
						威客 <small>添加用户</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>操作</span> <i class="fa fa-angle-down"></i>
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
							<a href="#">用户管理</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li><a href="#">添加用户</a></li>
					</ul>
					&lt;!&ndash; END PAGE TITLE & BREADCRUMB&ndash;&gt;
				</div>
			</div>-->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                <!--表格开始-->
                    <div class="portlet box yellow">
					    <div class="portlet-title">
							<div class="caption"><i class="fa fa-user"></i>修改规则</div>
							<div class="actions">
								<a href="__URL__/index" class="btn green"><i class="fa fa-share"></i> 返回</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="__URL__/change" method="post" id="form_sample_0" class="form-horizontal" enctype="multipart/form-data">
								<input type="hidden" name="rank_id" value="<?php echo ($data["rank_id"]); ?>">
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
										<label class="control-label col-md-3">名称<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">                                       
												<i class="fa"></i>   
												<input type="text" class="form-control" name="title" value="<?php echo ($data["title"]); ?>"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">分数<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa"></i>
												<input type="number" class="form-control" name="score"  value="<?php echo ($data["score"]); ?>"/>
											</div>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">描述<span class="required"></span></label>
										<div class="col-md-4">
											<div class="input-icon right">                                       
												<i class="fa"></i>   
                                                <textarea class="form-control" rows="3" name="content"><?php echo ($data["content"]); ?></textarea>
											</div>
										</div>
                                    </div>
									<div class="form-group">
										<label class="control-label col-md-3">最新修改时间<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa"></i>
												<div class="form-control">
													<?php echo ($data["change_time"]); ?>
												</div>

											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">修改人<span class="required">*</span></label>
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa"></i>
												<div class="form-control">
												<?php if(empty($$data['change'])): ?>暂无
													<?php else: ?>
													<?php echo ($data["change"]); endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">提交</button>
										<a href="__URL__/index" class="btn default">取消</a>
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
	<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2018 &copy; 83bid
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
	<script src="__PUBLIC__/js/bootstrap-select/js/bootstrap-select.min.js" type="javascript"></script>
	<script src="__PUBLIC__/js/bootstrap-select/js/i18n/defaults-zh_CN.min.js" type="javascript"></script>
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