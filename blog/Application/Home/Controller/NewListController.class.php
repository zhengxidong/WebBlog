<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/15
 * Time: 22:17
 */

namespace Home\Controller;
use Think\Controller;

class NewListController extends Controller{
    public function newlist(){
        //取出最新文章
        $this->assign("article",D("article")->Order("articletime desc")->select());
        //取出点击排行
        $this->assign("articleph",D("article")->Order("views desc")->select());
        $this->display();
    }
    public function newdetail($id=null){
        //点一次文章，浏览量加1
        D('article')->where(array('id'=>$id))->setInc('views',1);
        //取出对应ID的文章
        $arr = D('article')->where(array('id'=>$id))->find();
        $this->assign("ar",$arr);
        //取出上一篇
        $prev = D('article')->where('id<'.$id)->order('id DESC')->limit('1')->find();
        $this->assign("prev",$prev);

        //下一篇
        $next = D('article')->where('id>'.$id)->order('id ASC')->limit('1')->find();
        $this->assign("next",$next);

        $this->display();
    }
    //下一篇文章
    public function Previous($id){
        $id = isset($id) > 0 ? intval($id) : "";
       $prev = D('article')->query("select id,title from article where id>'$id' order by id asc limit 1");
        $this->assign("prev",$prev);
    }
    public function _empty(){
        //header("Location:/Public/View/404.html");
        $this->display("Public/View/404.html");
    }
}