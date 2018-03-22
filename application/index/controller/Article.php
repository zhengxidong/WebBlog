<?php
namespace app\index\controller;
use think\Controller;
use think\db;
class Article extends Controller
{
    public function index()
    {
        return $this->view->fetch();
    }

    //新增数据
    public function addArticle()
    {
        $request = Request::instance();
        $data = $request->post();
        var_dump($data);
        exit;
        $data = ['foo' => 'bar', 'bar' => 'foo'];

        Db::table('think_user')->insert($data);
    }
}
