<?php
	/*统计管理
	 *
	 **/
    class StatisticsAction extends PublicAction{
		//列表显示
        function index()
        {

            $Statistics = D('statistics');

            $list = $Statistics
                -> field('id,utotal,ptotal,atotal')
                -> select();
            $this->assign('list',$list);
            $this -> display();
        }

    }
?>
