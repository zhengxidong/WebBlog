<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/27
 * Time: 16:48
 * 标签管理
 */

namespace Admin\Controller;
use Think\Controller;

class TagController extends Controller{
    public function select(){
        $count = D('tag')->count();
        $Page = getpage($count,8);
        $this->assign("list",D('tag')->limit($Page->firstRow.','.$Page->listRows)->select());
        $this->assign("page",$Page->show());
        $this->display();
    }
    public function add(){
        $arr = I('post.');
        if(!empty($arr)){
            unset($arr['submit']);
            $bool = D('tag')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('Tag/select'));
            }else{
                $this->error("操作失败！",U('Tag/select'));
            }
        }else{
            $this->display();
        }
    }
    public function edit($id){
        $this->assign("tag",D('tag')->where(array('id'=>$id))->find());
        $this->display();
    }
    public function update(){
        $arr = I('post.');
        unset($arr['submit']);
        $bool = D('tag')->data($arr)->where(array('id'=>$arr['id']))->save();
        if($bool){
            $this->success("操作成功！",U("Tag/select"));
        }else{
            $this->error("操作失败！",U("Tag/select"));
        }
    }
    public function delete($id){
        $bool = D('tag')->where(array('id'=>$id))->delete();
        if($bool){
            $this->success("操作成功！",U("Tag/select"));
        }else{
            $this->error("操作失败！",U("Tag/select"));
        }
    }
    public function delAll(){
        $arr = I('post.');
        $str = implode(',',$arr['checkbox']);
        $bool = D('tag')->delete($str);
        if($bool){
            $this->success("操作成功！",U('Tag/select'));
        }else{
            $this->error("操作失败！",U('Tag/select'));
        }
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}