<?php
    class UserAction extends PublicAction{
        
        //用户中心首页
        function index(){               
           $users = D('users');                                     //实例化user模型
           $info = $users -> where("id={$_SESSION['user']['id']}")  //查询登录用户的信息
                          -> find();
               switch($info['rank']){
                    case 0:                                         //状态转义
                        $info['rank'] = '开发者';
                        break;
                    case 1:
                        $info['rank'] = '雇佣者';
                        break;
                    case 2:
                        $info['rank'] = '开发者+雇佣者';
                        break;
               }
           
           $info['addtime'] = date('Y-m-d H:i:s',$info['addtime']);     //转换为正常添加时间

           $projects = D('projects');
           $outpro['eid'] = $_SESSION['user']['id'];
           $info['outpronum'] = $projects -> where($outpro) -> count();

           $inpro['bidderid'] = array('eq',$_SESSION['user']['id']);
           $inpro['status'] = array('egt','2');
           $info['inpronum'] = $projects -> where($inpro) -> count();
        
           $income['bidderid'] = array('eq',$_SESSION['user']['id']);
           $income['status'] = array('egt','3');
           $info['income'] = $projects -> where($income) -> sum('bid');
           
           $this -> assign('info',$info);                               //向前台页面分配变量
           $this -> display();                                          //分配模板
        }

        //用户中心修改头像页
        function modavatar(){
            $users = D('users');
            $info = $users -> where("id={$_SESSION['user']['id']}") 
                            -> find();
            $this -> assign('info',$info);
            $this -> display();
        }

        //用户中心修改头像处理
        function insert(){
            $users = D('users');
            $info = $users -> where("id={$_SESSION['user']['id']}") 
                           -> find();
            $_POST['id'] = $info['id'];                             //绑定添加ID
            $_POST['avatar'] = $info1[0]['savename'];               //定义向数据库添加的头像名称
            $_POST['avatar'] = $this -> upload();                   //调用upload方法
            $users -> create();                                     //创建users数据对象
            if($users -> save()){                                   //把用户对象写入数据表中
                $this -> success('修改头像成功','index','3');       //数据写入成功跳转到主页面
            }else{
               $this -> error('修改头像失败');                      //写入失败提示错误
            }
        }

        //用户中心修改基本信息页
        function modinfo(){
           $users = D('users'); 
           $info = $users -> where("id={$_SESSION['user']['id']}") 
                          -> find();
           $this -> assign('info',$info);
           $this -> display();
        }

        //用户中心修改基本信息处理
        function infoupdate(){
            $users = D('users');
            $users -> create();
            if($users -> save()){
                $this -> success('信息修改成功！','__URL__/modinfo',3);
            }else{
                $this -> error('信息修改失败！');
            }
        }

        //用户中心修改密码页
        function modpwd(){
            $this -> display();
        }

        //用户中心修改密码处理
        function pwdupdate(){
            if($_POST['newpwd'] != $_POST['renewpwd']){
                $this -> error('两次输入密码不一致！');
            }

            $pat = "/^[a-zA-Z]\w{6,18}/i";

			if(preg_match($pat,$_POST['newpwd']) == 0){
			    $this -> error('密码不符合要求，以字母开头6-18位。');
            }

            $users = D('users');
            $where['id'] = $_SESSION['user']['id'];
            $oldpwd = $users -> where($where) -> getField('pwd');
            if(md5($_POST['oldpwd'])!= $oldpwd){
                $this -> error('原密码输入错误！');
            }
            $newpwd = md5($_POST['newpwd']);
            $res = $users -> where($where) -> setField('pwd',$newpwd);
            if($res){
                $this -> success('密码修改成功！','__URL__/index',3);
            }else{
                $this -> error('密码修改失败！');
            }
        }

        //上传头像方法
        function upload(){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();                             //实例化上传类
            $upload->maxSize  = 3145728 ;                            //设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');   //设置附件上传类型
            $upload->savePath =  './Uploads/users/';                    //设置附件上传目录
            if(!$upload->upload()) {
                $this->error($upload->getErrorMsg());                   //上传错误信息提示
            }else{
                $info1 =  $upload->getUploadFileInfo();                 //上传成功 获取上传文件信息
            }
            return $info1[0]['savename'];
        }
         
    }

