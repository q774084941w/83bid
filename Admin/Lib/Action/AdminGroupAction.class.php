<?php
	/*管理组管理
	 *
	 * Modifier : 谢鑫磊 ['774084941@qq.com']
	 **/
    class AdminGroupAction extends PublicAction
    {

        /**
         * 管理员组的列表显示
         */
        function index()
        {


            $AdminGroup = D('auth_group');
            $list = $AdminGroup -> field('id,title,creator,addtime') -> select();
            foreach ($list as &$v)
            {
                $v['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
            }
            $this -> assign('list',$list);
            $this -> display();
        }


        /**
         * 添加管理组页面显示
         */
        function add()
        {
            $this -> display();
        }

		//添加管理组流程
        function insert()
        {

            $AdminGroup = D('auth_group');
            $_POST['creator'] = "admin";
            $_POST['addtime'] = time();
            $_POST['rules'] = implode(',',$_POST['limits']);
            $AdminGroup -> create();
            if ($AdminGroup -> add())
            {


                $this -> setLog('添加','管理员组',"{$_POST['groupname']}");
                $this -> success('添加成功','index','3');
            }
            else
                {

                $this -> setLog('添加','管理员组',"失败");
                $this -> error('添加失败');
            }
        }

        /**
         * 修改页面
         */
        function mod()
        {

            $rule = D('auth_rule');
            $data = $rule
                -> field('id,title')
                -> select();
            $this -> assign('rule',$data );

            $AdminGroup = D('auth_group');
            $info = $AdminGroup -> field('id,title,rules') -> find($_GET['id']);
            $info['permissions'] = explode(',',$info['rules']);
            $checked = array();

            foreach ($data as $key=>$val)
            {
                if (in_array($val['id'],$info['permissions']))
                {
                    $checked[$key] = 'checked';
                }
                else
                    {
                    $checked[$key] = '';
                }
            }
            $this -> assign('checked',$checked);
            $this -> assign('info',$info);
            $this -> display();
        }


        /**
         * 修改提交处理
         */
        function update()
        {
            $AdminGroup = D('auth_group');
            $_POST['rules'] = implode(',',$_POST['limits']);
            $AdminGroup -> create();
            if ($AdminGroup -> save())
            {
                $this -> setLog('修改','管理员组',"id = {$_POST['id']}");
                $this -> success('信息更新成功','index');
            }
            else
                {
                $this -> setLog('修改','管理员组',"失败");
                $this -> error('数据更新失败',"mod/id/{$_POST['id']}");
            }
        }
		//删除管理组流程
        function del()
        {
            $AdminGroup = D('auth_group');
            $ids = $_POST['ids'] ? $_POST['ids'] : $_GET['id'];
            if ($AdminGroup -> delete($ids))
            {
                $this -> setLog('删除','管理员组',"id = $ids");
                $this -> success('数据删除成功！');
            }
            else
                {
                $this -> setLog('删除','管理员组',"失败");
                $this -> error('数据删除失败！');
            }
        }
		//管理组详情显示
        function view()
        {
            $AdminGroup = D('auth_group');
            $info = $AdminGroup -> find($_GET['id']);
            $info['addtime'] = date('Y-m-d H:i:s',$info['addtime']);
            $this -> assign('info',$info);
            $this -> display();
        }
    }
?>
