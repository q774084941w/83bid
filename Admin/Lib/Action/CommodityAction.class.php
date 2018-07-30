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

class CommodityAction extends PublicAction
{
    /**
     * 列表数据
     */
    public function index()
    {
        $page = D('commodity as a');
        $data = $page
            -> join('__EXAMINE__ as b on a.examine_id=b.examine_id')
            -> field('a.id,a.pnumber,a.title,a.img,a.price,a.createtime,a.status,b.name')
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
            if (empty($_POST['title']) || empty($_POST['content'])|| empty($_POST['projects'])|| empty($_POST['price']) || empty($_POST['install'])|| empty($_POST['modify']))
            {
                $this -> error('参数缺少');
                exit;
            }
            if (empty($_FILES['img']))
            {
                $this -> error('没有封面图片');
                exit;
            }
            $this -> upload($_FILES['img']);
            $_POST['createtime']  =  time();
            $projects             =  explode(',',$_POST['projects']);
            $_POST['projects_id'] =  $projects[0];
            $_POST['pnumber']     =  $projects[1];
            $question = D('commodity');
            $question->create();
            if ($question->add())
            {
                $this -> setLog('添加','上架项目',"名称={$_POST['title']}");
                $this -> success('添加成功','index','3');
            }
            else
            {
                $this -> setLog('添加',"上架项目",'失败');
                $this -> error('添加失败');
            }
            exit;
        }

        $monetary = D('monetary');
        $list     = $monetary
            -> field('monetary_id,title')
            -> where('status=1')
            -> select();
        $this -> assign('monetary',$list);

        $projects = D('projects');
        $list     = $projects
            -> field('id,pnumber')
            -> where('endtime != 0 and status=2')
            -> select();
        $this -> assign('list',$list);
        $this -> display();
    }

    /**
     * 上传图片
     */
    public function upload($file)
    {
        import('ORG.Net.UploadFile');
        $UploadFile = new UploadFile();
        $info = $UploadFile->uploadOne($file,'Uploads/Commodity/'.date('Ymd',time()).'/');
        $_POST['img'] = '/'.$info[0]['savepath'].$info[0]['savename'];
    }

    /**
     * 修改
     */
    public function change()
    {

        $question = D('commodity');

        if (IS_POST)
        {
            if (empty($_POST['title']) || empty($_POST['content'])|| empty($_POST['projects'])|| empty($_POST['price']) || empty($_POST['install'])|| empty($_POST['modify']))
            {
                $this -> error('你有空白未添');
                exit;
            }
            if (!empty($_FILES['img']))
            {
                $this -> upload($_FILES['img']);
            }
            $projects             =  explode(',',$_POST['projects']);
            $_POST['projects_id'] =  $projects[0];
            $_POST['pnumber']     =  $projects[1];
            $question->create();
            if($question -> save()){
                $this -> setLog('修改','上架项目',"id={$_POST['id']}");
                $this -> success('信息更新成功','index');
            }else{
                $this -> setLog('修改','上架项目',"失败");
                $this -> error('数据更新失败');
            }

            exit;
        }


        $id       = $_GET['id'];

        $data     = $question
            -> where('id='.$id)
            -> find();
        $this -> assign('data',$data);

        $projects = D('projects');
        $list     = $projects
            -> field('id,pnumber')
            -> where('endtime!=0')
            -> select();
        $this -> assign('list',$list);

        $this-> display();
    }


    /**
     * 快捷启用停用
     */
    public function update()
    {
        if (IS_GET)
        {
            $users            = D('commodity');
            $_POST['id']      = $_GET['id'];
            $_POST['status']  = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改','上架项目',"id={$_POST['id']}");
                $this -> redirect('index');
            }
            else
            {
                $this -> setLog('修改','上架项目',"失败");
                $this -> redirect('index');
            }
        }

    }

    /**
     * 详情查看
     */
    public function view()
    {

        $question = D('commodity as a');
        $id       = $_GET['id'];

        $data     = $question
            -> join('__EXAMINE__ as b on a.examine_id=b.examine_id')
            -> field('a.*,b.name as examine')
            -> where('id='.$id)
            -> find();
        $data['createtime'] = date('Y-m-d H:i:s',$data['createtime']);
        $this -> assign('data',$data);
        $this ->display();
    }
}