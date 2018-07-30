<?php
    /*这是前台雇佣者的控制器
    * */
    class EmployersAction extends PublicAction{
        //雇佣者列表
        function index(){
           $users = D('users');
           $rank['rank'] = array('in','1,2');
           $list = $users -> field('id,uname,addtime,avatar,elevel,skills,eselfintro') 
                          -> where($rank)
                          -> select();
           foreach($list as &$v){
               switch($v['rank']){
                    case 0:
                        $v['rank'] = '开发者';
                        break;
                    case 1:
                        $v['rank'] = '雇佣者';
                        break;
                    case 2:
                        $v['rank'] = '开发者+雇佣者';
                        break;
               }
               switch($v['status']){
                    case 0:
                        $v['status'] = '启用';
                        break;
                    case 1:
                        $v['status'] = '禁用';
                        break;
               }
               $v['addtime'] = date('d/m/Y',$v['addtime']);
           }
           $this -> assign('list',$list);
           $this -> display();
        }

        //雇佣者详情
        function view(){
            $users = D('users');
            $info = $users -> find($_GET['id']);
            switch($info['rank']){
                case 0:
                    $info['rank'] = '开发者';
                    break;
                case 1:
                    $info['rank'] = '雇佣者';
                    break;
                case 2:
                    $info['rank'] = '开发者+雇佣者';
                    break;
            }
            switch($info['status']){
                    case 0:
                        $info['status'] = '启用';
                        break;
                    case 1:
                        $info['status'] = '禁用';
                        break;
            }
            $info['addtime'] = date('d/m/Y',$info['addtime']);

            $comments = D('comments');
            $where['byreviewerid'] = $_GET['id'];
            $where['type'] = 1;
            $where['_logic'] = 'AND';
            $list = $comments -> field("id,reviewerid,byreviewerid,comtime,content,reply,replytime")
                            -> where($where) 
                            -> select();
            $level['1'] = $comments -> where($where) -> avg('firstlevel'); 
            $level['2'] = $comments -> where($where) -> avg('secondlevel'); 
            $level['3'] = $comments -> where($where) -> avg('thirdlevel'); 
            $level['4'] = $comments -> where($where) -> avg('fourthlevel'); 
            $level['5'] = $comments -> where($where) -> avg('fivethlevel'); 
            $level['6'] = ($level['1'] + $level['2'] + $level['3'] + $level['4'] + $level['5'])/5;
            foreach($level as &$v){
                $v = number_format($v,1);    
            }

            foreach($list as &$v){
                $v['comtime'] = date('Y/m/d H:i',$v['comtime']);
                $v['replytime'] = date('Y/m/d H:i',$v['replytime']);
                $user = D('users');
                $in = $user -> find($v['reviewerid']);
                $v['uname'] = $in['uname'];
                $v['avatar'] = $in['avatar'];
            }

            $us = D('users');
            $like = $us -> field('id,uname,avatar,skills')
                        -> where("elevel > 2")
                        -> limit(3)
                        -> select();

            $point = D('points');
            $poin = $point -> field('uid,userrank,points')
                        -> order("points desc")
                        -> limit(8)
                        -> select();
            foreach($poin as &$v){
                $id = $v['uid'];
                $user = D('users');
                $po = $user -> field('id,uname,avatar')
                            -> where("id={$id}")
                            -> find();
                $v['uname'] = $po['uname'];
                $v['avatar'] = $po['avatar'];
                $v['uid'] = $po['id'];
            }

            $this -> assign('poin',$poin);
            $this -> assign('like',$like);
            $this -> assign('list',$list);
            $this -> assign('info',$info);
            $this -> assign('level',$level);
            $this -> display();
        }
    }
