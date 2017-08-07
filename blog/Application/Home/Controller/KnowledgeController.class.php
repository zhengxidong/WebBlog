<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/8
 * Time: 13:53
 */

namespace Home\Controller;


use Think\Controller;

class KnowledgeController extends Controller{
    public function knowledge(){
        $this->display();
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}