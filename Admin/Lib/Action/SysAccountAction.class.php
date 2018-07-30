<?php
	/* 系统收支记录
	 *
	 *
	 **/
    class SysAccountAction extends PublicAction{

        /**
         * 首页
         */
        public function index()
        {
            $SysAccount = D('sysaccount as a');
            $list = $SysAccount
                -> join('__MONETARY__ as b on a.monetary_id=b.monetary_id')
                -> field('a.id,a.pnumber,a.prestore,a.status,b.title,b.icon,a.type')
                -> select();
            $this->assign('list',$list);
            $this -> display();
        }

        /**
         * 添加页面
         */
        function add()
        {
            $data = MonetaryAction::select();
            $this -> assign('monetary',$data);

            $user = D('users');
            $data = $user
                -> field('id,uname,neckname')
                -> where('status=0')
                -> select();
            $this->assign('user',$data);

            $pro  = D('projects');
            $data = $pro
                -> field('id,pnumber')
                -> select();
            $this -> assign('projects',$data);
            $this -> display();
        }


        /**
         * 添加处理
         */
        public function insert(){
            $SysAccount             = D('sysaccount');
            $_POST['prestoretime']  = time();
            $projects               = explode(',',$_POST['projects']);
            $_POST['projects_id']   = $projects[0];
            $_POST['pnumber']       = $projects[1];
            $SysAccount -> create();
            if($SysAccount -> add())
            {
                $this -> success('添加成功','index','3');
            }else
                {
                $this -> error('添加失败');
            }
        }

        /**
         * 详情页面
         */
        public  function view(){
            $SysAccount = D('sysaccount as a');

            $info = $SysAccount
                -> join('__MONETARY__ as b on a.monetary_id=b.monetary_id')
                -> join('__USERS__ as c on a.users_id=c.id')
                -> field('a.*,b.title,b.icon,c.uname,c.neckname')
                -> where('a.id='.$_GET['id'])
                -> find();
            $this -> assign('info',$info);
            $this -> display();    
        }
    }
