<?php
/* 积分管理
 *
 *
 *
 */
    class PointsAction extends PublicAction{
        //积分管理展示
        function index(){


            $Points = D('points');
            $list = $Points -> field('id,uid,points,pointstime')
                            -> select();
            foreach($list as &$v){
                $v['pointstime'] = date('Y-m-d H:i:s',$v['pointstime']);
            }
            $this->assign('list',$list);
            $this -> display();
        }
		 //修改页面展示
        function mod(){
            $Points = D('points');
            $info = $Points -> field('id,points') -> find($_GET['id']);
            $this -> assign('info',$info);
            $this -> display();
        }
		//修改流程
        function update(){
            $Points = D('points');
            $Points -> create();
            if($Points -> save()){
                $this -> setLog('修改','积分',"uid={$_POST['uid']};points={$_POST['points']}");
                $this -> success('信息更新成功','index');
            }else{
                $this -> setLog('修改','积分',"失败");
                $this -> error('数据更新失败',"mod/id/{$_POST['id']}");
            }
        }
		 //删除流程
        function del(){
            $Points = D('points');
            if($Points -> delete($_GET['id'])){
                $this -> setLog('删除','积分',"id={$_GET['id']}");
                $this -> success('数据删除成功！');
            }else{
                $this -> setLog('删除','积分',"失败");
                $this -> error('数据删除失败！');
            }
        }
		//详情展示
        function view(){
            $Points = D('points');
            $info = $Points -> find($_GET['id']);
            $info['pointstime'] = date('Y-m-d H:i:s',$info['pointstime']);
            $this -> assign('info',$info);
            $this -> display();    
        }
    }
