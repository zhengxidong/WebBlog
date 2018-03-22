<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Index extends Controller
{
    public function index()
    {
      //获取所有文章数据
      $articleData = Db::table('bg_article')->select();
      $this->assign('articleData',$articleData);
        return $this->view->fetch();
    }
    public function article_details()
    {
      //获取文章数据
        $article_Details = Db::table('bg_article')->select();
        //var_dump($article_Details);
        //exit;
        $this->assign('article_Details',$article_Details[0]['article_content']);
        return $this->view->fetch();
    }
}
