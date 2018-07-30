<?php
// +----------------------------------------------------------------------
// | 83bid [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright © 2018-2028 AII Rights Reserved
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: 谢鑫磊 < 774084941@qq.com>
// +----------------------------------------------------------------------

class ChatAction extends PublicAction
{

    /**
     * 聊天列表
     */
    public function index()
    {
        $data = D('chat as a')
                ->join('__USERS__ as b on a.send_id=b.id')
                ->join('__USERS__ as c on a.response_id=c.id')
                ->field('a.chat_id,b.neckname as sendneck,b.uname as senduname,c.neckname as responseneck,c.uname as responseuname,date_format(from_unixtime(a.time), \'%Y-%m-%d %H:%i:%s\') as time,a.status')
                ->select();
        $this->assign('data',$data);
        $this->display();
    }


    /**
     * 快速开启关闭
     */
    public function update()
    {
        if (IS_GET)
        {
            $users = D('chat');
            $_POST['chat_id'] = $_GET['id'];
            $_POST['status']  = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改','聊天状态',"rank_id={$_POST['chat_id']}");
                $this -> redirect('index');
            }
            else
            {
                $this -> setLog('修改','聊天状态',"失败");
                $this -> redirect('index');
            }
        }
    }


    /**
     * 聊天详情
     */
    public function details()
    {

        $id   =  $_GET['id'];
        if (empty($id))
        {
            $id = $_POST['id'];
        }
        $chat = D('chat_content as a');
        $data = $chat
            ->join('__USERS__ b on a.send_id=b.id')
            ->join('__EXAMINE__ c on a.examine_id=c.examine_id')

            ->field('a.id,a.status,c.name,b.neckname,b.uname,a.content,a.picture,date_format(from_unixtime(a.sendtime), \'%Y-%m-%d %H:%i\') as time')

            ->where('a.chat_id = '.$id)
            ->order('time')
            ->select();

        $this->assign('data',$data);
        $this->display();
    }


    /**
     * 快速屏蔽
     */
    public function content()
    {
        if (IS_GET)
        {
            $users = D('chat_content');
            $_POST['id'] = $_GET['id'];
            $_POST['status']  = $_GET['status'];
            $users -> create();
            if ($users -> save())
            {
                $this -> setLog('修改','聊天记录',"id={$_POST['id']}");
                $this -> redirect('details',array('id'=>$_POST['id']));
            }
            else
            {
                $this -> setLog('修改','聊天状态',"失败");
                $this -> redirect('details',array('id'=>$_POST['id']));
            }
        }
    }
}