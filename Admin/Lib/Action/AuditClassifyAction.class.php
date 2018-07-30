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

class AuditClassifyAction extends BaseClassifyAction
{
    /**
     * 审核分类
     */

    public function _initialize()
    {
        parent::_initialize();
        $this->classify =  D('examine as a'); //数据库
        $this->thisClassName = '审核分类';  //记录名称
        $this->title    = 'name';  //日志字段名
        $this->time     = 'createtime'; //创建时间字段名
        $this->thisId   = 'examine_id'; //id
    }



    /**
     * 审核分类
     */
    public function index()
    {
        $data = $this->classify
            ->join('__ADMIN__ as b on a.admin_id=b.id')
            ->field('a.*,date_format(from_unixtime(a.createtime), \'%Y-%m-%d %H:%i:%s\') as time,b.aname')
            ->select();
        $this->assign('data',$data);
        $this->display();
    }


    /**
     * 添加分类
     */
    public function add()
    {
        if (IS_POST)
        {

            $pay                  =   $this->classify;
            $_POST['createtime']  = time();
            $_POST['admin_id']    = session('admin')['id'];
            $pay->create();
            if ($pay->add())
            {
                $this -> setLog('添加','审核分类',"名称={$_POST['name']}");
                $this -> success('添加成功');
            }
            else
            {
                $this -> setLog('添加','审核分类','失败');
                $this -> error('添加失败');
            }
            exit;
        }

    }


}