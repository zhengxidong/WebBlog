<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/15
 * Time: 22:58
 */

namespace Home\Controller;
use Think\Controller;

class CaseListController extends Controller{
    public function caselist(){
        $this->display();
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}