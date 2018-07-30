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

class MonetaryAction extends BaseClassifyAction
{
    /**
     * 币值数据
     */

    public function _initialize()
    {
        parent::_initialize();
        $this->classify =  D('monetary'); //数据库
        $this->thisClassName = '币值';  //记录名称
        $this->title    = 'title';  //日志字段名
        $this->time     = 'createtime'; //创建时间字段名
        $this->thisId   = 'monetary_id'; //id
    }

    public static function select()
    {
        $monetary = D('monetary');
        return $monetary
            -> field('monetary_id,title')
            -> where('status=1')
            -> select();
    }
}