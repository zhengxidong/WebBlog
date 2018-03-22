<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Article extends Controller
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
          //var_dump($data);
          //exit;
          //$data = ['foo' => 'bar', 'bar' => 'foo'];
          $data['article_author'] = 111;
          $data['article_date'] = date('Y-m-d H:i:s');
          $data['article_content'] = $data['test-editormd-markdown-doc'];
          $data['article_title'] = 'test';
          $data['article_excerpt'] = '';
          $data['article_status'] = 'open';
          $data['article_password'] = '88888';
          $data['article_name'] = '';
          unset($data['test-editormd-markdown-doc']);
          unset($data['title']);
          unset($data['test-editormd-html-code']);
          Db::table('bg_article')->insert($data);

          $this->success('发布成功','article/index');
        }

    }

    //编辑
    public function edit()
    {

    }
}
