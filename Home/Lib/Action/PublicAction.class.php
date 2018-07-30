<?php
//前台公共控制器
class PublicAction extends Action{

    /**
     * 验证码生成
     */
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify(5,1,png,30,31,'verify');
    }

    /**
     * 获取网站信息
     * PublicAction constructor.
     */
		public function _initialize()
        {
            //网站信息
			$Sysmanage = D('sysmanage');
            $data = $Sysmanage -> where("id=1") -> find();

            $Users = D('users');
            $statistics['users'] = $Users -> count();

            $Projects = D('projects');
            $statistics['projects'] = $Projects -> count();

            $Sysaccount = D('sysaccount');
            $statistics['account'] = $Sysaccount -> sum('prestore');

            foreach($statistics as &$v)
            {
                $v = number_format($v,0,'.',',');
            }
            $this -> assign('statistics',$statistics);
			$this -> assign('sysmanage',$data);
		}
	}
?>
