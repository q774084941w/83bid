<?php
/* 前台首页控制器
 *
 */
class IndexAction extends PublicAction {

    //遍历出6个开发者分配到前台模板显示
    public function index(){
	    $users = D('users');
        $where['rank'] = '0';
        $list = $users -> field('id,uname,avatar,location')
                       -> where($where)
                       -> limit(0,6)
                       -> select();
        $this -> assign('list',$list);
        $this -> display();    
    }
   
}
