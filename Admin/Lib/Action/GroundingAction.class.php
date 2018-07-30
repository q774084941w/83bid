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

class GroundingAction extends  PublicAction
{
    protected $model;
    protected $className;

    /**
     * 构造方法
     */
    public function _initialize()
    {
        parent::_initialize();
        $this -> model     = D('commodity as a');
        $this -> className = '上架项目';
    }

    /**
     * 上架列表
     */
    public function index()
    {
        $data = $this -> model
            -> join('__EXAMINE__ as b on a.examine_id=b.examine_id')
            -> field('a.createtime,a.price,a.id,a.title,b.name,a.examine_id')
            -> select();
        $this -> assign('list',$data);
        $this -> display();
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
            $projects            = D('commodity');
            $_POST['id']         = $id;
            $_POST['examine_id'] = $examine;
            $projects->create();
            if ($projects->save())
            {
                $this -> setLog('修改',$this -> className,"项目id={$id}");
                $this -> success('修改成功');
            }
            else
            {
                $this -> setLog('修改',$this -> className,"失败");
                $this -> error('修改失败');
            }

        }
        else
        {
            $this->error('未知状态');
            exit;
        }
    }
}