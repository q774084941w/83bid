<?php
/*前台项目的控制器
 * */
class ProjectsAction extends PublicAction{
    //项目的列表
    public function index(){
        $Project = D('projects');
        $where['status'] = array('neq','10');
        $list = $Project -> field('id,pnumber,pname,eid,category') -> where($where) -> select();
        $this ->assign('list',$list);
        $this -> display();
    }
    //发布项目的模版
    public function add(){
        if($_SESSION['user']['id'] == ''){
            $this -> error("请登录后再进行该操作！",'__APP__/Login/login',3);
        }
        $category = $this -> _category();
        $needskills = $this -> _needskills();
        $this -> assign('needskills',$needskills);
        $this -> assign('category',$category);
        $this -> display();
    }
    //处理发布项目的方法
    public function insert(){
        $_POST['budget'] = number_format($_POST['budget'],1,'.','');
        $User = D('users');
        $where['id'] = $_SESSION['user']['id'];
        $account = $User -> where($where) -> getField('account');
        
        if($account < $_POST['budget']){
            $this -> error('您的账户余额不足！项目发布失败！','__APP__',3);
        }

        $project = D('projects');
        $_POST['pnumber'] = date("YmdHis").rand(1000,9999);
        $_POST['addtime'] = time();
        $_POST['eid'] = $_SESSION['user']['id'];
        $_POST['needskills'] = implode(',',$_POST['needskills']);
        $project -> create();
        $prestore = $this->_prestore($_POST['budget'],$_POST['pnumber']);
        if($project -> add() && $prestore){
            $this -> success('发布成功','index','3');
        }else{
            $this -> error('发布失败');
        }
    }
     
    public function mod(){
        $project = D('projects');
        $info = $project -> field('id,pname,budget,biddingtime,projecttime,needskills,description') 
                        -> find($_GET['id']);
        $this -> assign('info',$info);
        $this -> display();
    }

    public function update(){
        $project = D('projects');
        $_POST['id'] = $_GET['id'];
        $project -> create();
        if($project -> save()){
            $this -> success('信息更新成功','index');
        }else{
            $this -> error('数据更新失败',"mod/id/{$_POST['id']}");
        }
    }
    
    public function del(){
        $project = D('projects');
        $_POST['status'] = $_GET['status'];
        $project -> create();
        if($project -> save()){
            $this -> redirect($_GET['index']);
        }else{
            $this -> redirect($_GET['index']);
        }
    }
    //项目的详情
    public function view(){

        $Project = D('projects');
        $info = $Project -> find($_GET['id']); 
        switch($info['category']){
            case 1:
                $info['categoryname'] = '网站开发';
                break;
            case 2:
                $info['categoryname'] = '网站设计';
                break;
            case 3:
                $info['categoryname'] = 'SEO营销';
                break;
            case 4:
                $info['categoryname'] = '移动应用';
                break;
            case 5:
                $info['categoryname'] = '文章写作';
                break;
            case 6:
                $info['categoryname'] = '名片设计';
                break;
            case 7:
                $info['categoryname'] = '徽标设计';
                break;
            case 8:
                $info['categoryname'] = '数据输入';
                break;
        }
        switch($info['status']){
            case 0:
                $info['status'] = '正在竞标中';
                break;
            case 1:
                $info['status'] = '正在开发中';
                break;
            case 2:
                $info['status'] = '已完成';
                break;
            case 3:
                $info['status'] = '已完成';
                break;
            case 4:
                $info['status'] = '已完成';
                break;
            case 5:
                $info['status'] = '已完成';
                break;
            case 6:
                $info['status'] = '已完成';
                break;
        }
        //根据项目的雇佣者ID查询用户表的用户名
        $users = D('users');
        $elist = $users -> field("id,uname") -> find($info['eid']);
        $info['euname'] = $elist['uname'];
        //根据项目的中标者ID查询用户表的用户名
        $blist = $users -> field("id,uname") -> find($info['bidderid']);
        $info['buname'] = $blist['uname'];
        

        $info['addtime'] = date('Y-m-d H:i:s',$info['addtime']);

        if($info['bidtime']){
            $info['bidtime'] = date('Y-m-d H:i:s',$info['bidtime']);
        }else{
            $info['bidtime'] = "";
        }

        if($info['endtime']){
            $info['endtime'] = date('Y-m-d H:i:s',$info['endtime']);
        }else{
            $info['endtime'] = "";
        }

        if($info['bid'] >= 1){
            $info['bid'] = $info['bid'].'&nbsp;元';
        }else{
            $info['bid'] = "";
        }
        //根据项目表的项目编号查询竟标者的信息
        $bidders = D('bidders');
        $pnum['pnumber'] = $info['pnumber'];
        $list = $bidders -> where($pnum) -> select(); 
        
        foreach($list as &$v){
            $uid = $v['bidderid'];
            $ulist = $users -> field('id,uname,avatar') 
                            -> find($uid);
            $ulist['uid'] = $ulist['id'];
            unset($ulist['id']);
            $v = array_merge($v,$ulist);
        }

        $this ->assign('info',$info);
        $this ->assign('list',$list);
        $this -> display();
    }
    
    private function _prestore($budget,$pnumber){
        $user = D('users');
        $userwhere['id'] = $_SESSION['user']['id'];
        $user -> where($userwhere) -> setDec('account',$budget);
        $useraccount = D('useraccount');
        $ua['uid'] = $_SESSION['user']['id'];
        $ua['transcash'] = $budget;
        $ua['transinfo'] = '项目'.$pnumber.'预存款';
        $ua['transid'] = '0';
        $ua['transtime'] = time();
        $useraccount -> create($ua);

        $sysaccount = D('sysaccount');
        $sa['pnumber'] = $pnumber;
        $sa['prestore'] = $budget;
        $sa['prestoretime'] = time();
        $sysaccount -> create($sa);

        if($useraccount -> add() && $sysaccount -> add()){
            return true;
        }else{
            $user -> where($userwhere) -> setInc('account',$budget);
            return false;
        }
    }

    private function _category($c='0'){
        if($c=='0'){
            for($i=1;$i<9;$i++){
                $checked[$i] = '';
            }
        }else{
            for($i=1;$i<9;$i++){
                if($c==$i){
                    $checked[$i] = 'selected';
                }else{
                    $checked[$i] = '';    
                }
            }
        }
        $str = '';
        $str .= '<select name="category" class="form-control">';
        $str .= "<option value='1' {$checked['1']}>网站开发</option>";
        $str .= "<option value='2' {$checked['2']}>网站设计</option>";
        $str .= "<option value='3' {$checked['3']}>SEO营销</option>";
        $str .= "<option value='4' {$checked['4']}>移动应用</option>";
        $str .= "<option value='5' {$checked['5']}>文章写作</option>";
        $str .= "<option value='6' {$checked['6']}>名片设计</option>";
        $str .= "<option value='7' {$checked['7']}>徽标设计</option>";
        $str .= "<option value='8' {$checked['8']}>数据输入</option>";
        $str .= '</select>';

        return $str;
    }
    
    private function _needskills(){
        $str = '';
        $str .= "<input type='checkbox' name='needskills[]' value='网站设计'> 网站设计";
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='网络市场'> 网络市场";
        
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='CSS'> CSS";
        $str .= "<input type='checkbox' style='margin-left:23px' name='needskills[]' value='MySQL'> MySQL";
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='Wordpress'> Wordpress";
        $str .= "<br/>";
        $str .= "<input type='checkbox' name='needskills[]' value='移动电话'> 移动电话";
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='数据输入'> 数据输入";  
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='文章'> 文章";  
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='安卓'> 安卓";  
        $str .= "<input type='checkbox' style='margin-left:36px' name='needskills[]' value='SEO'> SEO";  
        $str .= "<br/>"; 
        $str .= "<input type='checkbox' name='needskills[]' value='平面设计'> 平面设计";  
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='软件构架'> 软件构架";   
        $str .= "<input type='checkbox' style='margin-left:20px' name='needskills[]' value='PHP'> PHP";
        $str .= "<input type='checkbox' style='margin-left:21px' name='needskills[]' value='HTML'> HTML";
        $str .= "<input type='checkbox' style='margin-left:26px' name='needskills[]' value='iPhone'> iPhone";
        return $str;  
    }
}
