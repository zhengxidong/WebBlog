<?php
namespace app\manage\controller;
use app\manage\controller\Base;
use think\Controller;
use think\Db;
use think\Request;
use app\manage\model\Article as ArticleModel;
use app\manage\model\Cate as CateModel;
use app\manage\model\TermsForArticle as TermsForArticleModel;
class Article extends Base
{
    public function index()
    {
        //获取文章数据
        //$articleData = Db::table('bg_article')->select();
        $article = new ArticleModel();

        $articleData = $article->order('article_modified_on','desc')->select();
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
          //获取所有栏目
          $cate = new CateModel();
          $cateList = $cate->where('cate_id != 1')->select();
          $this->assign('cateList',$cateList);

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
          $cateId = $data['cate_id'];

          $articleTitle   = $data['title'];
          $articleExcerpt = $data['excerpt'];
          $articleContent = $data['test-editormd-markdown-doc'];
          $articleStatus  = $data['status'];
          $articlePassword = $data['password'];
          $articleName     = $data['name'];

          $articleData = [

            'article_title'   => $articleTitle,                       //文章标题
            'article_author'  => '1',                                 //文章作者ID
            'article_date'    => date('Y-m-d H:i:s'),                   //文章发布时间
            'article_excerpt' => $articleExcerpt,                   //文章摘录
            'article_content' => $articleContent,//文章内容
            'article_status'  => (empty($articleStatus)) ? 'close':'open',                              //文章状态，是否公开
            'article_password'=> $articlePassword,                        //文章密码
            'article_name'    => $articleName,                         //文章缩略名
            'cate_id'         => $cateId
          ];
          //unset($data['test-editormd-markdown-doc']);
          //unset($data['title']);
          //unset($data['test-editormd-html-code']);

          $article->data($articleData);

          $article->save();

          //添加分类与文章关系表
          // $termData = [
          //   'term_id' => $termId,
          //   'article_id' => $article->id,
          //   'create_by' => 1,
          //   'create_on' => date("Y-m-d H:i:s")
          // ];

          //$termsForArticle = new TermsForArticleModel();
          //$termsForArticle->data($termData);
          //$termsForArticle->save();
          $this->redirect('article/index');
          //$this->success('发布成功','article/index');
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
          $this->redirect('article/index');
          //$this->success('没有此文章信息！','article/index');
        }
        // var_dump($articleInfo);
        // exit;
         $this->assign('articleInfo',$articleInfo);
         //获取所有栏目
         $cate = new CateModel();
         $cateList = $cate->where('cate_id != 1')->select();

         $this->assign('cateList',$cateList);

         //获取对应文章分类
         //$termsForArticle = new TermsForArticleModel();
         //$termsForArticle = $termsForArticle->get(['article_id'=>$articleId]);
         //var_dump($termsForArticle->term_id);
         //exit;
         //$this->assign('termId',$termsForArticle->term_id);

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
        $article->cate_id = $data['cate_id'];
        $article->save();
        $this->redirect('article/index');
        //$this->success('更新成功！','article/index');
      }
      else
      {
        return $this->view->fetch();
      }

    }
}
