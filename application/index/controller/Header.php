<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Article as ArticleModel;
use app\index\model\Cate as CateModel;
class Header extends controller
{
  public function header()
  {
    //获取栏目
    $cate = new CateModel();
    $cateList = $cate->order('cate_id','asc')->select();
    $this->assign('cateList',$cateList);
    return $this->view->fetch();
  }

  public function show($id)
  {
    //$cateInfo = CateModel::get($id);
    $cate = new CateModel();
    $cateList = $cate->order('cate_id','asc')->select();
    $this->assign('cateList',$cateList);

    //$articleInfoList = ArticleModel::all(['cate_id'=>$id]);

    $cateId = ($id == 1) ? '' : "and a.cate_id={$id}";
    $articleList = Db::table('bg_article')
      ->alias('a')
      ->join('bg_cate c','c.cate_id = a.cate_id')
      ->where("a.article_status ='open' {$cateId}")
      ->order('id','desc')
      ->select();

    $this->assign('articleList',$articleList);
    return $this->view->fetch('index/index');
  }
}
