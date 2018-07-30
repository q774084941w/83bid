<?php
/* 项目管理模块
 * 
 * 项目列表显示和项目详情的展示
 *
 * Modifier : 谢鑫磊 ['774084941@qq.com']
 *  */
class ProjectsAction extends PublicAction
{
    protected $classify;

    public function _initialize()
    {
        parent::_initialize();
        $this->classify =  D('projects as a');
    }



    /**
     * 项目列表页面
     */
    public function index()
    {

        $where = '';
        if (isset($_GET['status']))
        {
            $where = 'a.status='.$_GET['status'];
        }

		//实例化项目表
        $Project = $this->classify ;
		//查询项目表内容
        $list = $Project
            -> join('__CLASSIFY__ as b on a.classify_id=b.id')
            -> join('__USERS__ as c on a.eid=c.id')
            -> join('__EXAMINE__ as d on a.examine_id=d.examine_id')
            -> field('a.id,a.pnumber,a.pname,c.uname as eid,a.status,b.name as category,a.work_num,a.delivery,d.name')
            -> where($where)
            -> select();
        $this ->assign('list',$list);
        $this -> display();
    }


    /**
     * 项目详情
     */
    public function view()
    {
        //项目详情展示
        $Project = $this->classify;
        $info = $Project
            -> field('a.*,b.name as category,c.uname as eid')
            -> join('__CLASSIFY__ as b on a.classify_id=b.id')
            -> join('__USERS__ as c on a.eid=c.id')
            -> where("a.id={$_GET['id']}")
            -> find();
		$info['addtime']     = date('Y-m-d H:i:s',$info['addtime']);


		switch ($info['status'])
            {
            case 0:
                $info['status'] = '正在竞标中';
                break;
            case 1:
                $info['status'] = '正在开发中';
                break;
            default:
                $info['status'] = '已完成';
			}
			

        $this ->assign('info',$info);

		$question  = D('projects_question');

		$data      = $question
            -> field('id,question,time')
            -> where("projects_id = {$_GET['id']} and status = 1")
            -> select();

        $this -> assign('question',$data);

        $this -> display();
    }


    /**
     * 添加项目
     */
    public function add()
    {
        //添加处理
        if (IS_POST)
        {
            $project = D('projects');
            $_POST['pnumber'] = date("YmdHis").rand(1000,9999);
            $_POST['addtime'] = time();
            $_POST['eid'] = $_SESSION['admin']['id'];

            if (isset($_FILES['enclosure'])&&!empty($_FILES['enclosure']['name']))
            {
                $result = self::upload();
                if ($result['code']==0000)
                {
                    $this->error($result['msg']);
                    exit;
                }
                $_POST['enclosure'] = $result['msg'];
            }

            $project -> create();
            if ($project -> add())
            {

                if (!empty($_POST['question']))
                {
                    $id  = $project->getLastInsID();

                    foreach ($_POST['question'] as $val)
                    {
                        $obj = D('projects_question');
                        $array = array(
                            'projects_id' => $id,
                            'question'    => $val,
                            'time'        => time(),
                        );
                        $obj->add($array);
                    }
                }
                $this -> setLog('添加','项目信息',"名称={$_POST['pname']}");
                $this -> success('添加成功','index','3');
            }
            else
            {
                $this -> setLog('添加','项目信息','失败');
                $this -> error('添加失败','index');
            }
            exit;

        }

        //币值
        $list = self::classify('monetary','','monetary_id,title,conversion');
        $this -> assign('monetary',$list);

        //项目分类
        $list = self::classify('classify','','id,name');
        $this->assign('classify',$list);

//        //技能
//        $list = self::classify('skill','','skill_id,name');
//        $this -> assign('skill',$list);
//
//
//        //行业
//        $list = self::classify('applic','','applic_id,name');
//        $this->assign('applic',$list);
//
//        //框架
//        $list = self::classify('frame','','frame_id,name');
//        $this->assign('frame',$list);

        $this -> display();
    }

    /**
     * 上传文件
     * @return string
     */
    public static function upload()
    {
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $result = $upload->upload("Uploads/projectFile/".$_POST['pnumber'].'/');

        $enclosure = '';
        if ($result)
        {

            $files = $upload->getUploadFileInfo();
            foreach ($files as $val)
            {
                $enclosure .= $val['savepath'].$val['savename'];
            }

            $code = 1111;
        }
        else
        {
            $code = 0000;
            $enclosure = $upload->getErrorMsg();

        }
        $ret = array('code'=>$code,'msg'=>$enclosure);
        return $ret;
    }











    /**
     * 工作人员
     */
    public function work()
    {
        $param = $_GET;

        if (empty($param['id']))
        {
            $this->error('缺少参数','index');
            exit;
        }

       $status = 0;

        if (!empty($param['type']))
        {
            $status = $param['type'];
        }
        $work = D ('projects_worker as a');
        //投标人信息
        $data = $work
            ->field('a.id,a.monetary_id,a.bond,a.result,b.uname,c.title,a.status,date_format(from_unixtime(a.createtime), \'%Y-%m-%d %H:%i:%s\') as createtime')
            ->join('__USERS__ as b on a.users_id=b.id')
            ->join('__MONETARY__ as c on a.monetary_id=c.monetary_id')
            -> where('projects_id = '.$param['id'].' and result >='.$status)
            -> select();

        $this->assign('data',$data);

        //项目基本信息
        $project = $this->classify;
        $data    = $project
            -> join('__USERS__ as b on a.eid=b.id')
            -> field('a.id,a.pnumber,a.pname,b.uname')
            -> where('a.id = '.$param['id'])
            -> find();
        $this->assign('project',$data);

        $this->display();
    }


    /**
     * 单独详情
     */
    public function worker()
    {


        if (empty($_GET['id']))
        {
            $this -> error('缺少重要参数','index');
        }

        $work = D ('projects_worker as a');

        //投标人信息
        $data = $work
            ->field('a.*,b.uname,c.title,date_format(from_unixtime(a.createtime), \'%Y-%m-%d %H:%i:%s\') as createtime,d.pnumber,d.pname')
            ->join('__USERS__ as b on a.users_id=b.id')
            ->join('__MONETARY__ as c on a.monetary_id=c.monetary_id')
            ->join('__PROJECTS__ as d on a.projects_id=d.id')
            -> where('a.id = '.$_GET['id'])
            -> find();


        $this -> assign('info',$data);


        $work = D ('projects_worker as a');
        $data  = $work
            -> field('a.id,a.answer,a.time,c.question')
            -> join('__PROJECTS_ANSWER__ as b on a,id=b.worker_id')
            -> join('__PROJECTS_QUESTION__ as c on a.id=c.question_id')
            -> where('a.id = '.$_GET['id'].'and status=1')
            -> select();
        $this -> assign('answer',$data);
        $this -> display();
    }

    /**
     * 分类表
     * @param $table
     * @param string $where
     * @param string $field
     * @return mixed
     */
    public static function classify($table,$where='',$field='*')
    {
        $object = D($table);

        $data   = $object
            -> field($field)
            -> where('status = 1 '.$where)
            -> select();
        return $data;
    }
}
