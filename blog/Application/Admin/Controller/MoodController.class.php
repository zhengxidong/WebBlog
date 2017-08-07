<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/17
 * Time: 23:49
 * 说说管理
 */

namespace Admin\Controller;
use Think\Controller;

class MoodController extends Controller{
    public function select(){
        $this->assign("list",D('mood')->select());
        $this->display();
    }
    public function add(){
        $arr = I('post.');
        if(!empty($arr)){
            unset($arr['submit']);
            $arr['mood_time'] = date("Y-m-d H:i:s");
            //获取发表的IP地址
            $ip = get_client_ip();
            $arr['mood_ip'] = $ip;
            $arr['mood_pic'] = '0';
            $bool = D('mood')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('Mood/select'));
            }else{
                $this->error("操作失败！",U('Mood/select'));
            }
        }else{
            $this->display();
        }
    }
    public function delete($id){
        $bool = D('mood')->where(array('id'=>$id))->delete();
        if($bool){
            $this->success("操作成功！",U('Mood/select'));
        }else{
            $this->error("操作成功！",U('Mood/select'));
        }
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}