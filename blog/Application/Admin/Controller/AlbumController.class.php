<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/19
 * Time: 17:48
 */

namespace Admin\Controller;
use Think\Controller;

class AlbumController extends Controller{
    public function select(){
        $this->display();
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}