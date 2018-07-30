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

class RankAction extends PublicAction
{



    /**
     * rank列表页面
     */
    public function index()
    {
        $rank = D('rank_rule as a');
        $list = $rank
            ->field("rank_id,title,content,score,aname,date_format(from_unixtime(time), '%Y-%m-%d %H:%i:%s') as time,a.status ")
            ->join('__ADMIN__ as b on a.create_id=b.id')
            ->select();

        $this->assign('list',$list);
        $this->display();
    }

    /**
     * 添加规则
     */
    public function add()
    {
        //处理数据添加
        if (IS_POST)
        {
            $rank                 = D('rank_rule');
            $_POST['time']        = time();
            $_POST['change_time'] = time();
            $_POST['create_id']   = session('admin')['id'];
            $_POST['change']      = session('admin')['aname'];
            $rank->create();
            if ($rank->add())
            {
                $this -> setLog('添加','rank规则',"用户名={$_POST['title']}");
                $this -> success('添加成功','index','3');
            }
            else
            {
                $this -> setLog('添加','rank规则','失败');
                $this -> error('添加失败');
            }
            exit;
        }



        //添加页面
        $this->display();
    }

     /**
     * 快捷启用停用
     */
    public function update()
    {
        if (IS_GET)
        {
            $users = D('rank_rule');
            $_POST['rank_id'] = $_GET['id'];
            $_POST['status']  = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改','rank规则',"rank_id={$_POST['rank_id']}");
                $this -> redirect('index');
            }
            else
            {
                $this -> setLog('修改','rank规则',"失败");
                $this -> redirect('index');
            }
        }

    }

    /**
     * 修改规则
     */
    public function change()
    {
        $rank = D('rank_rule');

        if (IS_POST)
        {
            $_POST['change_time'] = time();
            $_POST['change']      = session('admin')['aname'];
            $rank->create();
            if($rank -> save()){
                $this -> setLog('修改','rank规则',"rank_id={$_POST['rank_id']}");
                $this -> success('信息更新成功','index');
            }else{
                $this -> setLog('修改','rank规则',"失败");
                $this -> error('数据更新失败','index');
            }
            exit;
        }


        $data = $rank
                ->field('rank_id,title,content,score,date_format(from_unixtime(change_time), \'%Y-%m-%d %H:%i:%s\') as change_time,change')
                ->find($_GET['id']);
        $this->assign('data',$data);
        $this->display();
    }



}