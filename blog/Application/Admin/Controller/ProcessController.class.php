<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/18
 * Time: 22:25
 */

namespace Admin\Controller;
use Think\Controller;

class ProcessController extends Controller{
    public function select(){
        $this->assign("list",D('process')->select());
        $this->display();
    }
    public function add(){
        $arr = I('post.');
        if(!empty($arr)){
            unset($arr['submit']);
            $arr['updatedate'] = date("Y-m-d",time());
            $bool = D('process')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('Process/select'));
            }else{
                $this->error("操作失败！",U('Process/select'));
            }
        }else{
            $this->display();
        }

    }
    public function edit($id){
        $data['id'] = $id;
        $this->assign("list",D('process')->where($data)->find());
        $this->display();
    }
    public function update($id){
        $arr = I('post.');
        unset($arr['submit']);
        $arr['updatedate'] = date("Y-m-d",time());
        $bool = D('process')->where(array('id'=>$id))->data($arr)->save();
        if($bool){
            $this->success("操作成功！",U('Process/select'));
        }else{
            $this->error("操作失败！",U('Process/select'));
        }
    }
    public function delete($id=null){
        $data['id'] = $id;
        $bool = D('process')->where($data)->delete();
        if($bool){
            $this->success("操作成功！",U('Process/select'));
        }else{
            $this->error("操作失败！",U('Process/select'));
        }
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}