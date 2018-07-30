<?php
/* 管理员信息管理
 * 管理员列表
 * 添加管理员
 *
 * Modifier : 谢鑫磊 ['774084941@qq.com']
 * */
    class AdminAction extends PublicAction{
        //管理员列表显示
        public function index(){

			//实例化管理员表并查询管理员列表
            $Admin = D('admin');
            $list = $Admin -> field('id,aname,truename,phone,email,addtime') -> select();
            foreach($list as &$v){
                $v['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
            }
            $this->assign('list',$list);
            $this -> display();
        }

        /**
         * 添加管理员页面
         */
        public function add(){

			//调用管理员分组方法
            $group = $this -> _group();
            $this -> assign('group',$group);
            $this -> display();
        }
		//添加管理员流程
        public function insert(){
            $Admin = D('admin');
            $_POST['addtime'] = time();
            $_POST['pwd'] = md5($_POST['pwd']);
            $Admin -> create();
            $uid  = $Admin -> add();
            if($uid){
                $auth_group_access = D('auth_group_access');
                $arr  = array(
                    'uid'       => $uid,
                    'group_id'  =>  $_POST['admingroup']
                );
                $auth_group_access->add($arr);
                $this -> setLog('添加','管理员',"{$_POST['aname']}");

                $this -> success('添加成功','index','3');
            }else{

                $this -> setLog('添加','管理员',"失败");
                $this -> error('添加失败');
            }
        }
		//修改管理员页面 展示
        public function mod(){


            $Admin = D('admin');
            $info = $Admin -> field('id,aname,truename,phone,email,status,admingroup') -> find($_GET['id']);
            if($info['status'] == 0){
                $info['check1'] = 'checked';
                $info['check2'] = '';
            }else{
                $info['check1'] = '';
                $info['check2'] = 'checked';    
            }
            $group = $this -> _group($info['admingroup']);
            $this -> assign('group',$group);
            $this -> assign('info',$info);
            $this -> display();
        }
		//修改管理员流程
        public function update(){
            $Admin = D('admin');
            $Admin -> create();
            if($Admin -> save()){
                //修改权限分配表
                $auth_group_access = D('auth_group_access');
                $auth_group_access->db->where('uid',$_POST['id'])
                    ->update(array('group_id'=>$_POST['admingroup']));
                $this -> setLog('修改','管理员',"{$_POST}");
                $this -> success('信息更新成功','index');
            }else{
                $this -> setLog('修改','管理员',"失败");
                $this -> error('数据更新失败',"mod/id/{$_POST['id']}");
            }
        }
		//删除管理员流程
        public function del(){
            $Admin = D('admin');
            $ids = $_POST['ids'] ? $_POST['ids'] : $_GET['id'];
            if($Admin -> delete($ids)){
                //删除
                $auth_group_access = D('auth_group_access');
                $auth_group_access->db->where('uid',$ids)->delete();

                $this -> setLog('删除','管理员',"id = $ids");
                $this -> success('数据删除成功！');
            }else{
                $this -> setLog('删除','管理员',"失败");
                $this -> error('数据删除失败！');
            }
        }
		//管理员详情
        public function view(){
            $Admin = D('admin');
            $info = $Admin -> find($_GET['id']);
            $info['addtime'] = date('Y-m-d H:i:s',$info['addtime']);
            $info['status'] = $info['status']? '禁用':'启用';
            
            $AdminGroup = D('auth_group');
            $where['id'] = $info['admingroup'];
            $info['admingroup'] = $AdminGroup -> where($where) -> getField('title');
            $this -> assign('info',$info);
            $this -> display();    
        }
		//管理员组选择
        private function _group($gid='0'){
            $AdminGroup = D('auth_group');
            $list = $AdminGroup -> field('id,title')
                                -> select();
            $str = '';
            $str .= '<select class="form-control" name="admingroup">';
            foreach($list as $v){
                if($v['id']==$gid){
                    $str .= '<option value="'.$v['id'].'" selected>'.$v['title'].'</option>';
                }else{
                    $str .= '<option value="'.$v['id'].'">'.$v['title'].'</option>';
                }
            }
            $str .= '</select>';
            return $str;
        }

    }
?>
