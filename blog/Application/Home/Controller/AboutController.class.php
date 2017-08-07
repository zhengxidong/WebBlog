<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/8
 * Time: 13:47
 */

namespace Home\Controller;


use Think\Controller;

class AboutController extends Controller{
    public function about(){
        $this->assign("info",D('info')->select());
        $this->assign("bloginfo",D('about_blog')->select());
        $this->display();
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}