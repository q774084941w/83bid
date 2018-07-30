<?php
	return array(
		//'配置项'=>'配置值'
		//数据库配置
		'DB_TYPE'=>'mysql',		//数据库类型
		'DB_HOST'=>'127.0.0.1',	//主机地址
		'DB_NAME'=>'swifthorse',		//数据库名
	    'DB_USER'=>'root',		//用户名
		'DB_PWD'=>'',	//密码
		//'DB_PORT'=>'3306',		//端口号
		'DB_PREFIX'=>'sh_',	
		//'DB_DSN'=>'mysql:host=127.0.0.1;dbname=swifthorse;charset=UTF-8',

		//视图定界符配置
		'TMPL_L_DELIM'=>'<{',
		'TMPL_R_DELIM'=>'}>',

		'TMPL_TEMPLATE_SUFFIX'=>'.html',	//修改模板文件后缀名

		// 'DEFAULT_THEME'=>'my',		//设置默认模板主题
		// 'TMPL_DETECT_'=>true,		//自动侦测模板主题，默认false,true可用来动态更换模板主题
		// 'THEME_LIST'=>'one,two',		//设置支持的模板主题列表

		'SHOW_PAGE_TRACE'=>true,		//开启页面Trace	
	);
?>
