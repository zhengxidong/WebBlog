<?php
namespace app\manage\controller;
use app\manage\controller\Base;
use think\Controller;
use think\Session;
use think\Db;
use app\manage\model\AccessRecords as AccessRecordsModel;
class AccessRecords extends Base
{
    public function index()
    {
      $accessRecords = new AccessRecordsModel;
      $accessRecordsList = $accessRecords->order('access_time','desc')->select();
      // $accessRecords = Db::table('bg_access_records')
      // ->alias('ar')
      // ->join('bg_article a','a.id = ar.article_id')
      // ->order('ar.id','desc')
      // ->select();

      $this->assign('accessRecordsList',$accessRecordsList);
      return $this->view->fetch();
    }

}
