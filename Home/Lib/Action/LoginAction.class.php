<?php
/*   前台用户登陆及注册控制器
 *
 *
 *
 *
 * */
class LoginAction extends PublicAction{
    //登陆页显示
    public function login(){
        $this -> display();
    }
    //登陆验证
    public function checkLogin(){

        if($_SESSION['verify'] != md5($_POST['verify'])){
 		    $this->error('验证码错误！');
 	    }
        $Users = D("users");
        $_POST['pwd'] = md5($_POST['pwd']);
        $data = $Users -> where($_POST) -> find();
        if($data){
            $_SESSION['user'] = $data;
            $this -> success('登录成功','__APP__',3);
        }else{
            $this->error('用户名或密码错误！');
        }

    }
	//Ajax验证验证码
	public function ajaxLog(){

		$vcode = trim($_GET['verify']);

		if(!empty($vcode)){
            // 注册码验证
            if($_SESSION['verify'] == md5($vcode)) {
   				$this->ajaxReturn("verifyTrue");
			}else{
				$this->ajaxReturn("verifyFalse");
			}
		}
    }

    public function logout(){
        $_SESSION['user'] = array();
        $this -> success('登出成功','__APP__',3);  
    }

    //注册页显示
	public function register(){
        $this -> display();    
    }
    //Ajax验证用户名是否存在
    public function ajaxReg(){
		$username = trim($_GET['uname']);
        $Users = D('users');
		$condition['uname'] = $username;
        $result = $Users->where($condition)->find();

	// 如果返回的有数据说明此用户名已存在
		if($result){
			$this->ajaxReturn("UsernameFalse");				
		}else{
			$this->ajaxReturn("UsernameTrue"); 					
		}
		unset($condition);
        
    }
    //注册流程
    public function checkRegister(){

        if($_POST['pwd'] != $_POST['repwd']){
            $this -> error('两次输入的密码不一致，注册失败！');
        }
        $email = $_POST['email'];
		$pat = "/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i"; 
        if(preg_match($pat,$email) == 0){
			$this -> error('电子邮箱格式不正确，注册失败！');
        }
        $pwd = $_POST['pwd'];
        $pat = "/^[a-zA-Z]\w{5,17}$/i";
        if(preg_match($pat,$pwd) == 0){
			$this -> error('密码不符合要求，注册失败！');
        } 
        $Users = D('users');
        $condition['uname'] = $_POST['uname'];
        $result = $Users->where($condition)->find();
        if($result){
            $this -> error('用户名已被使用，注册失败！');
        }
        $_POST['pwd'] = md5($_POST['pwd']);
        $_POST['addtime'] = time();
        $Users -> create();
        $id = $Users -> add();
        if($id){
            $data = $Users -> find($id);
            $_SESSION['user'] = $data;
            $this -> success('注册成功','__APP__',3);
        }else{
            $this -> error('注册失败');
        }
    }
}
