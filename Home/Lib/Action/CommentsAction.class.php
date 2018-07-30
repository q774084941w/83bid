<?php
/* 前台用户评论控制器
 *
 */
class CommentsAction extends PublicAction{

    public function index(){
        $this -> display('dsent');    
    }
    
    //开发者收到的评论
    public function dreceived(){
        $Comments = D('comments');
        $Users = D('users');
        $where['byreviewerid'] = $_SESSION['user']['id'];
        $where['type'] = '0';
        $info = $Comments -> where($where)
                          -> order('comtime desc')
                          -> select();
        foreach($info as &$v){
            $user['id'] = $v['reviewerid'];
            $userinfo = $Users -> where($user) -> find();
            $v['uname'] = $userinfo['uname'];
            $v['avatar'] = $userinfo['avatar'];
            $v['comtime1'] = date('Y/m/d',$v['comtime']);
            $v['comtime2'] = date('H:i:s',$v['comtime']);
        }
        $sum = count($info);
        $this -> assign('sum',$sum);
        $this -> assign('info',$info);
        $this -> display();
    }

    //开发者发出的评论
    public function dsent(){
        $Comments = D('comments');
        $Users = D('users');
        $where['reviewerid'] = $_SESSION['user']['id'];
        $where['type'] = '1';
        $info = $Comments -> where($where)
                          -> order('comtime desc')
                          -> select();
        foreach($info as &$v){
            $user['id'] = $v['byreviewerid'];
            $userinfo = $Users -> where($user) -> find();
            $v['uname'] = $userinfo['uname'];
            $v['avatar'] = $userinfo['avatar'];
            $v['comtime1'] = date('Y/m/d',$v['comtime']);
            $v['comtime2'] = date('H:i:s',$v['comtime']);
        }
        $sum = count($info);
        $this -> assign('sum',$sum);
        $this -> assign('info',$info);
        $this -> display();
    }

    //开发者未完成的评论
    public function dundone(){
        $Projects = D('projects');
        $Users = D('users');
        $map['status'] = array('in','3,4');
        $map['bidderid'] = array('eq',$_SESSION['user']['id']);
        $data = $Projects -> where($map)
                          -> select();
       
        foreach($data as &$v){
            $condition['id'] = $v['eid'];
            $list = $Users -> field('uname,avatar')
                           -> where($condition)
                           -> find();
            $v['uname'] = $list['uname'];
            $v['avatar'] = $list['avatar'];
            $v['endtime'] = date('Y/m/d H:i:s',$v['endtime']);
        }

        $sum = count($data);
        $this -> assign('sum',$sum);
        $this -> assign('data',$data);
        $this -> display();
    }

    //开发者新增图片页
    public function dadd(){
        $Projects = D('projects');
        $Users = D('users');
        $info = $Projects -> find($_GET['id']);
        $user['id'] = $info['eid'];
        $userinfo = $Users -> where($user) -> find();
        $info['uname'] = $userinfo['uname'];
        $info['avatar'] = $userinfo['avatar'];
        $this -> assign('info',$info);
        $this -> display();
    }

    //开发者新增评论处理
    public function dinsert(){
        $_POST['comtime'] = time();
        $averagelevel = ($_POST['firstlevel'] + $_POST['secondlevel'] +
                        $_POST['thirdlevel'] + $_POST['fourthlevel'] +
                        $_POST['fivethlevel'])/5;
        $_POST['averagelevel'] = number_format($averagelevel,1);
        $Comments = D('comments');
        $Comments -> create();
        if($Comments -> add()){
            $Projects = D('projects');
            $project['pnumber'] = $_POST['pnumber'];
            if($_POST['pstatus'] == '3'){
                $Projects -> where($project) -> setField('status',5);
            }else{
                $Projects -> where($project) -> setField('status',6);    
            }

            $level['byreviewerid'] = array('eq',$_POST['byreviewerid']);
            $level['type'] = array('eq',$_POST['type']);
            $elevel = $Comments -> where($level) -> avg('averagelevel');
            $elevel = number_format($elevel,1);
            $Users = D('users');
            $where['id'] = $_POST['byreviewerid'];
            $Users -> where($where) -> setField('elevel',$elevel);

            $this -> success('评论成功！','dundone',3);
        }else{
            $this -> error('评论失败！');
        }
    }

    //开发者收到的评论回复页
    public function dreply(){
        $Comments = D('comments');
        $info = $Comments -> find($_GET['id']);
        $info['comtime'] = date('Y-m-d H:i:s',$info['comtime']);
        $Users = D('users');
        $where['id'] = $info['reviewerid'];
        $userinfo = $Users -> where($where) -> find();
        $info['uname'] = $userinfo['uname'];
        $info['avatar'] = $userinfo['avatar'];
        $info['replytime'] = date('Y-m-d H:i:s',$info['replytime']);
        $this -> assign('info',$info);
        $this -> display();
    }

    //开发者收到的评论回复处理
    public function dreplyact(){
        $Comments = D('comments');
        $_POST['replytime'] = time();
        $Comments -> create();
        $Comments -> save();
        $this -> redirect('Comments/dreceived');
    }

    //开发者评论详情页
    public function dview(){
        $Comments = D('comments');
        $info = $Comments -> find($_GET['id']);
        $info['comtime'] = date('Y-m-d H:i:s',$info['comtime']);
        if($info['reply']){
            $Users = D('users');
            $where['id'] = $info['byreviewerid'];
            $userinfo = $Users -> where($where) -> find();
            $info['uname'] = $userinfo['uname'];
            $info['avatar'] = $userinfo['avatar'];
            $info['replytime'] = date('Y-m-d H:i:s',$info['replytime']);
        }
        $this -> assign('info',$info);
        $this -> display();
    }

    //开发者修改评论页
    public function dmod(){
        $Comments = D('comments');
        $info = $Comments -> find($_GET['id']);
        $Users = D('users');
        $where['id'] = $info['byreviewerid'];
        $user = $Users -> where($where) -> find();
        $info['uname'] = $user['uname'];
        $info['avatar'] = $user['avatar'];
        $info['first'] = (($info['firstlevel']/5)*93).'px';
        $info['second'] = (($info['secondlevel']/5)*93).'px';
        $info['third'] = (($info['thirdlevel']/5)*93).'px';
        $info['fourth'] = (($info['fourthlevel']/5)*93).'px';
        $info['fiveth'] = (($info['fivethlevel']/5)*93).'px';
        $this -> assign('info',$info);
        $this -> display();    
    }

    //开发者修改评论处理
    public function dupdate(){
        $Comments = D('comments');
        $averagelevel = ($_POST['firstlevel'] + $_POST['secondlevel'] +
                        $_POST['thirdlevel'] + $_POST['fourthlevel'] +
                        $_POST['fivethlevel'])/5;
        $_POST['averagelevel'] = number_format($averagelevel,1);
        $Comments -> create();
        if($Comments -> save()){
            $this -> success('评论修改成功！','dsent',3);
        }else{
            $this -> error('评论修改失败！');
        }
    }

    //雇佣者收到的评论
    public function ereceived(){
        $Comments = D('comments');
        $Users = D('users');
        $where['byreviewerid'] = $_SESSION['user']['id'];
        $where['type'] = '1';
        $info = $Comments -> where($where)
                          -> order('comtime desc')
                          -> select();
        foreach($info as &$v){
            $user['id'] = $v['reviewerid'];
            $userinfo = $Users -> where($user) -> find();
            $v['uname'] = $userinfo['uname'];
            $v['avatar'] = $userinfo['avatar'];
            $v['comtime1'] = date('Y/m/d',$v['comtime']);
            $v['comtime2'] = date('H:i:s',$v['comtime']);
        }
        $sum = count($info);
        $this -> assign('sum',$sum);
        $this -> assign('info',$info);
        $this -> display();
    }

    //雇佣者发出的评论
    public function esent(){
        $Comments = D('comments');
        $Users = D('users');
        $where['reviewerid'] = $_SESSION['user']['id'];
        $where['type'] = '0';
        $info = $Comments -> where($where)
                          -> order('comtime desc')
                          -> select();
        foreach($info as &$v){
            $user['id'] = $v['byreviewerid'];
            $userinfo = $Users -> where($user) -> find();
            $v['uname'] = $userinfo['uname'];
            $v['avatar'] = $userinfo['avatar'];
            $v['comtime1'] = date('Y/m/d',$v['comtime']);
            $v['comtime2'] = date('H:i:s',$v['comtime']);
        }
        $sum = count($info);
        $this -> assign('sum',$sum);
        $this -> assign('info',$info);
        $this -> display();
    }

    //雇佣者未完成的评论
    public function eundone(){
        $Projects = D('projects');
        $Users = D('users');
        $map['status'] = array('in','3,5');
        $map['eid'] = array('eq',$_SESSION['user']['id']);
        $data = $Projects -> where($map)
                          -> select();
       
        foreach($data as &$v){
            $condition['id'] = $v['bidderid'];
            $list = $Users -> field('uname,avatar')
                           -> where($condition)
                           -> find();
            $v['uname'] = $list['uname'];
            $v['avatar'] = $list['avatar'];
            $v['endtime'] = date('Y/m/d H:i:s',$v['endtime']);
        }
        $sum = count($data);
        $this -> assign('sum',$sum);
        $this -> assign('data',$data);
        $this -> display();
    }

    //雇佣者新增评论页
    public function eadd(){
        $Projects = D('projects');
        $Users = D('users');
        $info = $Projects -> find($_GET['id']);
        $user['id'] = $info['bidderid'];
        $userinfo = $Users -> where($user) -> find();
        $info['uname'] = $userinfo['uname'];
        $info['avatar'] = $userinfo['avatar'];
        $this -> assign('info',$info);
        $this -> display();
    }

    //雇佣者新增评论处理
    public function einsert(){
        $_POST['comtime'] = time();
        $averagelevel = ($_POST['firstlevel'] + $_POST['secondlevel'] +
                        $_POST['thirdlevel'] + $_POST['fourthlevel'] +
                        $_POST['fivethlevel'])/5;
        $_POST['averagelevel'] = number_format($averagelevel,1);
        $Comments = D('comments');
        $Comments -> create();
        if($Comments -> add()){
            $Projects = D('projects');
            $project['pnumber'] = $_POST['pnumber'];
            if($_POST['pstatus'] == '3'){
                $Projects -> where($project) -> setField('status',4);
            }else{
                $Projects -> where($project) -> setField('status',6);    
            }
            
            $level['byreviewerid'] = array('eq',$_POST['byreviewerid']);
            $level['type'] = array('eq',$_POST['type']);
            $dlevel = $Comments -> where($level) -> avg('averagelevel');
            $dlevel = number_format($elevel,1);
            $Users = D('users');
            $where['id'] = $_POST['byreviewerid'];
            $Users -> where($where) -> setField('dlevel',$dlevel);

            $this -> success('评论成功！','eundone',3);
        }else{
            $this -> error('评论失败！');
        }
    }
    
    //雇佣者回复评论页
    public function ereply(){
        $Comments = D('comments');
        $info = $Comments -> find($_GET['id']);
        $info['comtime'] = date('Y-m-d H:i:s',$info['comtime']);
        $Users = D('users');
        $where['id'] = $info['reviewerid'];
        $userinfo = $Users -> where($where) -> find();
        $info['uname'] = $userinfo['uname'];
        $info['avatar'] = $userinfo['avatar'];
        $info['replytime'] = date('Y-m-d H:i:s',$info['replytime']);
        $this -> assign('info',$info);
        $this -> display();
    }

    //雇佣者回复评论处理
    public function ereplyact(){
        $Comments = D('comments');
        $_POST['replytime'] = time();
        $Comments -> create();
        $Comments -> save();
        $this -> redirect('Comments/ereceived');
    }

    //雇佣者评论详情
    public function eview(){
        $Comments = D('comments');
        $info = $Comments -> find($_GET['id']);
        $info['comtime'] = date('Y-m-d H:i:s',$info['comtime']);
        if($info['reply']){
            $Users = D('users');
            $where['id'] = $info['byreviewerid'];
            $userinfo = $Users -> where($where) -> find();
            $info['uname'] = $userinfo['uname'];
            $info['avatar'] = $userinfo['avatar'];
            $info['replytime'] = date('Y-m-d H:i:s',$info['replytime']);
        }
        $this -> assign('info',$info);
        $this -> display();
    }

    //雇佣者修改评论页
    public function emod(){
        $Comments = D('comments');
        $info = $Comments -> find($_GET['id']);
        $Users = D('users');
        $where['id'] = $info['byreviewerid'];
        $user = $Users -> where($where) -> find();
        $info['uname'] = $user['uname'];
        $info['avatar'] = $user['avatar'];
        $info['first'] = (($info['firstlevel']/5)*93).'px';
        $info['second'] = (($info['secondlevel']/5)*93).'px';
        $info['third'] = (($info['thirdlevel']/5)*93).'px';
        $info['fourth'] = (($info['fourthlevel']/5)*93).'px';
        $info['fiveth'] = (($info['fivethlevel']/5)*93).'px';
        $this -> assign('info',$info);
        $this -> display();    
    }

    //雇佣者修改评论处理
    public function eupdate(){
        $Comments = D('comments');
        $averagelevel = ($_POST['firstlevel'] + $_POST['secondlevel'] +
                        $_POST['thirdlevel'] + $_POST['fourthlevel'] +
                        $_POST['fivethlevel'])/5;
        $_POST['averagelevel'] = number_format($averagelevel,1);
        $Comments -> create();
        if($Comments -> save()){
            $this -> success('评论修改成功！','esent',3);
        }else{
            $this -> error('评论修改失败！');
        }
    }
}
