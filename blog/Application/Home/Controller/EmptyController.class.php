<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/28
 * Time: 21:10
 */

namespace Admin\Controller;
use Think\Controller;

/**
 * Class EmptyController
 * @package Admin\Controller
 * 防止空控制器
 */
class EmptyController extends Controller{
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}