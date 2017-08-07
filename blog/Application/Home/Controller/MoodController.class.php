<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/15
 * Time: 22:32
 * 心情说说
 */

namespace Home\Controller;
use Think\Controller;

class MoodController extends Controller{
    public function select(){
        $this->assign("mood",D('mood')->Order('mood_time desc')->select());
        $this->display();
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}