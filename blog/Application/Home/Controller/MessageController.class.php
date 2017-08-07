<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/20
 * Time: 19:12
 */

namespace Home\Controller;
use Think\Controller;

class MessageController extends Controller{
     public function getData(){
        $arr = D('message')->select();
         /*dump($arr);
         exit;*/
        /*$this->ajaxReturn($arr);*/
        echo json_encode($arr);
    }
    public function addmsg(){
        $arr = I('post.');
        $arr['message_user_ip'] = get_client_ip();
        $arr['message_time'] = date("Y-m-d H:i:s");
        $level = D('message')->count();
        $level++;
        $arr['message_level'] = $level;
        /*dump($arr);
        exit;*/
            $bool = D('message')->data($arr)->add();
            if($bool){
                /*$va= array("success "=>'留言成功');*/
               /* $data = D('message')->select();*/
                $data = array();
                $data[] = $arr;
               echo json_encode($data);
            }else{
                echo 1;
            }

    }
    public function add(){
        $this->display();
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}