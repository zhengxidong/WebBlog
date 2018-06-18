<?php
namespace app\manage\controller;
use app\manage\controller\Base;
use think\Controller;
use think\Session;
use app\manage\model\AccessRecords as AccessRecordsModel;
class AccessRecords extends Base
{
    public function index()
    {
      $accessRecords = AccessRecordsModel::select();
      $this->assign('accessRecordsList',$accessRecords);
      return $this->view->fetch();
    }

}
