<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/5/1
 * Time: 1:44
 * 资源管理
 */

namespace Admin\Controller;
use Think\Controller;

class ResourcesController extends Controller{
    public function select(){
        $count = D('resources as r')
            ->join("left join tb_resourcestype as rt on r.resourcestypeid=rt.id")
            ->field('r.id,r.name,r.url,r.resourcespw,r.resourcesdate,r.ispublic,rt.resourcestypename')
            ->count();
        $Page = getpage($count,10);
        $this->assign("list",D('resources as r')
            ->join("left join tb_resourcestype as rt on r.resourcestypeid=rt.id")
            ->field('r.id,r.name,r.url,r.resourcespw,r.resourcesdate,r.ispublic,rt.resourcestypename')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select());
        $this->assign("typelist",D('resourcestype')->select());
        $this->assign('page',$Page->show());
        $this->display();
    }
    public function add(){
        $arr =I('post.');
        if(!empty($arr)){
            unset($arr['submit']);
            $arr['resourcesdate'] = date("Y-m-d H:i:s");
            $bool = D('resources')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('Resources/select'));
            }else{
                $this->error("操作失败！",U('Resources/select'));
            }
        }else{
            $this->assign("type",D('resourcestype')->select());
            $this->display();
        }
    }
    public function edit($id){
        //取出对应id的资源
        $this->assign("resources",D('resources')->where(array('id'=>$id))->find());
        //将所有资源分类取出
        $this->assign("resourcestype",D('resourcestype')->select());
        $this->display();
    }
    public function update(){
        $arr = I('post.');
        unset($arr['submit']);
        $bool = D('resources')->data($arr)->save();
        if($bool){
            $this->success("操作成功！",U('Resources/select'));
        }else{
            $this->error("操作失败！",U('Resources/select'));
        }
    }
    public function delete($id){
        $bool = D('resources')->where(array('id'=>$id))->delete();
        if($bool){
            $this->success("操作成功！",U('Resources/select'));
        }else{
            $this->error("操作失败！",U('Resources/select'));
        }
    }
    public function search(){
        $arr = I('post.');
        //三个条件一起查
        if(!empty($arr['name'])&&$arr['resourcestypename']!='0'&&!empty($arr['resourcestypename'])){
            $map['r.name'] = array('like','%'.$arr['name'].'%');
            $map['rt.resourcestypename'] = $arr['resourcestypename'];
            $map['r.ispublic'] = $arr['ispublic'];
            $list = D('resources as r')
                ->where($map)
                ->join("left join tb_resourcestype as rt on r.resourcestypeid=rt.id")
                ->field('r.id,r.name,r.url,r.resourcespw,r.resourcesdate,r.ispublic,rt.resourcestypename')
                ->select();
            $this->assign("list",$list);
        }
        //按分类
        if(empty($arr['name'])){
            $map['rt.resourcestypename'] = $arr['resourcestypename'];
            $list = D('resources as r')
                ->where($map)
                ->join("left join tb_resourcestype as rt on r.resourcestypeid=rt.id")
                ->field('r.id,r.name,r.url,r.resourcespw,r.resourcesdate,r.ispublic,rt.resourcestypename')
                ->select();
            $this->assign("list",$list);
        }
        //按输入值查
        if($arr['resourcestypename']=='0'){
            $map['r.name'] = array('like','%'.$arr['name'].'%');
            $list = D('resources as r')
                ->where($map)
                ->join("left join tb_resourcestype as rt on r.resourcestypeid=rt.id")
                ->field('r.id,r.name,r.url,r.resourcespw,r.resourcesdate,r.ispublic,rt.resourcestypename')
                ->select();
            $this->assign("list",$list);
        }
        //按是否公开查
        if($arr['ispublic']!='2'&&empty($arr['name'])&&$arr['resourcestypename']=='0'){
            $map['r.ispublic'] = $arr['ispublic'];
            $list = D('resources as r')
                ->where(array('r.ispublic'=>$arr['ispublic']))
                ->join("left join tb_resourcestype as rt on r.resourcestypeid=rt.id")
                ->field('r.id,r.name,r.url,r.resourcespw,r.resourcesdate,r.ispublic,rt.resourcestypename')
                ->select();
            $this->assign("list",$list);
        }
        $this->assign("typelist",D('resourcestype')->select());
        $this->display('select');
    }
}