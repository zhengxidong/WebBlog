<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/17
 * Time: 22:31
 */

namespace Admin\Controller;
use Think\Controller;

class FriendlylinkController extends Controller{
    public function select(){
        $this->assign("list",D('friendlylink')->select());
        $this->display();
    }
    public function add(){
        $arr = I('post.');
        if(!empty($arr)){
            unset($arr['submit']);
            $arr['link_date'] = time();
            $bool = D('friendlylink')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('Friendlylink/select'));
            }else{
                $this->error("操作失败！",U('Friendlylink/select'));
            }
        }else{
            $this->display();
        }
    }
    public function edit($id){
        $data['link_id'] = $id;
        $this->assign("arr",D('friendlylink')->where($data)->find());
        $this->display();
    }
    public function update(){
        $arr = I('post.');
        unset($arr['submit']);
        $arr['link_date'] = time();
        $data['link_id'] = $arr['link_id'];
        $bool = D('friendlylink')->where($data)->data($arr)->save();
        if($bool){
            $this->success("操作成功！",U('Friendlylink/select'));
        }else{
            $this->error("操作失败！",U('Friendlylink/select'));
        }
    }
    public function delete($id){
        $data['link_id'] = $id;
        $bool = D('friendlylink')->where($data)->delete();
        if($bool){
            $this->success("操作成功！",U('Friendlylink/select'));
        }else{
            $this->error("操作失败！",U('Friendlylink/select'));
        }
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}