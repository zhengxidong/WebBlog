<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/15
 * Time: 22:43
 */

namespace Home\Controller;
use Think\Controller;

class ShareController extends Controller{
    public function share(){
        //取最新文章
        $this->assign("article",D('article')->Order("articletime desc")->select());
        //去点击排行文章
        $this->assign("articleph",D('article')->Order("views desc")->select());
        $this->display();
    }
    //模板分享详情页
    public function template(){
        $this->display();
    }
    //资源分享页
    public function resourcesshare(){
        //取出所有资源
        $map['r.ispublic'] = array('eq','0');
        /*$map['rt.resourcestypename'] = array('eq','美剧');*/
        $count = D('resources as r')->where($map)
            ->join('tb_resourcestype as rt on r.resourcestypeid=rt.id')
            ->count();
        $Page = getpage($count,10);
        $list = D('resources as r')->where($map)
            ->join('tb_resourcestype as rt on r.resourcestypeid=rt.id')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign("list",$list);
        $this->assign("page",$Page->show());

        $this->assign("typelist",D('resourcestype')->select());
        $this->display();
    }
    public function serach($id){
        $map['r.ispublic'] = array('eq','0');
        $map['rt.id'] = $id;
        $count = D('resources as r')->where($map)
            ->join('tb_resourcestype as rt on r.resourcestypeid=rt.id')
            ->count();
        $Page = getpage($count,10);
        $list = D('resources as r')->where($map)
            ->join('tb_resourcestype as rt on r.resourcestypeid=rt.id')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign("page",$Page->show());
        $this->assign("list",$list);

        $this->assign("typelist",D('resourcestype')->select());
        $this->display('resourcesshare');
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}