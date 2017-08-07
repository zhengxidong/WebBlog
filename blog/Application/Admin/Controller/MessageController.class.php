<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/5/12
 * Time: 22:38
 */

namespace Admin\Controller;


use Think\Controller;

class MessageController extends Controller{
    public function select(){
        $this->assign("list",D('message')->select());
        $this->display();
    }
    public function delete($id){
        $bool = D('message')->where(array('id'=>$id))->delete();
        if($bool){
            $this->success("操作成功！",U('Message/select'));
        }else{
            $this->error("操作失败！",U('Message/select'));
        }
    }
}