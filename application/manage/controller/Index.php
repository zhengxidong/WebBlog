<?php
namespace app\manage\controller;
use app\manage\controller\Base;
use think\Controller;
use think\Session;

class Index extends Base
{
    public function index()
    {

        if(empty(Session::get('admin_id')))
        {
          return $this->view->fetch('admin/index');
        }
        else {
          return $this->view->fetch();
        }

    }

}
