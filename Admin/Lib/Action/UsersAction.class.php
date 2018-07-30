<?php
	/*用户管理
	 *
	 * Modifier : 谢鑫磊 ['774084941@qq.com']
	 **/
    class UsersAction extends PublicAction{

        /**
         * 默认跳转
         */
        function index()
        {
           $this -> redirect('dlist');
        }


        /**
         * 用户列表
         */
        function dlist()
        {


           $users = D('users'); 

           $list = $users -> field('id,uname,neckname,status,certification,rank')
                          -> select();
           foreach ($list as &$v)
           {
               switch ($v['status'])
               {
                    case 0:
                        $v['status'] = '禁用';
                        break;
                    case 1:
                        $v['status'] = '启用';
                        break;
               }
           }
           $this -> assign('list',$list);
           $this -> display();
        }


        /**
         * 添加用户页面
         */
        function add()
        {
            $data = ProjectsAction::classify('skill','','skill_id,name');
            $this -> assign('skill',$data);
            $this -> display();
        }


        /**
         * 添加用户提交
         */
        function insert()
        {
            $users            = D('users');
            $skills           = $_POST['skills'];
            $_POST['skills']  = implode(',',$_POST['skills']);
            $_POST['addtime'] = time();
            $_POST['pwd']     = md5($_POST['pwd']);
            $_POST['avatar']  = $this -> upload();
            $users -> create();
            if ($users -> add())
            {

                $id     = $users->getLastInsID();

                $this -> foreachTo($skills,$id);

                $this -> setLog('添加','用户',"用户名={$_POST['uname']}");

                $this -> success('添加成功','index','3');

            }
            else
            {

                $this -> setLog('添加','用户','失败');

                $this -> error('添加失败');
            }
        }

        /**
         * 循环加入
         * @param $skills
         * @param $id
         */
        protected function foreachTo($skills,$id,$table='users_skill')
        {
            if (empty($skills) || empty($id))
            {
                return false;
            }
            $class = D($table);
            foreach ($skills as $val)
            {
                $array = array
                (
                    'id'        => $id,
                    'skill_id'  => $val,
                );
                $class->add($array);
            }
        }


        /**
         * 上传头像
         * @return mixed
         */
        function upload()
        {
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();
            $upload->maxSize  = 3145728 ;
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
            $upload->savePath =  './Public/Images/';
            if (!$upload->upload())
            {
                $this->error($upload->getErrorMsg());
            }
            else
                {
                $info =  $upload->getUploadFileInfo();
            }
            return $info[0]['savename'];
        }


        /**
         * 修改页面
         */
        function mod()
        {

            $this -> display();
        }


        /**
         * 快速修改提交
         */
        function update()
        {
            $users = D('users');
            $_POST['id'] = $_GET['id'];
            $_POST['status'] = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改','用户',"id={$_POST['id']}");
                $this -> redirect($_GET['list']);
            }
            else
                {
                $this -> setLog('修改','用户',"失败");
                $this -> redirect($_GET['list']);
            }
        }


        /**
         * 详情页面
         */
        function view()
        {
            $users = D('users');
            $info  = $users -> find($_GET['id']);
            $info['addtime'] = date('Y-m-d H:i:s',$info['addtime']);
            $this -> assign('info',$info);

            $skill = D('skill as a');
            $data  = $skill
                -> join('__USERS_SKILL__ as b on a.skill_id=b.skill_id')
                -> field('a.name')
                -> where('a.id='.$_GET['id'])
                -> select();
            $this -> assign('skill',$data);
            $this -> display();
        }


        /**
         * 实名认证
         * @return bool
         */
        public function certification()
        {
            $admin = session('admin');
            if ($admin['id']!=1)
            {
                $this->error('你无权查看');
                return false;
            }


            $id = $_GET['id'];

            //身份证认证
            $id_card = D('users_id_card');
            $data    = $id_card
                -> where('users_id='.$id)
                -> find();
            $this -> assign('data',$data);

            $users = D('users');
            $info = $users ->field('id,uname') -> find($_GET['id']);
            $this -> assign('info',$info);

            //认证公司
            $id_card = D('users_company');
            $company    = $id_card
                -> field('id,company,address')
                -> where('users_id='.$id)
                -> select();
            $this -> assign('company',$company);

            $this -> display();
        }


        /**
         * 认证公司详情
         * @return bool
         */
        public function company()
        {
            $admin = session('admin');
            if ($admin['id']!=1)
            {
                $this->error('你无权查看');
                return false;
            }

            $id = $_GET['id'];
            //认证公司
            $id_card = D('users_company');
            $company    = $id_card
                -> where('id='.$id)
                -> find();

            $company['picture'] = unserialize($company['picture']);

            $this -> assign('company',$company);

            $this -> display();

        }


        /**
         * 账户详情
         */
        public function account()
        {
            $id = $_GET['id'];

            $money = D('useraccount as a');

            if (empty($id))
            {
                $this->error('缺少产数','index');
                exit;
            }

            $data  = $money
                -> field('a.id,b.name,c.title,a.transcash,a.transtype,date_format(from_unixtime(a.transtime), \'%Y-%m-%d %H:%i:%s\') as time')
                -> join('__PAYMENT__ b on a.payment_id=b.payment_id')
                -> join('__MONETARY__ c on a.monetary_id=c.monetary_id')
                -> where('a.uid='.$id)
                -> select();


            $this -> assign('data',$data);
            $this -> display();
        }
    }
