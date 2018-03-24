<?php
namespace app\manage\controller;
use app\manage\controller\Base;
use think\Controller;
use think\Db;
use think\Request;
use app\manage\model\Article as ArticleModel;
class Article extends Base
{
    public function index()
    {
        //获取文章数据
        $articleData = Db::table('bg_article')->select();
        $this->assign('articleData',$articleData);
        return $this->view->fetch();
    }

    //新增数据
    public function add()
    {
        $request = Request::instance();
        $data = $request->post();
        if(empty($data))
        {
          return $this->view->fetch();
        }
        else
        {

          //DB操作
          // $data['article_author'] = 111;
          // $data['article_date'] = date('Y-m-d H:i:s');
          // $data['article_content'] = $data['test-editormd-markdown-doc'];
          // $data['article_title'] = 'test';
          // $data['article_excerpt'] = '';
          // $data['article_status'] = 'open';
          // $data['article_password'] = '88888';
          // $data['article_name'] = '';
          // unset($data['test-editormd-markdown-doc']);
          // unset($data['title']);
          // unset($data['test-editormd-html-code']);
          // Db::table('bg_article')->insert($data);

          //var_dump($data);
          //exit;
          //模型操作
          $article = new ArticleModel;
          $data = [
            'article_title'   => $data['title'],                       //文章标题
            'article_author'  => '1',                                 //文章作者ID
            'article_date'    => date('Y-m-d H:i:s'),                   //文章发布时间
            'article_excerpt' => $data['excerpt'],                   //文章摘录
            'article_content' => $data['test-editormd-markdown-doc'],//文章内容
            'article_status'  => (empty($data['status'])) ? 'close':'open',                              //文章状态，是否公开
            'article_password'=> $data['password'],                        //文章密码
            'article_name'    => $data['name']                         //文章缩略名
          ];
          unset($data['test-editormd-markdown-doc']);
          //unset($data['title']);
          unset($data['test-editormd-html-code']);

          $article->data($data);

          $article->save();

          $this->success('发布成功','article/index');
        }

    }


    //渲染编辑界面
    //public function
    //编辑文章
    public function edit()
    {
      //$request = Request::instance();
      //$data = $request->post();
      //var_dump($data);
      //exit;
      //$request->param('id');
      $request = Request::instance();
      if(Request::instance()->isGet())
      //if(!empty($id))
      {
         $articleId = $request->param('id');
         $articleInfo = ArticleModel::get($articleId);

        if(empty($articleInfo))
        {
          $this->success('没有此文章信息！','article/index');
        }

         $this->assign('articleInfo',$articleInfo);

        return $this->view->fetch();
      }
      else if(Request::instance()->isPost())
      //else if(!empty($data))
      {

        $data = $request->post();
        //var_dump($data);
        //exit;
        $article = ArticleModel::get($data['id']);
        $article->article_title    = $data['title'];
        $article->article_excerpt  = $data['excerpt'];
        $article->article_content  = $data['test-editormd-markdown-doc'];
        $article->article_status   = (empty($data['status'])) ? 'close':'open';
        $article->article_password = $data['password'];
        $article->article_name     = $data['name'];
        $article->article_modified_on = date('Y-m-d H:i:s');
        $article->save();

        $this->success('更新成功！','article/index');
      }
      else
      {
        return $this->view->fetch();
      }

    }
}
