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

class EditionAction extends PublicAction
{
    /**
     * 列表数据
     */
    public function index()
    {
        $page = D('edition');
        $data = $page
            -> field('id,name,createtime,status')
            -> order('id DESC')
            -> select();
        $this -> assign('data',$data);
        $this -> display();
    }


    /**
     * 添加单页面
     */
    public function add()
    {
        if (IS_POST)
        {
            if (empty($_POST['name']) || empty($_POST['content']))
            {
                $this -> error('参数不足够');
                exit;
            }
            $_POST['createtime'] = time();
            $question = D('edition');
            $question->create();
            if ($question->add())
            {
                $this -> setLog('添加','添加新版本信息',"名称={$_POST['name']}");
                $this -> success('添加成功','index','3');
            }
            else
            {
                $this -> setLog('添加',"添加新版本信息",'失败');
                $this -> error('添加失败');
            }
            exit;
        }


        $this -> display();
    }


    /**
     * 快捷启用停用
     */
    public function update()
    {
        if (IS_GET)
        {
            $users = D('edition');
            $_POST['id'] = $_GET['id'];
            $_POST['status']  = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改','新版本信息',"id={$_POST['id']}");
                $this -> redirect('index');
            }
            else
            {
                $this -> setLog('修改','新版本信息',"失败");
                $this -> redirect('index');
            }
        }

    }

    /**
     * 修改
     */
    public function change()
    {

        $question = D('edition');

        if (IS_POST)
        {
            if (empty($_POST['name']) || empty($_POST['content']))
            {
                $this -> error('你有空白未添');
                exit;
            }
            $question->create();
            if($question -> save()){
                $this -> setLog('修改','新版本信息',"id={$_POST['id']}");
                $this -> success('信息更新成功','index');
            }else{
                $this -> setLog('修改','新版本信息',"失败");
                $this -> error('数据更新失败','index');
            }

            exit;
        }


        $id       = $_GET['id'];

        $data     = $question
            -> where('id='.$id)
            -> find();
        $this -> assign('data',$data);

        $this->display();
    }
}