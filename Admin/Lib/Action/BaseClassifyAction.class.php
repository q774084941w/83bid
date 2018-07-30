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

class BaseClassifyAction extends PublicAction
{
    protected $classify;
    protected $thisClassName;
    protected $title = 'title';
    protected $time  = 'time';
    protected $thisId = 'id';

    public function _initialize()
    {
        parent::_initialize();
    }


    /**
     * 公用
     */
    public function index()
    {

        //实例化项目表
        $classify = $this->classify;

        $list    = $classify
            ->field('*,date_format(from_unixtime('.$this->time.'), \'%Y-%m-%d %H:%i:%s\') as time')
            ->select();
        $this->assign('name',$this->title);
        $this->assign('id',$this->thisId);
        $this->assign('thisClassName',$this->thisClassName);
        $this->assign('data',$list);
        $this->display();
    }

    /**
     * 添加分类
     */
    public function add()
    {
        if (IS_POST)
        {

            $pay = $this->classify;
            $_POST[$this->time] = time();
            $pay->create();
            if ($pay->add())
            {
                $this -> setLog('添加',$this->thisClassName,"名称={$_POST[$this->title]}");
                $this -> success('添加成功','index','3');
            }
            else
            {
                $this -> setLog('添加',$this->thisClassName,'失败');
                $this -> error('添加失败');
            }
            exit;
        }

    }

    /**
     * 快捷启用停用
     */
    public function update()
    {
        if (IS_GET)
        {
            $users = $this->classify;
            $_POST[$this->thisId] = $_GET['id'];
            $_POST['status']  = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改',$this->thisClassName,"$this->thisId={$_POST[$this->thisId]}");
                $this -> redirect('index');
            }
            else
            {
                $this -> setLog('修改',$this->thisClassName,"失败");
                $this -> redirect('index');
            }
        }

    }

    /**
     * 修改项目分类
     */
    public function change()
    {


        if (IS_POST)
        {
            $rank = $this->classify;
            $rank->create();
            if($rank -> save()){
                $this -> setLog('修改',$this->thisClassName,"$this->thisId={$_POST[$this->thisId]}");
                $this -> success('信息更新成功','index');
            }else{
                $this -> setLog('修改',$this->thisClassName,"失败");
                $this -> error('数据更新失败','index');
            }
            exit;
        }


    }
}