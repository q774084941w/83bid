<?php
    /* 前台竞标者控制器
     *
     */
	class BiddersAction extends PublicAction{
		//竞标者竞标
		public function pnumber(){
			//判断是否已经登录，如果没登录则跳回登录界面
			if(!($_SESSION['user'])){
				$this -> error('你还没有登录，请先登录',"__APP__/Login/login");
			}
			//判断竞标金额是否为空。
			if(!($_POST['bid'])){
				$this -> error('请输入竞标金额',"__APP__/Projects/view/id/{$_POST['pid']}");
			}
            //组合数据
            $bidders = D('bidders');
			
            $where['bidderid'] = array('eq',$_SESSION['user']['id']);
            $where['pnumber'] = array('eq',$_POST['pnumber']);
            $ifbidden = $bidders -> where($where) -> find();
            if($ifbidden){
                $this -> error('你已经是该项目的竞标者，不可重复竞标！',"__APP__/Projects/view/id/{$_POST['pid']}");
            }

            $data['bidderid'] = $_SESSION['user']['id'];
            $data['pnumber'] = $_POST['pnumber'];
			$data['bid'] = $_POST['bid'];
			$data['bidtime'] = time();
            $bidders -> create($data);
			//判断是否插入成功
			if($bidders -> add()){
				$this -> success('竞标成功',"__APP__/Projects/view/id/{$_POST['pid']}",'3');
            }else{
                $this -> error('竞标失败',"__APP__/Projects/view/id/{$_POST['pid']}");
            }
		}
	}
