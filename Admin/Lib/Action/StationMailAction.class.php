<?php
	/*站内信管理
	 *
	 *
	 **/
    class StationMailAction extends PublicAction{
		//站内信列表
        function index(){


            $stationmail = D('stationmail');
            $list = $stationmail -> field('id,title,senderid,receiverid,sendtime,outstatus')
                                 -> select();
            foreach($list as &$v){
               switch($v['outstatus']){
                    case 0:
                        $v['outstatus'] = '未读';
                        break;
                    case 1:
                        $v['outstatus'] = '已读';
                        break;
               }
               $v['sendtime'] = date('Y-m-d H:i:s',$v['sendtime']);
            }
            $this -> assign('list',$list);
            $this -> display();
        }
		//站内信详情展示
        function view(){
            $stationmail = D('stationmail');
            $info = $stationmail -> find($_GET['id']);
             switch($info['outstatus']){
                case 0:
                    $info['outstatus'] = '未读';
                    break;
                case 1:
                    $info['outstatus'] = '已读';
                    break;
            }
            $info['sendtime'] = date('Y-m-d H:i:s',$info['sendtime']);
            $this -> assign('info',$info);
            $this -> display();
        }
    }
