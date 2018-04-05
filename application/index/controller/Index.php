<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Article as ArticleModel;
use app\index\model\Cate as CateModel;
class Index extends Controller
{
    public function index()
    {
      //获取所有文章数据
      //$articleData = Db::table('bg_article')->select();

        //模型操作查询
        //$article = new ArticleModel();
        //$articleList = $article->order('id','desc')->select();
        //$articleList = ArticleModel::all();

        //链式操作联合查询
        $articleList = Db::table('bg_article')
          ->alias('a')
          ->join('bg_cate c','c.cate_id = a.cate_id')
          ->select();
      //var_dump($articleList);
      //exit;
      $this->assign('articleList',$articleList);

      //获取栏目
        //$cate = new CateModel();
        //$cateList = $cate->order('id','desc')->select();
        //$this->assign('cateList',$cateList);
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
