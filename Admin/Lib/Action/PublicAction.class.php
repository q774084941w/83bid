<?php
	/*公共方法
	 *
	 * Modifier : 谢鑫磊 ['774084941@qq.com']
	 **/
    class PublicAction extends Action
    {
        protected $sysmanage;   //网站信息
        protected $authority;   //用户拥有权限
        protected $public = array(
            'admin/Index/login',
            'admin/Index/check',
            'admin/Public/verify',

        );//开放的控制器

        protected $myPower = array(
            'Index',
            'My',
        );//登录后开放的控制器




        /**
         * 初始化数据
         * PublicAction constructor.
         */
        public function _initialize()
        {
            $this->auth();
            //网站基本信息
            $this->website();
            //导航栏
            $this-> leftTree();
        }

        /**
         * 验证码生成
         */
        Public function verify(){
            import('ORG.Util.Image');
            Image::buildImageVerify(5,1,png,30,31,'verify');
        }

        /**
         * 日志操作
         * @param string $behavior
         * @param string $operand
         * @param string $result
         * @param string $operator
         */
        protected function setLog($behavior="登录",$operand="系统",$result="成功",$operator='')
        {
            $syslog = D('syslog');
            if ($operator == '')
            {
                $logs['operator'] = $_SESSION['admin']['aname'];
            }
            else
                {
                $logs['operator'] = $operator;
                }

            if (is_array($result))
            {
                $str = '';
                foreach ($result as $k=>$v)
                {
                    $str .= "{$k}=>{$v};";
                }
                $logs['result'] = $str;
            }
            else
                {
                $logs['result'] = $result;
                }
            $logs['behavior'] = $behavior;
            $logs['operand'] = $operand;
            $logs['dateline'] = time();
            $syslog -> create($logs);
            $syslog -> add();
        }





        /**
         * 网站赋值信息
         */
        public function website()
        {

            if (empty($this->statistics) || empty($this->sysmanage))
            {
                //网站信息
                $Sysmanage = D('sysmanage');
                $data = $Sysmanage -> where("id=1") -> find();


                $this->sysmanage = $data;
            }
            $this -> assign('sysmanage',$this->sysmanage);
        }


        /**
         * 获取地址栏路径
         * @return bool|string
         */
        protected function getTheAddress()
        {
            $url      = $_SERVER['REQUEST_URI'];
            $position = strpos($url,'?');
            $url      = $position==false?$url:substr($url,0,$position);
            $url      = trim($url, '/');
            //将处理的地址转换为数组
            $class    = explode('/',$url);
            //空数组不检查
            if (empty($class))
            {
                return false;
            }
            //查看是否有admin.php
            $number = strpos($class[0],'.');
            $app    = 'admin';
            if ($number)
            {
                $app = substr(array_shift($class),0,$number);
                if ($app=='index')
                {
                    $app = 'home';
                }
            }
            $this->assign('thisNavigation1',$class[0]);
            return $app.'/'.$class[0].'/'.$class[1];
    }



        /**
         * 权限判断
         * @param $adminId
         */
        protected function auth()
        {
            $name   = $this->getTheAddress();

            $class  = explode('/',$name);

            if (in_array($name,$this->public))
            {
                return true;
            }

            $gid = $_SESSION['admin'];

            if (empty($gid))
            {
                //重定向值致登陆页面
                $this->redirect('login');

            }

            if (in_array(ucfirst($class[1]),$this->myPower))
            {
                return true;
            }
            //超级管理员
            if ($gid['id'] == 1)
            {
                return true;
            }
            // 导入Authority
            import('ORG.Util.Authority');

            $auth   = new Authority();

            $result = $auth -> getAuth(strtolower($name),$gid['id']);
            if (!$result)
            {
               $this->error('您没有当前页面的访问权限！');
            }
        }


        /**
         * 导航
         */
        public function leftTree()
        {
            $admin_id = $_SESSION['admin']['id'];

            $in = '';

            if ($admin_id !=1)
            {
                import('ORG.Util.Authority');

                $auth   = new Authority();

                $result = $auth->getGroups($admin_id);

                $rule   = $result[0]['rules'];

                $in     =  ' and id in ('.$rule.')';
            }


            $admin_menu = D('admin_menu');

            $data =     $admin_menu
                -> field('id,parent_id,status,name,list_order,app,controller,action,icon')
                -> where('type = 1 and status = 1 '.$in)
                -> order('list_order')
                -> order('id')
                -> select();
            import('ORG.Net.Tree');
            $tree       = new Tree();
            $tree -> init($data);
            $result = $tree->getTreeArray(0);

            $this -> assign('left',$result);
        }
    }
