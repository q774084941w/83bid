<?php
/*前台用户中心项目管理模块
 * */
class UserProjectsAction extends PublicAction {
    //我发布的项目，正在进行中的方法
    function index(){
        //查询雇佣者ID与登录会员ID相符，并且状态为正在开发的项目
        $project = D("projects");
        $list = $project -> where("(eid = {$_SESSION['user']['id']}) && (status = 1)")
                         -> select();
        //统计查询出符合条件的项目总数，分配给模版
        $info = count($list);
        foreach($list as &$v){
            $v['bidtime'] = date("Y/m/d",$v['bidtime']);
            $id = $v['bidderid'];
            //根据项目表中的中标者ID，查询中标者的用户信息
            $user = D('users');
            $po = $user -> field('id,uname,avatar')
                        -> where("id={$id}")
                        -> find();
            $v['uname'] = $po['uname'];
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display('releasedo');    
    }
    //同index方法
    function releasedo(){
        $project = D("projects");
        $where['eid'] = array('eq',$_SESSION['user']['id']);
        $where['status'] = array('in','1,2');
        $list = $project -> where($where)
                         -> select();
        $info = count($list);
        foreach($list as &$v){
            $v['bidtime'] = date("Y/m/d",$v['bidtime']);
            $id = $v['bidderid'];
            $user = D('users');
            $po = $user -> field('id,uname,avatar')
                        -> where("id={$id}")
                        -> find();
            $v['uname'] = $po['uname'];
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display('releasedo');    
    }
    //我发布的项目，正在竟标中的方法
    function releasebid(){
        //查询雇佣者ID与登录会员ID相符，并且状态为正在竟标的项目
        $project = D("projects");
        $list = $project -> where("(eid = {$_SESSION['user']['id']}) && (status = 0)")
                         -> select();
        //统计查询出符合条件的项目总数，分配给模版
        $info = count($list);
        foreach($list as &$v){
            $pnumber['pnumber'] = $v['pnumber'];
            //根据项目表中的项目编号，查询竟标表中的所有竟标者
            $bidder = D('bidders');
            $v['bidnum'] = $bidder -> where($pnumber) -> Count('bidderid');
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display();    
    }
    //查看我发布的项目，正在竟标中的项目详情
    function releasebidders(){
        $pnum['pnumber'] = $_GET['pnumber'];
        $project = D("projects");
        //根据列表页GET传来的项目编号，查询项目表信息
        $info = $project -> where($pnum)
                         -> find();
        $pnumber['pnumber'] = $info['pnumber'];
        //根据项目编号查询竟标者表中所有竟标者
        $bidder = D('bidders');
        $list = $bidder -> field('id,pnumber,bidderid,bid,bidtime')
                    -> where($pnumber)
                    -> select();
        //根据竟标者ID查询所有竟标者信息
        $user = D('users');
        foreach($list as &$v){
            $v['bidtime'] = date('Y/m/d H:i:s',$v['bidtime']);
            $id['id'] = $v['bidderid'];
            $poo = $user -> field('id,avatar,uname,location')
                        -> where($id)
                        -> find();
            $v['uid'] = $poo['id'];
            $v['avatar'] = $poo['avatar'];
            $v['uname'] = $poo['uname'];
            $v['location'] = $poo['location'];
        }
        $this -> assign("list",$list);
        $this -> assign("info",$info);
        $this -> display();    
    }
    //我发布的项目，已经完成的项目
    function releasedone(){
        //查询雇佣者ID与登录会员ID相符，并且状态为已经完成的项目
        $project = D("projects");
        $where['eid'] = array('eq',$_SESSION['user']['id']);
        $where['status'] = array('egt','3');
        $list = $project -> where($where)
                         -> select();
        //统计查询出符合条件的项目总数，分配给模版
        $info = count($list);
        foreach($list as &$v){
            $v['endtime'] = date("Y/m/d",$v['endtime']);
            $id = $v['bidderid'];
            //根据项目表中标者ID，查询中标者的用户信息
            $user = D('users');
            $po = $user -> field('id,uname,avatar')
                        -> where("id={$id}")
                        -> find();
            $v['uname'] = $po['uname'];
            $v['avatar'] = $po['avatar'];
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display();    
    }
    //我参与竟标的项目
    function bidding(){
        //查询竟标ID与登录会员ID相符的所有竟标表
        $bidder = D("bidders");
        $id['bidderid'] = $_SESSION['user']['id'];
        $list = $bidder -> where($id)
                         -> select();
        //统计符合条件的竟标表的数量
        $info = count($list);
        foreach($list as &$v){
            $pnumber['pnumber'] = $v['pnumber'];
            //根据竟标者表中的项目编号查询项目表信息
            $project = D('projects');
            $po = $project -> where($pnumber)
                           -> find();
            $v['pname'] = $po['pname'];
            $v['budget'] = $po['budget'];
            $v['projecttime'] = $po['projecttime'];
            $v['addtime'] = date("Y/m/d",$po['addtime']);
            $v['pstatus'] = $po['status'];
            $v['pid'] = $po['id'];
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display();    
    }
    //我发布的项目，正在竟标的，关闭项目的方法
    function shut(){
        //根据列表GET传来的项目ID，更新项目状态为关闭
        $project = D("projects");
        $where['id'] = $_GET['id'];
        $project -> where($where)
                 -> setField("status","10");
        $this -> redirect("releasebid");
    }
    //我发布的项目，正在竟标的，雇佣他的方法
    function ei(){
        //根据列表GET传来的项目ID，用户ID，竟标者出价，更新项目中标者ID，项目状态为正在开发，中标价
        $project = D("projects");
        $where['id'] = $_GET['id'];
        $arr = array('bidderid'=>"{$_GET['uid']}",'status'=>'1','bid'=>"{$_GET['bid']}",'bidtime'=>time());
        $project -> where($where)
                 -> setField($arr);
        $this -> redirect("releasebid");
    }

     //支付佣金，并完成相关信息的更新
    function pa(){
        $project = D('projects');
        $pro['id'] = $_GET['id'];
        
        $pnumber = $project -> where($pro) -> getField('pnumber');
        $bidderid = $project -> where($pro) -> getField('bidderid');
        $eid = $project -> where($pro) -> getField('eid');
        $bid = $project -> where($pro) -> getField('bid');
        $project -> where($pro) -> setField('status',3);

        $sysaccount = D('sysaccount');
        $sys['pnumber'] = $pnumber;
        $prestore = $sysaccount -> where($sys) -> getField('prestore');
        $income = number_format(($prestore * 0.03),1,'.','');
        $sysfield = array('income'=>$income,'paytime'=>time());
        $sysaccount -> where($sys) -> setField($sysfield);
    
        $useraccount = D('useraccount');
        $bua['uid'] = '0';
        $bua['transcash'] = $bid;
        $bua['transinfo'] = '项目'.$pnumber.'支付款';
        $bua['transid'] = $bidderid;
        $bua['transtime'] = time();
        $useraccount -> create($bua);
        $useraccount -> add();

        $eua['uid'] = '0';
        $eua['transcash'] = $prestore - $income - $bid;
        $eua['transinfo'] = '项目'.$pnumber.'退款';
        $eua['transid'] = $eid;
        $eua['transtime'] = time();
        $useraccount -> create($eua);
        $useraccount -> add();


        $user = D('users');
        $userid['id'] = $bidderid;
        $user -> where($userid) -> setInc('account',$bid);

        $point = D('points');
        $po['uid'] = $bidderid;
        $po['points'] = $bid;
        $po['pointstime'] = time();
        $point -> create($po);
        if($point -> add()){
            $this -> success('支付成功！','__APP__/UserProjects/releasedone',3);    
        }else{
            $this -> error('支付失败！');
        }
    }

    function biddendo(){
        //查询项目中标ID与登录会员ID相符的所有项目
        $project = D('projects');
        $where['bidderid'] = $_SESSION['user']['id'];
        $where['status'] = '1';
        $list = $project -> where($where)
                         -> select();
        //统计符合条件的项目数量
        $info = count($list);
        foreach($list as &$v){
            $v['bidtime'] = date("Y/m/d",$v['bidtime']);
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display();        
    }

    function finish(){
        $project = D('projects');
        $where['id'] = $_GET['id'];
        $result = array('status'=>'2','endtime'=>time());
        $project -> where($where) -> setField($result);
        $this -> redirect('biddendone');
    }

    function biddendone(){
        //查询项目中标ID与登录会员ID相符的所有项目
        $project = D('projects');
        $where['bidderid'] = array('eq',$_SESSION['user']['id']);
        $where['status'] = array('egt','2');
        $list = $project -> where($where)
                         -> select();
        //统计符合条件的项目数量
        $info = count($list);
        foreach($list as &$v){
            $v['endtime'] = date("Y/m/d",$v['endtime']);
        }
        $this -> assign("info",$info);
        $this -> assign("list",$list);
        $this -> display();        
    }
}
