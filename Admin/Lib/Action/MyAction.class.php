<?php
// +----------------------------------------------------------------------
// | 83bid [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright © 2018-2028 AII Rights Reserved
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: 谢鑫磊 < 774084941@qq.com>
// +----------------------------------------------------------------------

class MyAction extends PublicAction
{

    /**
     * 个人中心首页
     */
    public function index()
    {
        $gid    = $_SESSION['admin'];
        $this->assign('info',$gid);
        $this->display();
    }




    /**
     * 提交修改
     */
    public function update()
    {

    }

}