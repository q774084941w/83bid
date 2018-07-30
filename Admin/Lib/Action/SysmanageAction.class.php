<?php
/* 后台站点配置控制器
 *
 *  Modifier : 谢鑫磊 ['774084941@qq.com']
 * 
 * */
class SysmanageAction extends PublicAction {

    /**
     * 网站信息修改页面
     */
    public function index()
    {


        $Sysmanage = D('sysmanage');
        $info = $Sysmanage -> where('id=1') -> find();
        $info['lasttime'] = date('Y-m-d H:i:s',$info['lasttime']);
        $this ->assign('info',$info);
        $this ->display();
    
    }

	//修改流程
    public function update(){

        if (!empty($_FILES))
        {
            $this->upload();
        }
        $Sysmanage = D('sysmanage');
        $_POST['lasttime'] = time();
        if ($Sysmanage -> where('id=1') ->save($_POST))
        {
            $this -> setLog('修改','站点配置',"{$_POST}");
            $this -> success('更新成功','index','4');
        }
        else
            {
            $this -> setLog('修改','站点配置',"失败");
            $this -> error('更新失败');
        }
       
    }

    /**
     * 上传图片
     */
    public function upload()
    {
        import('ORG.Net.UploadFile');
        $UploadFile = new UploadFile();

        if (!empty($_FILES['logo']))
        {
            $info = $UploadFile->uploadOne($_FILES['logo'],'Uploads/Public/Images/');
            $_POST['logo'] = $info[0]['savepath'].$info[0]['savename'];
        }
        if (!empty($_FILES['icon']))
        {
            $info = $UploadFile->uploadOne($_FILES['icon'],'Uploads/Public/Images/');
            $_POST['icon'] = $info[0]['savepath'].$info[0]['savename'];
        }
    }
}
