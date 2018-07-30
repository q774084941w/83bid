<?php
	/*评论管理
	 *
	 **/
    class CommentsAction extends PublicAction{
		//开发者评论列表显示
        function dlist()
        {
            $Comments = D('comments as a');
            $list = $Comments
                -> join('__USERS__ as b on a.byreviewerid=b.id')
                -> join('__USERS__ as d on a.reviewerid=d.id')
                -> field('a.id,a.pnumber,b.uname as byreviewerid,b.neckname as byneckname,a.comtime,a.averagelevel,a.status,d.uname as reviewerid,d.neckname as reneckname')
                -> select();

            $this->assign('list',$list);
            $this -> display();
        }


        /**
         * 快捷修改状态
         */
        public function update()
        {


            $Comments        = D('comments');
            $_POST['id']     = $_GET['id'];
            $_POST['status'] = $_GET['status'];
            $Comments -> create();
            if ($Comments -> save())

            {
                $this -> setLog('修改','评论',"id = {$_POST['id']}的状态");
                $this -> redirect('dlist');
            }
            else
                {
                $this -> setLog('修改','评论',"失败！");
                $this -> error('数据更新失败');
            }
        }

        /**
         * 删除评论
         */
        function del()
        {
            $Comments = D('comments');
            if ($Comments -> delete($_GET['id']))
            {
                $this -> setLog('删除','评论',"id = {$_GET['id']}的状态");
                $this -> success('数据删除成功！');
            }
            else
                {
                $this -> setLog('删除','评论',"失败");
                $this -> error('数据删除失败！');
            }
        }

        /**
         * 评论详情
         */
        public function view()
        {
            $Comments = D('comments as a');
            $info = $Comments
                -> join('__USERS__ as b on a.byreviewerid=b.id')
                -> join('__USERS__ as d on a.reviewerid=d.id')
                -> field('a.*,b.uname as byreviewerid,b.neckname as byneckname,d.uname as reviewerid,d.neckname as reneckname')
                ->where('a.id='.$_GET['id'])
                -> find();

            $info['comtime'] = date('Y-m-d H:i:s',$info['comtime']);
            $info['status'] = $info['status'] ? '隐藏':'显示';
            $this -> assign('info',$info);
            $this -> display();    
        }

    }
?>
