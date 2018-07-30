<?php
	/*系统日志管理
	 *
	 *
	 */
    class SyslogAction extends PublicAction{
        //日志列表显示
        function index(){


            $Syslog = D('syslog');
            $list = $Syslog -> select();
            foreach($list as &$v){
                $v['dateline'] = date('Y-m-d H:i:s',$v['dateline']);
            }
            $this->assign('list',$list);
            $this -> display();
        }
		//添加页面
        function add(){
            $this -> display();
        }
		//添加流程
        function insert(){
            $Syslog = D('syslog');
            $_POST['dateline'] = time();
            $Syslog -> create();
            if($Syslog -> add()){
                $this -> success('添加成功','index','3');
            }else{
                $this -> error('添加失败');
            }
        }
		//删除流程
        function del(){
            $Syslog = D('syslog');
            if($Syslog -> delete($_GET['id'])){
                $this -> success('数据删除成功！');
            }else{
                $this -> error('数据删除失败！');
            }
        }	
		//显示详情
        function view(){
            $Syslog = D('syslog');
            $info = $Syslog -> find($_GET['id']);
            $info['dateline'] = date('Y-m-d H:i:s',$info['dateline']);
            $this -> assign('info',$info);
            $this -> display();    
        }
    }
?>
