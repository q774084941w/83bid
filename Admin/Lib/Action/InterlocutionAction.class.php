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

class InterlocutionAction extends PublicAction
{
    protected $surface;

    /**
     * 初始化参数
     */
    public function _initialize()
    {
        parent::_initialize();
        $this -> surface =  D('interlocution as a');
    }

    /**
     * 问答列表
     */
    public function index()
    {
        $data = self::lesstitle();
        $this -> assign('list',$data);
        $this -> display();
    }

    /**
     * 添加问题
     */
    public function add()
    {
        if (IS_POST)
        {
            if (empty($_POST['title']) || empty($_POST['content']))
            {
                $this->error('缺少重要参数');
                $this->redirect('index');
                exit;
            }
            $interlocution       = D('interlocution');
            $_POST['send_id']    = session('admin')['id'];
            $_POST['createtime'] = time();
            $interlocution       -> create();
            if ($interlocution->add())
            {
                $this -> setLog('添加','问题数据',"名称={$_POST['title']}");
                $this -> success('添加成功');
            }
            else
            {
                $this -> setLog('添加','问题数据','失败');
                $this -> error('添加失败');
            }
            exit;
        }

        $this->display();
    }


    /**
     * 详情信息
     */
    public function view()
    {
        $id = $_GET['id'];
        if (empty($id))
        {
            $this -> error('缺少重要参数');
            exit;
        }
        $surface = $this -> surface ;
        $info    = $surface
            -> join('__USERS__ as b on a.send_id=b.id')
            -> join('__EXAMINE__ as d on a.examine_id=d.examine_id')
            -> field('a.*,d.name as examine,b.uname,b.neckname')
            ->where('a.id='.$id)
            ->find();

        $info['createtime'] = date('Y-m-d H:i:s',$info['createtime']);
        $this->assign('info',$info);

        $list = self::lesstitle($id);
        $this->assign('list',$list);

        $this->display();
    }

    /**
     * 下级回复列表
     */
    public static function lesstitle($id=0)
    {
        $inter =  D('interlocution as a');

        $data  = $inter
            -> join('__USERS__ as b on a.send_id=b.id')
            -> join('__EXAMINE__ as d on a.examine_id=d.examine_id')
            -> field('a.title,a.id,a.createtime,a.status,a.examine_id,d.name as examine,b.uname,b.neckname')
            -> where('a.pid='.$id)
            -> select();
        return $data;
    }


    /**
     * 快捷修改状态
     */
    public function update()
    {

        $Comments        = $this -> surface ;
        $_POST['id']     = $_GET['id'];
        $_POST['status'] = $_GET['status'];
        $Comments -> create();
        if ($Comments -> save())

        {
            $this -> setLog('修改','问题',"id = {$_POST['id']}的状态");
            $this -> redirect('index');
        }
        else
        {
            $this -> setLog('修改','问题',"失败！");
            $this -> error('数据更新失败');
            $this -> redirect('index');
        }
    }


}