<?php 
/* 404错误页面展示
 *
 **/
 class EmptyAction extends Action{ 
   function _empty(){ 
        header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
        $this->display("Public:404"); 
    } 
 } 
?>
