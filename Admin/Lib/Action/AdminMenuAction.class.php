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

class AdminMenuAction extends PublicAction
{


    /**
     * 首页列表
     */
    public function index()
    {
        $admin_menu = D('admin_menu');

        $data =     $admin_menu
            -> field('id,parent_id,status,name,list_order,app,controller,action')
            -> where('type=1')
            -> order('list_order')
            -> order('id')
            -> select();
        /*$newMenus = [];
        foreach ($data as $m) {
            $newMenus[$m['id']] = $m;
        }
        foreach ($data as $key => $value) {

            $data[$key]['parent_id_node'] = ($value['parent_id']) ? ' class="child-of-node-' . $value['parent_id'] . '"' : '';
            $data[$key]['style']          = empty($value['parent_id']) ? '' : 'display:none;';
            $data[$key]['str_manage']     = '<a class="btn btn-xs green" href="__URL__/add/parent_id/'.$value["id"].'"> <i class="fa fa-file-o"></i>添加子菜单</a> 
 <a href="__URL__/mod/id/'.$value["id"].'" class="btn btn-xs blue"><i class="fa fa-edit"></i>编辑</a> 
  <a class="js-ajax-delete" href="__URL__/del/id/'.$value["id"].'" class="btn btn-xs red"><i class="fa fa-times"></i> 删除</a> ';
            $data[$key]['status']         = $value['status'] ? '显示' : '隐藏';
            if (APP_DEBUG) {
                $data[$key]['app'] = $value['app'] . "/" . $value['controller'] . "/" . $value['action'];
            }
        }*/
        import('ORG.Net.Tree');
        $tree       = new Tree();
        $tree -> init($data);
        /*$tree->icon = ['&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ '];
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $str      = "<tr id='node-\$id' \$parent_id_node style='\$style'>
                        <td style='padding-left:20px;'><input name='list_orders[\$id]' type='text' size='3' value='\$list_order' class='input input-order'></td>
                        <td>\$id</td>
                        <td>\$spacer\$name</td>
                        <td>\$app</td>
                        <td>\$status</td>
                        <td>\$str_manage</td>
                    </tr>";
        $result = $tree ->getTree(0,$str);*/
        $result = $tree->getTreeArray(0);

        $this -> assign('data',$result);
        $this -> display();
    }


    /**
     * 添加
     */
    public function add()
    {
        $admin_menu = D('admin_menu');
        if (IS_POST)
        {
            $this->validate();
            //添加
            $admin_menu -> create();
            $_POST['time'] = time();
            if ($admin_menu -> add())
            {
                $ret = $this -> authRule();
                if (!$ret)
                {
                    $id = $admin_menu->getLastInsID();
                    $admin_menu -> delete(array('id'=>$id));
                    $this -> error('添加失败');

                }
                else
                    {
                    $this -> success('添加成功','index');
                }

            }
            else
            {
                $this -> error('失败');
            }

            exit;
        }

        if (!empty($_GET['parent_id']))
        {
            $this->assign('parent_id',$_GET['parent_id']);
        }

        $list       = $admin_menu
            -> field('id,parent_id,name')
            -> select();
        $this -> assign('list',$list);
        $this -> display();
    }

    /**
     * 储存所有数据
     */
    protected function authRule()
    {
        $authRule =  D('auth_rule');

        $data  = $_POST;

        $name  = strtolower("{$data['app']}/{$data['controller']}/{$data['action']}");
        $ret   = $authRule
            -> where(' app ='.$data['app'].' and type = admin_url and name = '.$name)
            ->getField('id');

        if ($ret)
        {

            return false;
        }

        $_POST = array(
            'name'  => $name,
            'app'   => $data['app'],
            'type'  => 'admin_url',
            'title' => $data['name'],
            'param' => $data['param']
        );


        $authRule -> create();
        if($authRule -> add())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 修改
     */
    public function mod()
    {

        $admin_menu = D('admin_menu');

        $id   = $_GET['id'];
        $info = $admin_menu
            -> where('id='.$id)
            -> find();
        $this -> assign('info',$info);

        $list       = $admin_menu
            -> field('id,parent_id,name')
            -> select();
        $this -> assign('list',$list);
        $this ->display();
    }

    /**
     * 修改提交
     */
    public function modPost()
    {
        if (IS_POST)
        {
            $admin_menu = D('admin_menu');
            $id         = $_POST['id'];
            $oldOne     = $admin_menu
                -> where('id='.$id)
                -> find();

            $this -> validate();

            $admin_menu ->create();

            if ($admin_menu->save())
            {
                 $this->authRuleMod($oldOne);

                $this -> success('修改成功','index');

            }
            else
            {
                $this -> error('未修改数据');
            }
        }
        else
        {
            $this->error('错误操作');
        }
    }

    /**
     * 修改
     */
    protected function authRuleMod($old)
    {
        $authRule =  D('auth_rule');
        $data = $_POST;
        $name  = strtolower("{$data['app']}/{$data['controller']}/{$data['action']}");
        $_POST = array(
            'id'    => $old['id'],
            'name'  => $name,
            'app'   => $data['app'],
            'type'  => 'admin_url',
            'title' => $data['name'],
            'param' => $data['param']
        );
        $authRule -> create();
        if ($authRule -> save())
        {
            return true;
        }
        else
        {
            return false;
        }


    }


    /**
     * 检查
     */
    protected function validate()
    {
        $admin_menu = D('admin_menu');
        //是否为空
        if (empty($_POST['name']) || empty($_POST['app']) || empty($_POST['controller']) || empty($_POST['action']))
        {
            $this->error('缺少主要参数');
            exit;
        }
        //是否已经存在
        $result = $admin_menu
            -> where('action = '.$_POST['action'].' and app = '.$_POST['app'].' and controller = '.$_POST['controller'])
            -> getField('id');
        if ($result)
        {
            $this -> error('已经存在该数据');
            exit;
        }
    }

    /**
     * 删除
     */
    public function del()
    {
        $id         = $_GET['id'];
        $admin_menu = D('admin_menu');
        $count      = $admin_menu -> where('parent_id = '.$id)->count();
        if ($count>0)
        {
            $this -> error('该栏目还有下级菜单');
            exit;
        }
        else
        {
            $ret = $admin_menu -> where('id = '.$id) -> delete();
            if ($ret)
            {
                $this-> success('删除成功','index');
            }
            else
            {
                $this -> error('删除失败');
            }
        }
    }
}