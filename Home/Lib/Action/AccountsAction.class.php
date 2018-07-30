<?php
/* 前台用户账户控制器
 *
 */
class AccountsAction extends PublicAction {

    public function index(){
        $this -> redirect('transout');    
    }
    
    //用户账户转出记录
    public function transout(){
        $Accounts = D('useraccount');
        import('ORG.Util.Page');// 导入分页类
        $condition['uid'] = $_SESSION['user']['id'];
        $count = $Accounts -> where($condition) -> count();// 查询满足要求的总记录数
        $Page = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page -> show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Accounts -> where($condition)
                          -> order('transtime desc')
                          -> limit($Page->firstRow.','.$Page->listRows)
                          -> select();

        $Users = D('users');
        foreach($list as &$v){
            if($v['transid'] != '0'){
            $trans['id'] = $v['transid'];
            $user = $Users -> where($trans) -> find();
            $v['uname'] = $user['uname'];
            $v['avatar'] = $user['avatar'];
            }else{
                $v['uname'] = '系统';
                $v['avatar'] = 'system.jpg';     
            }
            $v['transtime'] = date('Y/m/d H:i:s',$v['transtime']);      
        }
        
        $where['id'] = $_SESSION['user']['id'];
        $balance = $Users -> where($where) -> getField('account');
        $this -> assign('balance',$balance);
        $this -> assign('list',$list);// 赋值数据集
        $this -> assign('page',$show);// 赋值分页输出
        $this -> display(); // 输出模板   
    }

    //用户账户转入记录
    public function transin(){
        $Accounts = D('useraccount');
        import('ORG.Util.Page');// 导入分页类
        $condition['transid'] = $_SESSION['user']['id'];
        $count = $Accounts -> where($condition) -> count();// 查询满足要求的总记录数
        $Page = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page -> show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Accounts -> where($condition)
                          -> order('transtime desc')
                          -> limit($Page->firstRow.','.$Page->listRows)
                          -> select();

        $Users = D('users');
        foreach($list as &$v){
            if($v['uid']!= '0'){
            $trans['id'] = $v['uid'];
            $user = $Users -> where($trans) -> find();
            $v['uname'] = $user['uname'];
            $v['avatar'] = $user['avatar'];
            }else{
                $v['uname'] = '系统';
                $v['avatar'] = 'system.jpg';    
            }
            $v['transtime'] = date('Y/m/d H:i:s',$v['transtime']);      
        }
        
        $where['id'] = $_SESSION['user']['id'];
        $balance = $Users -> where($where) -> getField('account');
        $this -> assign('balance',$balance);
        $this -> assign('list',$list);// 赋值数据集
        $this -> assign('page',$show);// 赋值分页输出
        $this -> display(); // 输出模板   
    }

    //用户新增转账页面
    public function add(){
        $Users = D('users');
        $where['id'] = $_SESSION['user']['id'];
        //获取当前用户的账户余额分配到页面
        $balance = $Users -> where($where) -> getField('account');
        $this -> assign('balance',$balance);
        $this -> display();
    }

    //用户新增转账处理
    public function insert(){
        $transcash = number_format($_POST['transcash'],1);
        $balance = number_format($_POST['balance'],1,'.','');
        $newbalance = $balance - $transcash;

        //判断转账金额是否高于账户余额
        if($newbalance < 0){
            $this -> error('转账失败！转账金额不能高于账户余额！');
        }

        $Users = D('users');
        $condition['uname'] = $_POST['uname'];
        $user = $Users -> where($condition)
                       -> find();

        //判断转入用户是否存在
        if(!$user){
            $this -> error('转账失败！输入的用户不存在！');    
        }
        $Accounts = D('useraccount');
        
        $transout['uid'] = $_SESSION['user']['id'];

        $transout['transcash'] = $transcash;
        $transout['transinfo'] = $_POST['transinfo'];
        $transout['transid'] = $user['id'];
        $transout['transtime'] = time();
        $Accounts -> create($transout); 

        $where['id'] = $transout['uid'];
        $Users -> where($where) -> setDec('account',$transcash);
        $Users -> where($user) -> setInc('account',$transcash);

        if($Accounts -> add()){
            $this -> success('转账成功！','index',3);
        }else{
            $this -> error('转账失败！');
        }
    }

    //用户账户转账详情查看
    public function view(){
        $Accounts = D('useraccount');
        $info = $Accounts -> find($_GET['id']);
        $Users = D('users');
        $out['id'] = $info['uid'];
        $in['id'] = $info['transid'];
        $info['outuname'] = $Users -> where($out) -> getField('uname');
        $info['inuname'] = $Users -> where($in) -> getField('uname');
        $info['transtime'] = date('Y-m-d H:i:s',$info['transtime']);
        $this -> assign('info',$info);
        $this -> display();
    }
}
