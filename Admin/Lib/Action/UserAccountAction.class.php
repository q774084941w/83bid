<?php
	/* 用户账户管理
	 *
	 * Modifier : 谢鑫磊 ['774084941@qq.com']
	 **/
    class UserAccountAction extends PublicAction{
		//用户账户列表显示
        function index(){


            $UserAccount = D('useraccount as a');
            $list = $UserAccount
                -> join('__USERS__ as b on a.uid=b.id')
                -> field('a.id,b.uname,b.neckname,a.transcash,a.transtype,a.transid,a.transtime,a.balance')
                -> select();
            foreach($list as &$v){
                $v['transtime'] = date('Y-m-d H:i:s',$v['transtime']);
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
            $UserAccount = D('useraccount');
            $_POST['transtime'] = time();
            $UserAccount -> create();
            if($UserAccount -> add()){
                $this -> success('添加成功','index','3');
            }else{
                $this -> error('添加失败');
            }
        }



        /**
         * 详情
         */
        function view()
        {
            $UserAccount = D('useraccount as a');
            $info = $UserAccount
                -> join('__USERS__ as b on a.uid=b.id')
                -> join('__MONETARY__ as c on a.monetary_id=c.monetary_id')
                -> join('__PAYMENT__ as d on a.payment_id=d.payment_id')
                -> field('a.*,b.uname,b.neckname,c.title as monetary_tilte,c.icon as monetary_icon,d.name as payment_name')
                -> where('a.id='.$_GET['id'])
                -> find();

            $info['transtime'] = date('Y-m-d H:i:s',$info['transtime']);
            $this -> assign('info',$info);
            $this -> display();    
        }
    }
