<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/5/9
 * Time: 13:51
 */

namespace Admin\Controller;


use Think\Controller;

class ResourcesTypeController extends Controller{
    public function select(){
        $this->assign("list",D('resourcestype')->select());
        $this->display();
    }
    public function add(){
        $arr = I('post.');
        if(!empty($arr)){
            unset($arr['submit']);
            $bool = D('resourcestype')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('ResourcesType/select'));
            }else{
                $this->error("操作失败！",U('ResourcesType/select'));
            }
        }else{
            $this->display();
        }
    }
    public function edit($id){
        $this->assign("arr",D('resourcestype')->where(array('id'=>$id))->find());
        $this->display();
    }
    public function update(){
        $arr = I('post.');
        unset($arr['submit']);
        $bool = D('resourcestype')->where(array('id'=>$arr['id']))->data($arr)->save();
        if($bool){
            $this->success("操作成功！",U('ResourcesType/select'));
        }else{
            $this->error("操作失败！",U('ResourcesType/select'));
        }
    }
    public function delete($id){
        $bool = D('resourcestype')->where(array('id'=>$id))->delete();
        if($bool){
            $this->success("操作成功！",U('ResourcesType/select'));
        }else{
            $this->error("操作失败！",U('ResourcesType/select'));
        }
    }
}