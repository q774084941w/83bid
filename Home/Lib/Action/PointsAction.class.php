<?php
/* 前台用户中心积分控制器
 *
 */
class PointsAction extends PublicAction{
        //向前台模板中传变量
    function index(){                           
        $points = D('points');                                          
        $uid = $_SESSION['user']['id'];                                 
        $info = $points -> where("uid={$uid}")
                        -> select();
        foreach($info as &$v){
            $v['pointstime'] = date('Y-m-d H:i:s',$v['pointstime']);
        }
        $this -> assign('info',$info);
        $this -> display();    
    }
}
