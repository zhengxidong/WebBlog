<?php
namespace app\manage\controller;
use think\Controller;
use think\Session;

class Base extends Controller
{
  protected function _initialize()
  {
    parent::_initialize();//继承父类中的初始化操作
    define('ADMIN_ID',Session::get('admin_id'));
  }
  //判断用户是否登录,放在后台的入口：index/index
  protected function isLogin()
  {
    if(empty(ADMIN_ID))
    {
      $this->error('未登录，无权访问！','admin/index');
    }
  }
  //防止用户重复登录 user/login
  protected function alreadyLogin()
  {
    if(!empty(ADMIN_ID))
    {
      $this->error('用户已经登录,请勿重复登录','manage/index');
    }
  }
}
 ?>
