<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/7
 * Time: 22:05
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller{
    public function index(){
        $this->display();
    }
    public function check(){
        $arr = I("post.");
        $username = $arr['username'];
        $password = sha1($arr['userpwd']);
        /*$admin = new \Admin\Model\AdminModel();*/  //第一种方式访问
        $admin = D("Admin");                         //第二种方式访问

        $arruser = $admin->where(array('username'=>$username,'password'=>$password))->find();
        if(!empty($arruser)){
            $_SESSION['admin'] = $arr['username'];
            $this->success("登录成功",U('Admin/Index/index'));
        }
        else{
            $this->error("账号或密码错误！",U('Admin/Login/index'));
        }
    }
    public function logout(){
        unset($_SESSION['admin']);
        $this->success("正在退出","index");
        exit;
    }
    public function _empty(){
        exit("no this action");
        /*$this->display("Public/View/404.html");*/
    }
}