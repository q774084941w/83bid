<?php

/**
 * Class IndexAction
 *
 * Modifier : 谢鑫磊 ['774084941@qq.com']
 */

class IndexAction extends PublicAction
{

    /**
     * 后台首页
     */
    function index()
    {
        if($_SESSION['admin']['locked'])
        {	//如果SESSION['admin']['locked']为空，重定向致锁定界面
            $this -> redirect('lock');    
        }
        else
            {
			//按时间显示不同欢迎语	
			$time = date(H); 
			if ($time <= 3 )
			{
				$mgood = "夜深了，亲爱的管理员：";
			}elseif ($time < 7 )
            {
				$mgood = "早上好，亲爱的管理员：";
			}elseif ($time < 11 )
            {
				$mgood = "上午好，亲爱的管理员：";
			}elseif ($time < 13 )
            {
				$mgood = "中午好，亲爱的管理员：";
			}elseif ($time <= 17 )
            {
				$mgood = "下午好，亲爱的管理员：";
			}elseif ($time <= 23 )
            {
				$mgood = "晚上好，亲爱的管理员：";
			}
			//最近项目列表
			$Project = D('projects');
			$list = $Project
					-> field('id,pname,status,addtime')
					-> order('addtime desc') 
					-> limit(10)
					-> select();

			//4个统计显示
			$pronum = $Project -> count();									//查询项目总数


            $pronum1 = $Project -> where('status=0') -> count();
			$pronum2 = $Project -> where('status=1') -> count();

			$commodity = D('commodity');
            $pronum3   = $commodity -> count();

			$Users = D('users');											//实例化用户表
			$dsenum = $Users  ->count();
			
			$Sysaccount = D('sysaccount');									//实例化系统账户表
			$money = floor($Sysaccount -> Sum('prestore'));					//查询系统金额总数，舍去小数部分
			$statistics['pro']  = $pronum;									//项目总数
			$statistics['pro1'] = $pronum1;									//项目总数
			$statistics['pro2'] = $pronum2;									//项目总数
			$statistics['pro3'] = $pronum3;									//项目总数


            $statistics['dsenum'] = $dsenum;								//用户总数
			$statistics['money'] = $money;								    //系统金额总数
			//ip地址显示
			import('ORG.Net.IpLocation');									// 导入IpLocation类
			$Ip = new IpLocation('qqwry.dat'); 								// 实例化类 参数表示IP地址库文件
			$area = $Ip	->	getlocation(); 									// 获取某个IP地址所在的位置
			$info = iconv('gbk','utf-8',$area['country'].$area['area']);	// 对获取的GBK数据转码UTF8
			$info_ip = iconv('gbk','utf-8',$area['ip']);					// 对获取的GBK数据转码UTF8
			
			//系统其他信息
		    $sys_info['os']            = PHP_OS;							// 获取系统信息
		    $sys_info['web_server']    = apache_get_version();				// 获取服务器版本
		    $sys_info['php_ver']       = PHP_VERSION;						// 获取PHP版本信息
			$sys_info['mysql']         = mysql_get_server_info(); 			// 获取MySQL版本信息
			$this -> assign('area',$info);									// 变量分配到前台 
			$this -> assign('ip',$info_ip);
			$this -> assign('sys_info',$sys_info);
			$this -> assign('mgood',$mgood);
			$this -> assign('list',$list);
			$this -> assign('statistics',$statistics);
            $this -> display();    
        }
    }



    /**
     * 登录页面
     */
    function login()
    {
        //进入登陆页先清除$_SESSION['admin']里的值
        $_SESSION['admin'] = array();

        // echo md5('admin');
        $this -> display();
    }

    /**
     * 退出登录
     */
    function logout()
    {
        $this -> setLog('登出','系统','成功');
        //将退出信息写入日志
        $_SESSION['admin'] = array();
        $this->sysmanage   = null;
        $this->statistics  = null;
        $this->authority   = null;
        //退出之后清空$_SESSION['admin']里的值
        $this->redirect('login');
        //重定向值致登陆页面
    }

    /**
     * 登录验证
     */
    function check()
    {

        //验证码
        /*if ($_SESSION['verify'] != md5($_POST['verify']))
        {
            $this->redirect('login', array('error' => 3));
        }*/
		//登陆验证流程
        $Admin = D('admin');
        $condition['aname'] = $_POST['aname'];
        $info = $Admin -> where($condition)
                       -> find();
        if ($info)
        {
            if ($info['pwd'] != md5($_POST['pwd']))
            {
                $this -> setLog('登录','系统','失败,密码错误！',"{$_POST['aname']}");
                $this->redirect('login', array('error' => 1));    
            }
            $_SESSION['admin'] = $info;
            $this -> setLog('登录','系统','成功');
            $this->redirect('index'); 
        }else
            {
            $this -> setLog('登录','系统','失败,用户名不存在！',"{$_POST['aname']}");
            $this->redirect('login', array('error' => 2));  
        }
    }

    /**
     * 锁屏
     */
    function lock(){
        $_SESSION['admin']['locked'] = 1;
        //在SESSION里存入锁屏的标志位
        $this -> display();    
    }

    /**
     * 解锁验证
     */
    function lockcheck(){
        //锁屏登陆验证
        $pwd = md5($_POST['pwd']);
        if($pwd != $_SESSION['admin']['pwd'])
        {
            $this->redirect('lock', array('error' => 1));
        }
        else
            {
            $_SESSION['admin']['locked'] = 0;
            //$this->redirect('__APP__/'.$_SESSION['admin']['lastpage']);
            $this->redirect('index');  
        }   
    }

}
