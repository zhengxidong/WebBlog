<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Article as ArticleModel;
class Index extends Controller
{
    public function index()
    {
      //获取所有文章数据
      //$articleData = Db::table('bg_article')->select();

      $articleList = ArticleModel::all();

      $this->assign('articleList',$articleList);

      return $this->view->fetch();
    }
    public function article_details($id)
    {

       $articleInfo = ArticleModel::get($id);
       //var_dump($articleInfo);
       //exit;
      //获取文章数据
        //$article_Details = Db::table('bg_article')->select();
        //var_dump($article_Details);
        //exit;
        $this->assign('articleInfo',$articleInfo);

        //关闭评论
        $this->assign('isOpen',1);
        return $this->view->fetch();
    }
}
