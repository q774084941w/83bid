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

class ExamineAction extends PublicAction
{

    /**
     * 项目预审列表
     */
    public function index()
    {
        $projects = D('projects as a');

        $data     = $projects
                 -> join('__USERS__ as c on a.eid=c.id')
                 -> join('__EXAMINE__ as d on a.examine_id=d.examine_id')
                 -> field('a.id,a.pnumber,a.pname,c.uname,d.name,a.examine_id')
                 -> order('examine_id')
                 -> select();
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 更改状态
     */
    public function adopt()
    {
        $id      = $_GET['id'];
        $examine = $_GET['examine'];
        if (empty($id)||empty($examine))
        {
            $this->error('缺少重要参数');
            exit;
        }

        $table   = D('examine');
        $result  = $table
            -> where('examine_id = '.$examine)
            -> getField('name');
        if ($result)
        {
            $projects    = D('projects');
            $_POST['id']         = $id;
            $_POST['examine_id'] = $examine;
            $projects->create();
            if ($projects->save())
            {
                $this -> setLog('修改','审核项目状态',"项目id={$id}");
                $this -> success('修改成功');
                $this -> redirect('index');
            }
            else
            {
                $this -> setLog('修改','审核项目状态',"失败");
                $this -> success('修改失败');
                $this -> redirect('index');
            }

        }
        else
        {
            $this->error('未知状态');
            $this -> redirect('index');
            exit;
        }
    }

}