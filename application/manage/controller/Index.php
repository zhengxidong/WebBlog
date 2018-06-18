<?php
namespace app\manage\controller;
use app\manage\controller\Base;
use think\Controller;
use think\Session;
use app\manage\model\AccessRecords as AccessRecordsModel;
class Index extends Base
{
    public function index()
    {

        if(empty(Session::get('admin_id')))
        {
          return $this->view->fetch('admin/index');
        }
        else {
          //获取访问量
          $accessRecords = AccessRecordsModel::count();
          $this->assign('accessRecordsCount',$accessRecords);
          return $this->view->fetch();
        }

    }

}
