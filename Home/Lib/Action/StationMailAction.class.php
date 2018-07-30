<?php
/*前台用户中心站内信控制器
 * */
class StationMailAction extends PublicAction {
    //收件箱列表,根据登录会员的ID查询收件人为会员的站内信，并且信件状态为未读或已读
    function index(){
        $stationmail = D('stationmail');
        $list = $stationmail -> field('id,title,senderid,receiverid,sendtime,instatus')
                             -> where("(receiverid={$_SESSION['user']['id']}) && (instatus=0 || instatus=1)")
                             -> select();
        foreach($list as &$v){
            $v['sendtime'] = date('Y-m-d H:i:s',$v['sendtime']);
                $id = $v['senderid'];
                //根据站内信表发件人的ID，查询发件人的用户信息
                $user = D('users');
                $po = $user -> field('id,uname,avatar')
                            -> where("id={$id}")
                            -> find();
                $v['uname'] = $po['uname'];
        }
        $this -> assign('list',$list);
        $this -> display();
    }
    //发件箱列表，根据登录会员的ID，查询发件人为会员的站内信,并且状态为已发送
    function sent(){
        $stationmail = D('stationmail');
        $list = $stationmail -> field('id,title,senderid,receiverid,sendtime')
                             -> where("(senderid={$_SESSION['user']['id']}) && (outstatus=0)")
                             -> select();
        foreach($list as &$v){
            $v['sendtime'] = date('Y-m-d H:i:s',$v['sendtime']);
                $id = $v['receiverid'];
                //根据站内信表收件人的ID，查询收件人的用户信息
                $user = D('users');
                $po = $user -> field('id,uname,avatar')
                            -> where("id={$id}")
                            -> find();
                $v['uname'] = $po['uname'];
        }
        $this -> assign('list',$list);
        $this -> display();
    }
    //草稿箱列表，根据登录会员的ID，查询发件人为会员的站内信，并且状态为草稿箱
    function draft(){
        $stationmail = D('stationmail');
        $list = $stationmail -> field('id,title,senderid,receiverid,sendtime')
                             -> where("(senderid={$_SESSION['user']['id']}) && (outstatus=1)")
                             -> select();
        foreach($list as &$v){
            $v['sendtime'] = date('Y-m-d H:i:s',$v['sendtime']);
                $id = $v['receiverid'];
                //根据站内信收件人的ID，查询收件人的用户信息
                $user = D('users');
                $po = $user -> field('id,uname,avatar')
                            -> where("id={$id}")
                            -> find();
                $v['uname'] = $po['uname'];
        }
        $this -> assign('list',$list);
        $this -> display();
    }  
    //回收站列表，根据登录会员的ID，查询发件人或收件人为会员的ID，并且发件状态为回收站或收件状态为回收站
    function trash(){
        $stationmail = D('stationmail');
        $list = $stationmail -> field('id,title,senderid,receiverid,sendtime')
                             -> where("(receiverid={$_SESSION['user']['id']} || senderid={$_SESSION['user']['id']} ) && (instatus=2 || outstatus=2)")
                             -> select();
        foreach($list as &$v){
            $v['sendtime'] = date('Y-m-d H:i:s',$v['sendtime']);
                $id = $v['receiverid'];
                //根据站内信收件人的ID，查询收件人的用户信息
                $user = D('users');
                $po = $user -> field('id,uname,avatar')
                            -> where("id={$id}")
                            -> find();
                $v['uname'] = $po['uname'];
        }
        $this -> assign('list',$list);
        $this -> display();
    }   
    //站内信详情
    function view(){
        $stationmail = D('stationmail');
        $info = $stationmail -> find($_GET['id']);

        $id = $info['senderid'];
        //根据站内信GET传来的ID，查询站内信发件人的ID，再查询用户表的用户信息
        $user = D('users');
        $po = $user -> field('id,uname,avatar')
                    -> where("id={$id}")
                    -> find();
        $info['sname'] = $po['uname'];   
        //查询发件人的头像信息
        $info['savatar'] = $po['avatar'];   

        $id = $info['receiverid'];
        //根据站内信GET传来的ID，查询站内信收件人的ID，再查询用户表的用户信息
        $user = D('users');
        $po = $user -> field('id,uname,avatar')
                    -> where("id={$id}")
                    -> find();
        $info['rname'] = $po['uname']; 
        //如果列表页GET传来的avtive值为index，就在模块页输出回复按纽，否则不显示
        $info['active'] = $_GET['active']; 
        //如果列表页GET传过来站内信的ID，就把收件人状态更新为已读
        $stationmail = D('stationmail');
        $_POST['id'] = $_GET['id'];
        $_POST['instatus'] = 1; 
        $stationmail -> create();
        $stationmail -> save();

        $info['sendtime'] = date('Y-m-d H:i:s',$info['sendtime']);

        $this -> assign('info',$info);
        $this -> display();
    }
    //输出写信方法的模版
    function compose(){
        $this -> display();
    }
    //处理提交过来站内信的添加
    function insert(){
        $stationmail = D('stationmail');
        $_POST['sendtime'] = time();
        $user = D('users');
        //根据表单传过来的收件人用户名，查询出收件人的ID
        $sid['uname'] = $_POST['sname'];
        $ssid = $user -> field('id,uname,avatar')
                    -> where($sid)
                    -> find();
        //把收件人ID赋给POST
        $_POST['receiverid'] = $ssid['id'];
        //把登录会员的发件人ID赋给POST
        $_POST['senderid'] = $_SESSION['user']['id'];
        //如果用户提交了存草稿，就设置发件状态为草稿箱
        if(isset($_POST['draft'])){
            $_POST['outstatus'] = 1;
        }
        unset($_POST['sname']);
        $stationmail -> create();
        if($stationmail -> add()){
            if($_POST['outstatus']){
               $this -> success('存草稿成功','index','3'); 
            }else{
                $this -> success('发送成功','index','3');
            }
        }else{
            $this -> error('发送失败');
        }
    }
    //快速回复站内信
    function reply(){
        //把列表页GET传来的用户名，传递到回复模版
        $info['sname'] = $_GET['sname'];
        //把列表页GET传来的标题，传递到回复模版
        $info['title'] = $_GET['title'];
        $this -> assign('info',$info);
        $this -> display();
    }
    //标记为收件箱站内信为已读或放入回收站的方法
    function update(){
        //如果收件箱列表页提交了instatus状态为已读
        if($_POST['instatus'] == 1){
            unset($_POST['instatus']);
            //拿到站内信所有ID
            foreach($_POST['ids'] as $v){
                $stationmail = D('stationmail');
                $where['id'] = $v;
                //循环更新站内信表条件为ID，收件箱状态为已读
                $stationmail -> where($where)
                            -> setField("instatus","1");
            }
                $this -> redirect("index");
        }

        //如果收件箱列表页提交了instatus状态为回收站
        if($_POST['instatus'] == 2){
            unset($_POST['instatus']);
            //拿到站内信所有ID
            foreach($_POST['ids'] as $v){
                $stationmail = D('stationmail');
                $where['id'] = $v;
                //循环更新站内信表条件为ID，收件箱状态为回收站
                $stationmail -> where($where)
                            -> setField("instatus","2");
            }
                $this -> redirect("index");
        }
    }
    //发件箱更新发件状态
    function oupdate(){
        //如果发件箱列表页提交了outstatus状态为回收站
        if($_POST['outstatus'] == 2){
            unset($_POST['outstatus']);
            //拿到站内信所有ID
            foreach($_POST['ids'] as $v){
                $stationmail = D('stationmail');
                $where['id'] = $v;
                //循环更新站内信表条件为ID，发件箱状态为回收站
                $stationmail -> where($where)
                            -> setField("outstatus","2");
            }
                $this -> redirect("draft");
        }
    }
    //草稿箱更新文件状态
    function supdate(){
        //如果草稿箱列表页提交了outstatus状态为回收站
        if($_POST['outstatus'] == 2){
            unset($_POST['outstatus']);
            //拿到站内信所有ID
            foreach($_POST['ids'] as $v){
                $stationmail = D('stationmail');
                $where['id'] = $v;
                //循环更新站内信表条件为ID，草稿箱状态为回收站
                $stationmail -> where($where)
                            -> setField("outstatus","2");
            }
                $this -> redirect("sent");
        }
    }
    //回收站删除方法
    function del(){
        //如果回收站列表页提交了instatus状态为删除
        if($_POST['instatus'] == 3){
            unset($_POST['instatus']);
            //拿到站内信所有ID
            foreach($_POST['ids'] as $v){
                $stationmail = D('stationmail');
                $where['id'] = $v;
                //循环更新站内信表条件为ID，发件状态和收件状态为删除
                $arr = array('instatus'=>'3','outstatus'=>'3');
                $stationmail -> where($where)
                            -> setField($arr);
            }
                $this -> redirect("trash");
        }
    }
}
