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

class QuestionTypeAction extends BaseClassifyAction
{
    /**
     * 常见问题分类
     */

    public function _initialize()
    {
        parent::_initialize();
        $this->classify =  D('question_type'); //数据库
        $this->thisClassName = '常见问题分类';  //记录名称
        $this->title    = 'name';  //日志字段名
        $this->time     = 'createtime'; //创建时间字段名
        $this->thisId   = 'type_id'; //id
    }
}